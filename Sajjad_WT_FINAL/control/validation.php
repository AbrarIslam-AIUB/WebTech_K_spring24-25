<?php
include '../model/db.php';
// Initialize variables  
$Success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Basic validation
    if (empty($_POST["ngo_name"])) $NnameError = "NGO Name is required";
    if (empty($_POST["reg_number"])) $RegError = "Registration Number is required";
    if (empty($_POST["ngo_type"])) $NgoTypeError = "NGO Type is required";
    if (empty($_POST["email"])) $EmailError = "Email is required";
    if (empty($_POST["address"])) $AddressError = "Address is required";
    if (empty($_POST["area_operation"])) $AreaError = "Please select an area of operation";
    if (empty($_POST["op_years"])) $YearsError = "Operational years is required";
    if (empty($_POST["password"])) $PassError = "Password is required";
    if (empty($_POST["confirm_password"])) $ConfirmPassError = "Please confirm password";
    if (empty($_POST["terms"])) $TermsError = "You must agree to the terms";

    // Additional validations
    if (!empty($_POST["email"]) && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $EmailError = "Invalid email format";
    }
    if (!empty($_POST["password"]) && strlen($_POST["password"]) < 8) {
        $PassError = "Password must be at least 8 characters";
    }
    if (!empty($_POST["confirm_password"]) && $_POST["confirm_password"] !== $_POST["password"]) {
        $ConfirmPassError = "Passwords do not match";
    }

    // File upload handling
    $hasError = 0;
    $reg_cert_names = [];

    // Handle multiple file uploads
    if (isset($_FILES['reg_cert']) && count($_FILES['reg_cert']['name']) > 0) {
        foreach ($_FILES['reg_cert']['name'] as $key => $name) {
            if ($_FILES['reg_cert']['error'][$key] === UPLOAD_ERR_OK) {
                $tmp_name = $_FILES['reg_cert']['tmp_name'][$key];
                $reg_cert_name = basename($name);
                $uploadDir = dirname(__DIR__) . "/uploads/";
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                $targetFile = $uploadDir . $reg_cert_name;

                if (move_uploaded_file($tmp_name, $targetFile)) {
                    $reg_cert_names[] = $reg_cert_name;
                } else {
                    $FileError = "Failed to upload file: $reg_cert_name";
                    $hasError = 1;
                }
            } else {
                $FileError = "Invalid file upload. Please try again.";
                $hasError = 1;
            }
        }
    } else {
        $FileError = "No file uploaded.";
        $hasError = 1;
    }

    // If no errors, insert data
    if (empty($NnameError) && empty($RegError) && empty($NgoTypeError) &&
        empty($EmailError) && empty($AddressError) && empty($AreaError) &&
        empty($YearsError) && empty($PassError) && empty($ConfirmPassError) &&
        empty($TermsError) && $hasError == 0) {
        
        $conn = CreateCon();
        $inserted = InsertData($conn,
            $_POST['ngo_name'],
            $_POST['reg_number'],
            $_POST['ngo_type'],
            $_POST['email'],
            $_POST['website'],
            $_POST['address'],
            is_array($_POST['area_operation']) ? implode(",", $_POST['area_operation']) : $_POST['area_operation'],
            $_POST['op_years'],
            $_POST['tax_status'],
            implode(",", $reg_cert_names), // Store multiple filenames as comma-separated string
            $_POST['password'],
            isset($_POST['terms']) ? 1 : 0,
            isset($_POST['notifications']) ? 1 : 0
        );

        if ($inserted) {
            session_start();
            $_SESSION['message'] = "NGO registered successfully!";
            $_SESSION['message_type'] = "success";
            header("Location: ../view/dashboard.php");
            exit();
        } else {
            $EmailError = "Registration failed. Email might already exist, or database error.";
        }
        closeCon($conn);
    }
}

// Input sanitization function
function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
?>
