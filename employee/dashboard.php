<?php
include "db.php";

/* -----------------------------
   Dashboard Statistics
------------------------------ */

$totalEmployees = 0;
$totalSalary = 0;
$averageSalary = 0;
$departmentCount = 0;
$departments = [];

/* Total employees and salary */
$sql = "SELECT COUNT(*) AS total_employees,
               COALESCE(SUM(salary), 0) AS total_salary,
               COALESCE(AVG(salary), 0) AS average_salary
        FROM employees";

$result = $conn->query($sql);

if ($result) {
    $stats = $result->fetch_assoc();

    $totalEmployees = (int)$stats["total_employees"];
    $totalSalary = (float)$stats["total_salary"];
    $averageSalary = (float)$stats["average_salary"];
}

/* Department statistics */
$sql = "SELECT department, COUNT(*) AS employee_count
        FROM employees
        GROUP BY department
        ORDER BY employee_count DESC";

$result = $conn->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $departments[] = $row;
    }
}

$departmentCount = count($departments);

/* Employee list */
$sql = "SELECT id, name, email, phone, department, salary
        FROM employees
        ORDER BY name ASC";

$result = $conn->query($sql);

$employees = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Employee Dashboard</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="dashboard">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="logo">
            Employee<span>Hub</span>
        </div>

        <nav>

            <a href="dashboard.php" class="active">
                📊 Dashboard
            </a>

            <a href="employees.php">
                👥 Employees
            </a>

            <a href="index.html">
                ➕ Add Employee
            </a>

        </nav>

    </aside>



    <!-- MAIN CONTENT -->
    <main class="main">

        <!-- HEADER -->
        <header class="header">

            <div>

                <h1>Employee Dashboard</h1>

                <p>
                    Overview of your employee management system
                </p>

            </div>

            <a href="index.html" class="add-button">
                + Add Employee
            </a>

        </header>


        <!-- STATISTICS CARDS -->
        <section class="stats">

            <div class="stat-card">

                <div class="icon blue">
                    👥
                </div>

                <div>

                    <p>Total Employees</p>

                    <h2>
                        <?php echo $totalEmployees; ?>
                    </h2>

                </div>

            </div>


            <div class="stat-card">

                <div class="icon green">
                    💰
                </div>

                <div>

                    <p>Total Payroll</p>

                    <h2>
                        ₹<?php echo number_format($totalSalary, 2); ?>
                    </h2>

                </div>

            </div>


            <div class="stat-card">

                <div class="icon purple">
                    📈
                </div>

                <div>

                    <p>Average Salary</p>

                    <h2>
                        ₹<?php echo number_format($averageSalary, 2); ?>
                    </h2>

                </div>

            </div>


            <div class="stat-card">

                <div class="icon orange">
                    🏢
                </div>

                <div>

                    <p>Departments</p>

                    <h2>
                        <?php echo $departmentCount; ?>
                    </h2>

                </div>

            </div>

        </section>


        <!-- DASHBOARD GRID -->
        <section class="dashboard-grid">


            <!-- DEPARTMENT CARD -->
            <div class="card">

                <div class="card-header">

                    <h2>Employees by Department</h2>

                </div>


                <?php if ($departmentCount > 0): ?>

                    <?php foreach ($departments as $department): ?>

                        <?php

                        $count =
                            (int)$department["employee_count"];

                        $percentage =
                            $totalEmployees > 0
                            ? ($count / $totalEmployees) * 100
                            : 0;

                        ?>

                        <div class="department">

                            <div class="department-info">

                                <span>
                                    <?php
                                    echo htmlspecialchars(
                                        $department["department"]
                                    );
                                    ?>
                                </span>

                                <strong>
                                    <?php echo $count; ?>
                                </strong>

                            </div>

                            <div class="progress">

                                <span
                                    style="width:
                                    <?php echo $percentage; ?>%">
                                </span>

                            </div>

                        </div>

                    <?php endforeach; ?>

                <?php else: ?>

                    <p class="empty">
                        No department data available.
                    </p>

                <?php endif; ?>

            </div>


            <!-- PAYROLL CARD -->
            <div class="card">

                <div class="card-header">

                    <h2>Payroll Overview</h2>

                </div>

                <div class="payroll">

                    <p>Total Payroll</p>

                    <h2>
                        ₹<?php
                        echo number_format(
                            $totalSalary,
                            2
                        );
                        ?>
                    </h2>

                </div>

                <div class="payroll-details">

                    <div>

                        <span>Employees</span>

                        <strong>
                            <?php echo $totalEmployees; ?>
                        </strong>

                    </div>

                    <div>

                        <span>Average Salary</span>

                        <strong>
                            ₹<?php
                            echo number_format(
                                $averageSalary,
                                2
                            );
                            ?>
                        </strong>

                    </div>

                </div>

            </div>

        </section>


        <!-- EMPLOYEE TABLE -->
        <section class="card employee-card">

            <div class="table-header">

                <div>

                    <h2>Employee Records</h2>

                    <p>
                        All employees stored in the database
                    </p>

                </div>

                <input
                    type="text"
                    id="searchEmployee"
                    placeholder="Search employees..."
                >

            </div>


            <div class="table-container">

                <table id="employeeTable">

                    <thead>

                        <tr>

                            <th>Employee ID</th>

                            <th>Name</th>

                            <th>Email</th>

                            <th>Phone</th>

                            <th>Department</th>

                            <th>Salary</th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php if (count($employees) > 0): ?>

                        <?php foreach ($employees as $employee): ?>

                            <tr>

                                <td>
                                    <strong>
                                        <?php
                                        echo htmlspecialchars(
                                            $employee["id"]
                                        );
                                        ?>
                                    </strong>
                                </td>

                                <td>
                                    <?php
                                    echo htmlspecialchars(
                                        $employee["name"]
                                    );
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo htmlspecialchars(
                                        $employee["email"]
                                    );
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo htmlspecialchars(
                                        $employee["phone"]
                                    );
                                    ?>
                                </td>

                                <td>

                                    <span class="department-badge">

                                        <?php
                                        echo htmlspecialchars(
                                            $employee["department"]
                                        );
                                        ?>

                                    </span>

                                </td>

                                <td>

                                    ₹<?php
                                    echo number_format(
                                        (float)$employee["salary"],
                                        2
                                    );
                                    ?>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td
                                colspan="6"
                                class="no-data"
                            >
                                No employees found.
                            </td>

                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </section>

    </main>

</div>


<script>

/* Employee search */

const search =
    document.getElementById("searchEmployee");

const table =
    document.getElementById("employeeTable");

search.addEventListener("keyup", function () {

    const searchValue =
        this.value.toLowerCase();

    const rows =
        table
        .getElementsByTagName("tbody")[0]
        .getElementsByTagName("tr");

    for (let i = 0; i < rows.length; i++) {

        const rowText =
            rows[i].innerText.toLowerCase();

        if (rowText.includes(searchValue)) {

            rows[i].style.display = "";

        } else {

            rows[i].style.display = "none";

        }

    }

});

</script>


<?php
$conn->close();
?>

</body>

</html>
