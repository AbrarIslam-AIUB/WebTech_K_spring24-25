<?php
include "../Abrar_Control/Control.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor form</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div id="logoDiv"></div>
    <h1>Donor Information</h1>
    <p><i>Help out the world by filling out the information below and joining our team.</i></p>
    <hr>
    <form action="" method="post" onsubmit="return ValidateForm()">

    <fieldset>
        <legend><b>Personal Information</b></legend>
        <table>
            <td><p id="alertmsg"></p></td>
            <tr>
                <td><label for="Dname">Name &nbsp;</label></td>
                <td><input type="text" name="Dname" id="DnameID" placeholder="ex. Steve Jobs" value="<?php echo htmlspecialchars($DnameInp)?>"></td>
                <td><p id="DnameP"><?php echo $DnameError ?></p></td>
            </tr>
            <tr>
                <td><label for="Demail">Email </label></td>
                <td><input type="text" name="Demail" id="Demail" placeholder="ex. abc@gmail.com"></td>
                <td><p id="DemailP"><?php echo $DemailError ?></p></td>
            </tr>
            <tr>
                <td><label for="Ddob">Date of Birth &nbsp;</label></td>
                <td><input type="date" name="Ddob" id="Ddob"></td>
                <td><p id="DoBP"><?php echo $DdobError ?></p></td>
            </tr>
            <tr>
                <td><label for="DCity">City </label></td>
                <td>
                    <select name="DCity" id="DCity">
                        <option value="none" disabled selected >Select your city</option>
                        <option value="dhaka">Dhaka</option>
                        <option value="raj">Rajshahi</option>
                        <option value="syl">Sylhet</option>
                        <option value="ctg">Chittagong</option>
                    </select>
                </td>
                <td><p id="DCityP"><?php echo $DCityError ?></p></td>
            </tr>
        </table>
    </fieldset>
    <br>
    <fieldset>
        <legend><b>Donation Preferences</b></legend>
        <table>
            <tr>
                <td><label for="Dontype">Donation type :</label></td>
                <td><input type="radio" name="Dontype" id="Dontype1" value="SingleTime" >Single time</td>
                <td><input type="radio" name="Dontype" id="Dontype2" value="Recurring" >Recurring</td>
                <td><p id="DonTypeP"><?php echo $DontypeError ?></p></td></td>

            </tr>
            <tr>
                <td><label for="Recper">Recurrence period:</label></td>
                <td colspan="2"> 
                    <select name="Recper" id="Recper">
                        <option value="" selected disabled >Select recurrence period</option>
                        <option value="monthly">Monthly</option>
                        <option value="quarterly">Quarterly</option>
                        <option value="yearly">Yearly</option>
                    </select>
                </td>
                <td><p id="recperP"></p></td>
            </tr>
            <tr>
                <td><label for="Paymethod">Payment method:</label></td>
                <td><input type="radio" name="Paymethod" id="Paymethod1" value="cash">Cash</td>
                <td><input type="radio" name="Paymethod" id="Paymethod2" value="card">Card</td>
                <td><input type="radio" name="Paymethod" id="Paymethod3" value="onlineTrans">Online Banking</td>
                <td><p id="PaymethodP"><?php echo $PayMethodError ?></p></td>
            </tr>
            
            <tr>
                <td><label for="Dlimit">Donation limit:</label></td>
                <td><input type="range" name="Dlimit" id="Dlimit" min="0" max="50000" required></td>
            </tr>
    
            
        </table>
    </fieldset>
    <br>
    <fieldset>
        <legend><b>Security Information</b></legend>   
        <table>
            <tr>
                <td><label for="Dpass">Password :</label></td>
                <td><input type="password" name="Dpass" id="Dpass"></td>
                <td><p id="DpassP"><?php echo $DpassError ?></p></td>
            </tr>
            <tr>
                <td><label for="Dconpass">Confirm password :</label></td>
                <td><input type="password" name="Dconpass" id="Dconpass"></td>
                <td><p id="DConpassP"><?php echo $DconpassError ?></p></td>
            </tr>
            <tr>
                <td><label for="IDfile">Upload NID(.jpg/.png):</label></td>
                <td><input type="file" name="IDfile" id="IDfile"></td>
                <td><p id="IDfileP"><?php echo $IDfileError ?></p></td>
            </tr>
            <tr>
                <td><label for="AddIndoTA">Additional Information:</label></td>
                <td><textarea name="" id="AddInfoTA"></textarea></td>
                <td><p id="AddInfoP"></p></td>
            </tr>
            <tr>
                <td><label for="Dmno">Mobile Number:</label></td>
                <td><input type="text" name="Dmno" id="Dmno" placeholder="+8801(3/7/8)xxxxxxxx"></td>
                <td><p id="DmnoP"><?php echo $DmnoError ?></p></td>
            </tr>
        </table> 
    </fieldset>
    <button type="submit" id="submitBtn" name="Submit">Submit form</button>
                 <button type="reset" id="resetBtn">Reset information</button>
    <br>
    <hr>
    <label for="Anon">Would you like your donation to be anonymous?</label>
    <input type="checkbox" name="Anon" id="Anon">Yes
    <span id="optspan"> *optional</span>
    <br>
    <input type="checkbox" name="tos" id="tos">
    <label for="tos">I agree to the <a href="">Terms and Services</a>.</label>
    <span id="tosSpan"><?php echo $toserror?></span>
    <br>
    <br>
    </form>
    
</body>
</html>

