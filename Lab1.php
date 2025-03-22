<!DOCTYPE html>
<html>
<head>
  <title>NGO Registration Form</title>
</head>
<body>
  <h1>NGO Registration Form</h1>
  <hr>
  <p>Complete the information below to register your NGO in our system.</p>
  <form action="Lab1_Submit.php" method="POST">
    <fieldset>
      <legend><b>Basic Information</b></legend>
      <table cellpadding="3" width="90%">
        <tr>
          <td width="15%"><label for="ngo_name">NGO Name*:</label></td>
          <td><input type="text" id="ngo_name" name="ngo_name" size="30" required></td>
        </tr>
        <tr>
          <td width="15%"><label for="reg_number">Registration Number*:</label></td>
          <td><input type="text" id="reg_number" name="reg_number" size="30" required></td>
        </tr>
        <tr>
          <td width="15%"><label for="ngo_type">NGO Type*:</label></td>
          <td>
              <select id="ngo_type" name="ngo_type" required>
                  <option value="">-- Select NGO Type --</option>
                  <option value="education">Education</option>
                  <option value="healthcare">Healthcare</option>   
                  <option value="disaster_relief">Disaster Relief</option>
                  <option value="other">Other</option>
              </select>
          </td>
        </tr>
      </tr>
      </table>
    </fieldset>

    <fieldset>
      <legend><b>Contact Details</b></legend>
      <table cellpadding="3" width="90%">
        <tr>
          <td width="15%"><label for="email">Email Address*:</label></td>
          <td><input type="email" id="email" name="email" size="30" required</td>
        </tr>
        <tr>
          <td width="15%"><label for="website">Website URL:</label></td>
          <td><input type="url" id="website" name="website" size="30" placeholder="https://www.example.org" required</td>
        </tr>
      <tr>
          <td width="15%"><label for="address">Physical Address*:</label></td>
          <td><textarea id="address" name="address" rows="3" cols="31" required></textarea></td>
      </tr>
      </table>
    </fieldset>

    <fieldset>
      <legend><b>Operation Information</b></legend>
      <table cellpadding="3" width="90%">
        <tr>
          <td width="15%"><label>Area of Operation*:</label></td>
          <td>
            <input type="checkbox" id="local" name="area_operation" value="local">
            <label for="local">Local</label><br>
            <input type="checkbox" id="national" name="area_operation" value="national">
            <label for="national">National</label><br>
          </td>
        </tr>
        <tr>
        <td width="15%"><label for="op_years">Operational Years*:</label></td>
        <td><input type="number" id="op_years" name="op_years" min="1" max="50" required></td>
      </tr>
      </table>
    </fieldset>

    <fieldset>
      <legend><b>Verification Documents</b></legend>
      <table cellpadding="3" width="90%">
          <tr>
              <td width="15%"><label>Tax Exemption Status*:</label></td>
              <td>
                  <input type="radio" id="exempt" name="tax_status" value="exempt" required>
                  <label for="exempt">Tax Exempt</label><br>
                  <input type="radio" id="not_exempt" name="tax_status" value="not_exempt">
                  <label for="not_exempt">Not Exempt</label>
              </td>
          </tr>
          <tr>
          <td width="15%"><label for="reg_cert">Registration-Tax Certificates*:</label></td>
          <td><input type="file" id="reg_cert" name="reg_cert" multiple required></td>
        </tr>
      </table>
    </fieldset>

    <fieldset>
      <legend><b>Security Information</b></legend>
      <table cellpadding="3" width="90%">
          <tr>
              <td width="15%"><label for="password">Create Password*:</label></td>
              <td><input type="password" id="password" name="password" minlength="8" required></td>
          </tr>
          <tr>
              <td width="15%"><label for="confirm_password">Confirm Password*:</label></td>
              <td><input type="password" id="confirm_password" name="confirm_password" minlength="8" required></td>
          </tr>
      </table>
  </fieldset>

  <fieldset>
    <legend><b>Dashboard Theme</b></legend>
    <table cellpadding="3" width="90%">
      <tr>
        <td width="15%"><label for="theme">Color Scheme:</label></td>
        <td><input type="color" id="theme" name="theme"></td>
      </tr>
    </table>
  </fieldset>

    <table cellpadding="3" width="90%">
        <tr>
            <td>
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">I agree to the <a href="">Terms and Conditions</a> and confirm that all information provided is accurate.*</label>
            </td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" id="notifications" name="notifications">
                <label for="notifications">I would like to receive email notifications.</label>
            </td>
        </tr>
        <tr>
            <td><br>
                <button type="submit">Submit for Verification</button> 
                &nbsp;&nbsp;&nbsp;
                <button type="reset">Reset Form</button>
            </td>
        </tr>
    </table>
    
  <p><small>* Required fields</small></p>

  </form>
</body>

</html>
