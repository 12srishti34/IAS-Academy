<?php
$conn = mysqli_connect("localhost", "YOUR_DB_USERNAME", "YOUR_DB_PASSWORD", "ias_academy");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>