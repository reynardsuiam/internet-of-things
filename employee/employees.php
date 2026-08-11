<?php

include "db.php";

$sql = "SELECT id, name, email, phone, department, salary FROM employees";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee List</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 40px;
        }

        .container {
            width: 90%;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #007bff;
            color: white;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            color: #777;
        }

        .back-button {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-button:hover {
            background-color: #218838;
        }
    </style>

</head>

<body>

    <div class="container">

        <h2>Employee List</h2>

        <a href="index.html" class="back-button">
            Add New Employee
        </a>

        <table>

            <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Salary</th>
            </tr>

            <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    echo "<tr>";

                    echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["phone"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["department"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["salary"]) . "</td>";

                    echo "</tr>";
                }

            } else {

                echo "<tr>";
                echo "<td colspan='6' class='no-data'>";
                echo "No employees found.";
                echo "</td>";
                echo "</tr>";
            }

            $conn->close();

            ?>

        </table>

    </div>

</body>

</html>