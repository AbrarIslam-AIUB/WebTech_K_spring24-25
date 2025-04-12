<!DOCTYPE html>
<html>
<head>
  <title>NGO Registration Form</title>
  <link rel="stylesheet" href="lab1_style.css">
  <script src="script.js"></script>
</head>
<body class="center">
  <h1>NGO Registration Form</h1>
  <hr>
  <p>Complete the information below to register your NGO in our system.</p>
  <form action="Lab1_Submit.php" onsubmit="return validateForm()" method="POST">
    <fieldset>
      <legend><b>Basic Information</b></legend>
      <table>
        <tr>
          <td class="label_width"><label for="ngo_name">NGO Name*:</label></td>
          <td><input type="text" id="ngo_name" name="ngo_name" size="30"></td>
          <td><span id="ngo_name_error" class="error_msg"></span></td>
        </tr>
        <tr>
          <td class="label_width"><label for="reg_number">Registration Number*:</label></td>
          <td><input type="text" id="reg_number" name="reg_number" size="30"></td>
          <td><span id="reg_number_error" class="error_msg"></span></td>
        </tr>
       

        <tr>
          <td class="label_width"><label for="ngo_type">NGO Type*:</label></td>
          <td>
            <select id="ngo_type" name="ngo_type">
              <option value="">-- Select NGO Type --</option>
              <option value="education">Education</option>
              <option value="healthcare">Healthcare</option>   
              <option value="disaster_relief">Disaster Relief</option>
              <option value="other">Other</option>
            </select>
          </td>
          <td><span id="ngo_type_error" class="error_msg"></span></td>
        </tr>

      </table>
    </fieldset>

    <fieldset>
      <legend><b>Contact Details</b></legend>
      <table>
        <tr>
          <td class="label_width"><label for="email">Email Address*:</label></td>
          <td><input type="email" id="email" name="email" size="30"></td>
          <td><span id="email_error" class="error_msg"></span></td>
        </tr>
      

        <tr>
          <td class="label_width"><label for="website">Website URL:</label></td>
          <td><input type="url" id="website" name="website" size="30" placeholder="https://www.example.org"></td>
          <td><span id="website_error" class="error_msg"></span></td>
        </tr>

        <tr>
          <td class="label_width"><label for="address">Physical Address*:</label></td>
          <td><textarea id="address" name="address" rows="3" cols="31"></textarea></td>
          <td><span id="address_error" class="error_msg"></span></td>
        </tr>
      </table>
    </fieldset>

    <fieldset>
      <legend><b>Operation Information</b></legend>
      <table>
        <tr>
          <td class="label_width"><label>Area of Operation*:</label></td>
          <td>
            <input type="checkbox" id="local" name="area_operation" value="local">
            <label for="local">Local</label>
            <input type="checkbox" id="national" name="area_operation" value="national">
            <label for="national">National</label>
          </td>
          <td><span id="area_operation_error" class="error_msg"></span></td>
        </tr>

        <tr>
          <td class="label_width"><label for="op_years">Operational Years*:</label></td>
          <td><input type="number" id="op_years" name="op_years"></td>
          <td><span id="op_years_error" class="error_msg"></span></td>
        </tr>
      </table>
    </fieldset>

    <fieldset>
      <legend><b>Verification Documents</b></legend>
      <table>
        <tr>
          <td class="label_width"><label>Tax Exemption Status:</label></td>
          <td>
            <input type="radio" id="exempt" name="tax_status" value="exempt">
            <label for="exempt">Tax Exempt</label>
            <input type="radio" id="not_exempt" name="tax_status" value="not_exempt">
            <label for="not_exempt">Not Exempt</label>
          </td>
        </tr>
        <tr>
          <td class="label_width"><label for="reg_cert">Registration-Tax Certificates:</label></td>
          <td><input type="file" id="reg_cert" name="reg_cert" multiple></td>
        </tr>

      </table>
    </fieldset>

    <fieldset>
      <legend><b>Security Information</b></legend>
      <table>
        <tr>
          <td class="label_width"><label for="password">Create Password*:</label></td>
          <td><input type="password" id="password" name="password" minlength="8"></td>
          <td><span id="password_error" class="error_msg"></span></td>
        </tr>

        <tr>
          <td class="label_width"><label for="confirm_password">Confirm Password*:</label></td>
          <td><input type="password" id="confirm_password" name="confirm_password" minlength="8"></td>
          <td><span id="confirm_password_error" class="error_msg"></span></td>
        </tr>

      </table>
    </fieldset>

    <fieldset>
      <legend><b>Dashboard Theme</b></legend>
      <table>
        <tr>
          <td class="label_width"><label for="theme">Color Scheme:</label></td>
          <td><input type="color" id="theme" name="theme"></td>
        </tr>
      </table>
    </fieldset>

    <table>
      <tr>
        <td>
          <input type="checkbox" id="terms" name="terms">
          <label for="terms">I agree to the <a href="">Terms and Conditions</a> and confirm that all information provided is accurate.*</label>
        </td>
      </tr>
      <tr><td><span id="terms_error" class="error_msg"></span></td></tr>

      <tr>
        <td>
          <input type="checkbox" id="notifications" name="notifications">
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
  </form>
</body>
</html>
