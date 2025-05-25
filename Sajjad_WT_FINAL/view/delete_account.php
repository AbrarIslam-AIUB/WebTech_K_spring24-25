<?php
session_start();
include "../model/db.php";

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deletebtn'])) {
    $conn = CreateCon();
    $ngo_name = $_SESSION['user'];
    
    // Delete the NGO account using the database function
    if (DeleteNGOAccount($conn, $ngo_name)) {
        // Clear session and redirect to login
        session_destroy();
        header("Location: login.php?message=Account deleted successfully");
    } else {
        header("Location: dashboard.php?message=Error deleting account");
    }
    
    closeCon($conn);
    exit();
} else {
    header("Location: dashboard.php");
    exit();
}
?> 