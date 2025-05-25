<?php
include '../control/login_control.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>NGO Login Form</title>
  <link rel="stylesheet" href="../css/lab1_style.css">
  <script src="script.js"></script>
</head>
<body class="center">
  <h1>NGO Login Form</h1>
  <form action="" method="POST" >
    <fieldset>
      <legend><b>Login</b></legend>
      <table>
        <tr>
          <td class="label_width"><label for="ngo_name">NGO Name*:</label></td>
          <td><input type="text" id="ngo_name" name="ngo_name" size="30"></td>
          <td><span class="error_msg"><?php echo $LNnameError ?></span></td>
        </tr>
        <tr>
          <td class="label_width"><label for="password">Password*:</label></td>
          <td><input type="password" id="password" name="password"></td>
          <td><span class="error_msg"><?php echo $LPassError?></span></td>
        </tr>
      </table>
    </fieldset>
      <tr>
        <td><br>
          <button id="submit_btn" type="submit" name="Login">Login</button> 
          &nbsp;&nbsp;&nbsp;
          <button id="reset_btn" type="reset">Reset Form</button>
        </td>
      </tr>
    </table>
  </form>
</body>
</html>  
