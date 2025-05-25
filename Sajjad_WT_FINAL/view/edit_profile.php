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
    <title>Edit NGO Profile</title>
    <link rel="stylesheet" href="../css/lab1_style.css">
</head>
<body class="center">
    <h1>Edit Profile</h1>
    <p>Update your NGO information below.</p>

    <form method="post" action="../control/edit_profile_control.php">
        <fieldset>
            <legend><b>Update NGO Details</b></legend>
            <table>
                <tr>
                    <td><label>Registration Number:</label></td>
                    <td><input type="text" name="reg_number" value="<?php echo htmlspecialchars($ngo_data['reg_number']); ?>" required></td>
                </tr>
                <tr>
                    <td><label>NGO Type:</label></td>
                    <td>
                        <select name="ngo_type" required>
                            <option value="Charitable" <?php echo ($ngo_data['ngo_type'] == 'Charitable') ? 'selected' : ''; ?>>Charitable</option>
                            <option value="Educational" <?php echo ($ngo_data['ngo_type'] == 'Educational') ? 'selected' : ''; ?>>Educational</option>
                            <option value="Religious" <?php echo ($ngo_data['ngo_type'] == 'Religious') ? 'selected' : ''; ?>>Religious</option>
                            <option value="Social" <?php echo ($ngo_data['ngo_type'] == 'Social') ? 'selected' : ''; ?>>Social</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Email:</label></td>
                    <td><input type="email" name="email" value="<?php echo htmlspecialchars($ngo_data['email']); ?>" required></td>
                </tr>
                <tr>
                    <td><label>Website:</label></td>
                    <td><input type="url" name="website" value="<?php echo htmlspecialchars($ngo_data['website']); ?>"></td>
                </tr>
                <tr>
                    <td><label>Address:</label></td>
                    <td><textarea name="address" required><?php echo htmlspecialchars($ngo_data['address']); ?></textarea></td>
                </tr>
                <tr>
                    <td><label>Area of Operation:</label></td>
                    <td><input type="text" name="area_operation" value="<?php echo htmlspecialchars($ngo_data['area_operation']); ?>" required></td>
                </tr>
                <tr>
                    <td><label>Operational Years:</label></td>
                    <td><input type="number" name="op_years" value="<?php echo htmlspecialchars($ngo_data['op_years']); ?>" required></td>
                </tr>
                <tr>
                    <td><label>Tax Status:</label></td>
                    <td>
                        <select name="tax_status" required>
                            <option value="Tax Exempt" <?php echo ($ngo_data['tax_status'] == 'Tax Exempt') ? 'selected' : ''; ?>>Tax Exempt</option>
                            <option value="Taxable" <?php echo ($ngo_data['tax_status'] == 'Taxable') ? 'selected' : ''; ?>>Taxable</option>
                        </select>
                    </td>
                </tr>
            </table>
        </fieldset>

        <br>
        <table>
            <tr>
                <td>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </td>
                <td>
                    <a href="dashboard.php"><button type="button" class="btn btn-secondary">Cancel</button></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
