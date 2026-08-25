
<?php

require_once "db.php";

$full_name = "System Administrator";
$email = "admin@technova.com";
$password = "Admin@123";
$phone = "9876543210";
$department = "Management";
$designation = "Administrator";
$address = "TechNova Head Office";
$role = "admin";

$hashed_password = password_hash(
    $password,
    PASSWORD_DEFAULT
);

$stmt = $conn->prepare(
    "INSERT INTO users
    (full_name, email, password, phone, department,
     designation, address, role)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
);

$stmt->bind_param(
    "ssssssss",
    $full_name,
    $email,
    $hashed_password,
    $phone,
    $department,
    $designation,
    $address,
    $role
);

if ($stmt->execute()) {

    echo "<h2>Admin created successfully.</h2>";
    echo "<p>Email: admin@technova.com</p>";
    echo "<p>Password: Admin@123</p>";

} else {

    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>
