<?php
session_start();
include "../model/db.php";

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$conn = CreateCon();
$ngo_name = $_SESSION['user'];

// Get NGO details
$sql = "SELECT * FROM ngo_registration WHERE ngo_name = '" . mysqli_real_escape_string($conn, $ngo_name) . "'";
$result = mysqli_query($conn, $sql);
$ngo_data = mysqli_fetch_assoc($result);
closeCon($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NGO Dashboard</title>
    <link rel="stylesheet" href="../css/lab1_style.css">
</head>
<body class="center">
    <?php if (isset($_GET['message'])): ?>
        <div class="message <?php echo strpos($_GET['message'], 'Error') === 0 ? 'error' : 'success'; ?>">
            <?php echo htmlspecialchars($_GET['message']); ?>
        </div>
    <?php endif; ?>

    <h1>Welcome, <?php echo htmlspecialchars($ngo_name); ?>!</h1>
    <p>Manage your NGO profile and activities from this dashboard.</p>

    <form method="post" action="delete_account.php" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
        <fieldset>
            <legend><b>NGO Details</b></legend>
            <table>
                <tr>
                    <td><label>Registration Number:</label></td>
                    <td><?php echo htmlspecialchars($ngo_data['reg_number']); ?></td>
                </tr>
                <tr>
                    <td><label>NGO Type:</label></td>
                    <td><?php echo htmlspecialchars($ngo_data['ngo_type']); ?></td>
                </tr>
                <tr>
                    <td><label>Email:</label></td>
                    <td><?php echo htmlspecialchars($ngo_data['email']); ?></td>
                </tr>
                <tr>
                    <td><label>Website:</label></td>
                    <td><?php echo htmlspecialchars($ngo_data['website']); ?></td>
                </tr>
                <tr>
                    <td><label>Address:</label></td>
                    <td><?php echo htmlspecialchars($ngo_data['address']); ?></td>
                </tr>
                <tr>
                    <td><label>Area of Operation:</label></td>
                    <td><?php echo htmlspecialchars($ngo_data['area_operation']); ?></td>
                </tr>
                <tr>
                    <td><label>Operational Years:</label></td>
                    <td><?php echo htmlspecialchars($ngo_data['op_years']); ?></td>
                </tr>
                <tr>
                    <td><label>Tax Status:</label></td>
                    <td><?php echo htmlspecialchars($ngo_data['tax_status']); ?></td>
                </tr>
                <tr>
                    <td><label>Registration Certificate:</label></td>
                    <td>
                        <?php if (!empty($ngo_data['reg_cert'])): ?>
                            <a href="../uploads/<?php echo htmlspecialchars($ngo_data['reg_cert']); ?>" target="_blank">View Certificate</a>
                        <?php else: ?>
                            No certificate uploaded
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </fieldset>

        <br>
        <table>
            <tr>
                <td>
                    <a href="edit_profile.php"><button type="button" class="btn btn-primary">Update Profile</button></a>
                </td>
                <td>
                    <button type="submit" class="btn btn-danger" name="deletebtn">Delete Account</button>
                </td>
                <td>
                    <a href="../control/logout_control.php"><button type="button" class="btn btn-secondary">Logout</button></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
