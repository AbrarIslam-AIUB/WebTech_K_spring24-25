<?php
session_start();
include "../model/db.php";

if (!isset($_SESSION['user'])) {
    header('Location: ../view/login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = CreateCon();
    $ngo_name = $_SESSION['user'];
    
    // Get form data
    $reg_number = $_POST['reg_number'];
    $ngo_type = $_POST['ngo_type'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $address = $_POST['address'];
    $area_operation = $_POST['area_operation'];
    $op_years = $_POST['op_years'];
    $tax_status = $_POST['tax_status'];

    // Update NGO details using the database function
    if (UpdateNGOProfile($conn, $ngo_name, $reg_number, $ngo_type, $email, $website, $address, $area_operation, $op_years, $tax_status)) {
        header("Location: ../view/dashboard.php?message=Profile updated successfully");
    } else {
        header("Location: ../view/dashboard.php?message=Error updating profile");
    }
    
    closeCon($conn);
    exit();
} else {
    header("Location: ../view/dashboard.php");
    exit();
}
?> 