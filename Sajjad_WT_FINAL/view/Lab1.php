<?php
include "../control/validation.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>NGO Registration Form</title>
  <link rel="stylesheet" href="../css/lab1_style.css">
  <script src="script.js"></script>
</head>
<body class="center">
  <h1>NGO Registration Form</h1>
  <hr>
  <p>Complete the information below to register your NGO in our system.</p>
  <span id="success_message"><?php echo $Success ?></span>
  <form action="" method="POST" enctype="multipart/form-data">
    
    <fieldset>
      <legend><b>Basic Information</b></legend>
      <table>
        <tr>
          <td class="label_width"><label for="ngo_name">NGO Name*:</label></td>
          <td><input type="text" id="ngo_name" name="ngo_name" size="30" value="<?php echo $_POST['ngo_name'] ?? ''; ?>"></td>
          <td><span class="error_msg"><?php echo $NnameError ?? ''; ?></span></td>
        </tr>
        <tr>
          <td class="label_width"><label for="reg_number">Registration Number*:</label></td>
          <td><input type="text" id="reg_number" name="reg_number" size="30" value="<?php echo $_POST['reg_number'] ?? ''; ?>"></td>
          <td><span class="error_msg"><?php echo $RegError ?? ''; ?></span></td>
        </tr>
        <tr>
          <td class="label_width"><label for="ngo_type">NGO Type*:</label></td>
          <td>
            <select id="ngo_type" name="ngo_type">
              <option value="">-- Select NGO Type --</option>
              <option value="education" <?php if (($_POST['ngo_type'] ?? '') == 'education') echo 'selected'; ?>>Education</option>
              <option value="healthcare" <?php if (($_POST['ngo_type'] ?? '') == 'healthcare') echo 'selected'; ?>>Healthcare</option>   
              <option value="disaster_relief" <?php if (($_POST['ngo_type'] ?? '') == 'disaster_relief') echo 'selected'; ?>>Disaster Relief</option>
              <option value="other" <?php if (($_POST['ngo_type'] ?? '') == 'other') echo 'selected'; ?>>Other</option>
            </select>
          </td>
          <td><span class="error_msg"><?php echo $NgoTypeError ?? ''; ?></span></td>
        </tr>
      </table>
    </fieldset>

    <fieldset>
      <legend><b>Contact Details</b></legend>
      <table>
        <tr>
          <td class="label_width"><label for="email">Email Address*:</label></td>
          <td><input type="email" id="email" name="email" size="30" value="<?php echo $_POST['email'] ?? ''; ?>"></td>
          <td><span class="error_msg"><?php echo $EmailError ?? ''; ?></span></td>
        </tr>
        <tr>
          <td class="label_width"><label for="website">Website URL:</label></td>
          <td><input type="url" id="website" name="website" size="30" value="<?php echo $_POST['website'] ?? ''; ?>"></td>
          <td><span class="error_msg"><?php echo $WebsiteError ?? ''; ?></span></td>
        </tr>
        <tr>
          <td class="label_width"><label for="address">Physical Address*:</label></td>
          <td><textarea id="address" name="address" rows="3" cols="31"><?php echo $_POST['address'] ?? ''; ?></textarea></td>
          <td><span class="error_msg"><?php echo $AddressError ?? ''; ?></span></td>
        </tr>
      </table>
    </fieldset>

    <fieldset>
      <legend><b>Operation Information</b></legend>
      <table>
        <tr>
          <td class="label_width"><label>Area of Operation*:</label></td>
          <td>
            <input type="checkbox" id="local" name="area_operation" value="local" <?php if (!empty($_POST['area_operation']) && $_POST['area_operation'] == 'local') echo 'checked'; ?>>
            <label for="local">Local</label>
            <input type="checkbox" id="national" name="area_operation" value="national" <?php if (!empty($_POST['area_operation']) && $_POST['area_operation'] == 'national') echo 'checked'; ?>>
            <label for="national">National</label>
          </td>
          <td><span class="error_msg"><?php echo $AreaError ?? ''; ?></span></td>
        </tr>
        <tr>
          <td class="label_width"><label for="op_years">Operational Years*:</label></td>
          <td><input type="number" id="op_years" name="op_years" value="<?php echo $_POST['op_years'] ?? ''; ?>"></td>
          <td><span class="error_msg"><?php echo $YearsError ?? ''; ?></span></td>
        </tr>
      </table>
    </fieldset>

    <fieldset>
      <legend><b>Verification Documents</b></legend>
      <table>
        <tr>
          <td class="label_width"><label>Tax Exemption Status:</label></td>
          <td>
            <input type="radio" id="exempt" name="tax_status" value="exempt" <?php if (($_POST['tax_status'] ?? '') == 'exempt') echo 'checked'; ?>>
            <label for="exempt">Tax Exempt</label>
            <input type="radio" id="not_exempt" name="tax_status" value="not_exempt" <?php if (($_POST['tax_status'] ?? '') == 'not_exempt') echo 'checked'; ?>>
            <label for="not_exempt">Not Exempt</label>
          </td>
        </tr>
        <tr>
          <td class="label_width"><label for="reg_cert">Registration-Tax Certificates:</label></td>
          <td><input type="file" id="reg_cert" name="reg_cert[]" multiple></td>
          <td><span class="error_msg"><?php echo $FileError ?? ''; ?></span></td>
        </tr>
      </table>
    </fieldset>

    <fieldset>
      <legend><b>Security Information</b></legend>
      <table>
        <tr>
          <td class="label_width"><label for="password">Create Password*:</label></td>
          <td><input type="password" id="password" name="password"></td>
          <td><span class="error_msg"><?php echo $PassError ?? ''; ?></span></td>
        </tr>
        <tr>
          <td class="label_width"><label for="confirm_password">Confirm Password*:</label></td>
          <td><input type="password" id="confirm_password" name="confirm_password"></td>
          <td><span class="error_msg"><?php echo $ConfirmPassError ?? ''; ?></span></td>
        </tr>
      </table>
    </fieldset>

    <table>
      <tr>
        <td>
          <input type="checkbox" id="terms" name="terms" <?php if (!empty($_POST['terms'])) echo 'checked'; ?>>
          <label for="terms">I agree to the <a href="">Terms and Conditions</a> and confirm that all information provided is accurate.*</label>
        </td>
      </tr>
      <tr><td><span class="error_msg"><?php echo $TermsError ?? ''; ?></span></td></tr>

      <tr>
        <td>
          <input type="checkbox" id="notifications" name="notifications" <?php if (!empty($_POST['notifications'])) echo 'checked'; ?>>
          <label for="notifications">I would like to receive email notifications.</label>
        </td>
      </tr>

      <tr>
        <td><br>
          <button id="submit_btn" type="submit">Submit for Verification</button> 
          &nbsp;&nbsp;&nbsp;
          <button id="reset_btn" type="reset">Reset Form</button>
        </td>
      </tr>
    </table>

    <p id="required_text"><small>* Required fields</small></p>
    <p> Already registered? <a href="login.php">Login here</a>
</p>
  </form>
</body>
</html>
