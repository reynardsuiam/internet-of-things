<?php

include "db.php";

/* =====================================================
   DASHBOARD STATISTICS
===================================================== */

$totalContacts = 0;
$totalEmails = 0;
$totalPhones = 0;
$totalAddresses = 0;

/* Total contacts */

$sql = "SELECT COUNT(*) AS total
        FROM contacts";

$result = $conn->query($sql);

if ($result) {

    $row = $result->fetch_assoc();

    $totalContacts = (int)$row["total"];
}


/* Contacts with email */

$sql = "SELECT COUNT(*) AS total
        FROM contacts
        WHERE email IS NOT NULL
        AND email != ''";

$result = $conn->query($sql);

if ($result) {

    $row = $result->fetch_assoc();

    $totalEmails = (int)$row["total"];
}


/* Contacts with phone */

$sql = "SELECT COUNT(*) AS total
        FROM contacts
        WHERE phone IS NOT NULL
        AND phone != ''";

$result = $conn->query($sql);

if ($result) {

    $row = $result->fetch_assoc();

    $totalPhones = (int)$row["total"];
}


/* Contacts with address */

$sql = "SELECT COUNT(*) AS total
        FROM contacts
        WHERE address IS NOT NULL
        AND address != ''";

$result = $conn->query($sql);

if ($result) {

    $row = $result->fetch_assoc();

    $totalAddresses = (int)$row["total"];
}


/* =====================================================
   GET CONTACTS
===================================================== */

$sql = "SELECT *
        FROM contacts
        ORDER BY id DESC";

$result = $conn->query($sql);

$contacts = [];

if ($result) {

    while ($row = $result->fetch_assoc()) {

        $contacts[] = $row;

    }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Contact Dashboard</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>


<div class="dashboard">


    <!-- =================================================
         SIDEBAR
    ================================================== -->

    <aside class="sidebar">

        <div class="logo">

            Contact<span>Hub</span>

        </div>


        <nav>

            <a
                href="dashboard.php"
                class="active"
            >
                📊 Dashboard
            </a>


            <a href="contacts.php">
                👥 Contacts
            </a>


            <a href="add.php">
                ➕ Add Contact
            </a>

        </nav>

    </aside>



    <!-- =================================================
         MAIN CONTENT
    ================================================== -->

    <main class="main">


        <!-- HEADER -->

        <header class="header">

            <div>

                <h1>
                    Contact Dashboard
                </h1>

                <p>
                    Overview of your contact management system
                </p>

            </div>


            <a
                href="add.php"
                class="add-button"
            >
                + Add Contact
            </a>

        </header>



        <!-- =================================================
             STATISTICS
        ================================================== -->

        <section class="stats">


            <!-- TOTAL CONTACTS -->

            <div class="stat-card">

                <div class="icon blue">
                    👥
                </div>

                <div>

                    <p>
                        Total Contacts
                    </p>

                    <h2>
                        <?php
                        echo $totalContacts;
                        ?>
                    </h2>

                </div>

            </div>



            <!-- EMAILS -->

            <div class="stat-card">

                <div class="icon green">
                    📧
                </div>

                <div>

                    <p>
                        Email Contacts
                    </p>

                    <h2>
                        <?php
                        echo $totalEmails;
                        ?>
                    </h2>

                </div>

            </div>



            <!-- PHONE -->

            <div class="stat-card">

                <div class="icon purple">
                    📱
                </div>

                <div>

                    <p>
                        Phone Contacts
                    </p>

                    <h2>
                        <?php
                        echo $totalPhones;
                        ?>
                    </h2>

                </div>

            </div>



            <!-- ADDRESS -->

            <div class="stat-card">

                <div class="icon orange">
                    🏠
                </div>

                <div>

                    <p>
                        Contacts With Address
                    </p>

                    <h2>
                        <?php
                        echo $totalAddresses;
                        ?>
                    </h2>

                </div>

            </div>

        </section>



        <!-- =================================================
             DASHBOARD CARDS
        ================================================== -->

        <section class="dashboard-grid">


            <!-- CONTACT SUMMARY -->

            <div class="card">

                <div class="card-header">

                    <h2>
                        Contact Information
                    </h2>

                </div>


                <div class="contact-summary">


                    <div class="summary-row">

                        <span>
                            Total Contacts
                        </span>

                        <strong>
                            <?php
                            echo $totalContacts;
                            ?>
                        </strong>

                    </div>


                    <div class="summary-row">

                        <span>
                            Email Available
                        </span>

                        <strong class="green-text">

                            <?php
                            echo $totalEmails;
                            ?>

                        </strong>

                    </div>


                    <div class="summary-row">

                        <span>
                            Phone Available
                        </span>

                        <strong class="purple-text">

                            <?php
                            echo $totalPhones;
                            ?>

                        </strong>

                    </div>


                    <div class="summary-row">

                        <span>
                            Address Available
                        </span>

                        <strong class="orange-text">

                            <?php
                            echo $totalAddresses;
                            ?>

                        </strong>

                    </div>

                </div>

            </div>



            <!-- DATABASE STATUS -->

            <div class="card">

                <div class="card-header">

                    <h2>
                        Contact Database
                    </h2>

                </div>


                <div class="database-status">

                    <div class="status-icon">
                        ✓
                    </div>


                    <div>

                        <h3>
                            Database Active
                        </h3>

                        <p>
                            Your contact records are
                            connected to the database.
                        </p>

                    </div>

                </div>


                <a
                    href="add.php"
                    class="dashboard-action"
                >
                    + Create New Contact
                </a>

            </div>

        </section>



        <!-- =================================================
             CONTACT TABLE
        ================================================== -->

        <section class="card employee-card">


            <div class="table-header">

                <div>

                    <h2>
                        Contact Records
                    </h2>

                    <p>
                        All contacts stored in the database
                    </p>

                </div>


                <input
                    type="text"
                    id="searchContact"
                    placeholder="Search contacts..."
                >

            </div>



            <div class="table-container">


                <table id="contactTable">


                    <thead>

                        <tr>

                            <th>
                                ID
                            </th>

                            <th>
                                Name
                            </th>

                            <th>
                                Email
                            </th>

                            <th>
                                Phone
                            </th>

                            <th>
                                Address
                            </th>

                            <th>
                                Actions
                            </th>

                        </tr>

                    </thead>



                    <tbody>


                    <?php if (count($contacts) > 0): ?>


                        <?php foreach ($contacts as $contact): ?>


                            <tr>


                                <td>

                                    <strong>

                                        <?php
                                        echo htmlspecialchars(
                                            $contact["id"]
                                        );
                                        ?>

                                    </strong>

                                </td>



                                <td>

                                    <strong>

                                        <?php

                                        echo htmlspecialchars(
                                            $contact["first_name"]
                                            . " "
                                            . $contact["last_name"]
                                        );

                                        ?>

                                    </strong>

                                </td>



                                <td>

                                    <?php

                                    echo htmlspecialchars(
                                        $contact["email"]
                                    );

                                    ?>

                                </td>



                                <td>

                                    <?php

                                    echo htmlspecialchars(
                                        $contact["phone"]
                                    );

                                    ?>

                                </td>



                                <td>

                                    <?php

                                    echo htmlspecialchars(
                                        $contact["address"]
                                    );

                                    ?>

                                </td>



                                <td class="actions">


                                    <a
                                        href="edit.php?id=<?php echo $contact["id"]; ?>"
                                        class="btn btn-edit"
                                    >
                                        Edit
                                    </a>


                                    <a
                                        href="delete.php?id=<?php echo $contact["id"]; ?>"
                                        class="btn btn-delete"
                                        onclick="return confirmDelete();"
                                    >
                                        Delete
                                    </a>


                                </td>


                            </tr>


                        <?php endforeach; ?>


                    <?php else: ?>


                        <tr>

                            <td
                                colspan="6"
                                class="no-data"
                            >

                                No contacts found.

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

/* =====================================================
   CONTACT SEARCH
===================================================== */

const search =
    document.getElementById("searchContact");


const table =
    document.getElementById("contactTable");


search.addEventListener("keyup", function () {


    const searchValue =
        this.value.toLowerCase();


    const rows =
        table
        .getElementsByTagName("tbody")[0]
        .getElementsByTagName("tr");


    for (
        let i = 0;
        i < rows.length;
        i++
    ) {


        const rowText =
            rows[i].innerText.toLowerCase();


        if (
            rowText.includes(searchValue)
        ) {

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
