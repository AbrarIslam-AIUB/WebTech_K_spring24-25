<?php
include '../Abrar_Control/loginControl.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="loginstyle.css" rel="stylesheet">
</head>
<body>
    <fieldset>
        <legend>Login</legend>
    <form action="" method="post">  
    <table>
        <tr>
            <td><label for="Dname">Name &nbsp;</label></td>
            <td><input type="text" name="Dname" id="DnameID" placeholder="ex. Steve Jobs" value="<?php echo htmlspecialchars($DnameInp)?>"></td>
            <td><p id="DnameP"><?php echo $nameErr ?></p></td>
        </tr>
        <tr>
                <td><label for="Dpass">Password </label></td>
                <td><input type="password" name="Dpass" id="Dpass"></td>
                <td><p id="DpassP"><?php echo $passErr ?></p></td>
        </tr>
        <tr>
            <td><button type="submit" id="submitBtn" name="Submit">Submit form</button></td>
            <td><button type="reset" id="resetBtn">Reset information</button></td>
        </tr>
    </table>
    </form>
</fieldset>

</body>
</html>