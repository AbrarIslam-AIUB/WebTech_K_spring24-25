<?php
include "../Abrar_Control/dashbControl.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="dashbstyle.css" rel="stylesheet">
</head>
<body>
    <h3>Hello, <?php  echo $display_donor_name ?></h3>
    <a href="../Abrar_Control/logoutControl.php">log out</a>

    

    <table id='showTable'>
    <tr>
        <th>Donor ID</th>
        <th>Donor name</th>
        <th>Donor email</th>
        <th>Donor DOB</th>
        <th>Donor city</th>
        <th>Donor type</th>
        <th>Recurrence period</th>
        <th>Payment method</th>
        <th>Donor file</th>
        <th>Donor mobile no.</th>
        <th>Action</th> 
    </tr>
    <tr>
        <td><?php echo $did ?></td>
        <td><?php echo $dname ?></td>
        <td><?php echo $demail ?></td>
        <td><?php echo $ddob ?></td>
        <td><?php echo $dcity ?></td>
        <td><?php echo $dtype ?></td>
        <td><?php echo $drecurrper ?></td>
        <td><?php echo $paymethod ?></td>
        <td><?php echo "<img src='../Abrar_uploads/$dfile' alt='NID Image' width='150'>"; ?></td>
        <td><?php echo $dmno ?></td>
        <td>
            <form method="post" onsubmit="return confirm('Are you sure you want to delete your account? This cannot be undone.');">
                <button type="submit" name="deletebtn">Delete</button>
            </form>
        </td>
    </tr>
</table>

<form action='' method='post' enctype="multipart/form-data">
    <fieldset id='updateFS'>
        <table>
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
                        <option value="rajshahi">Rajshahi</option>
                        <option value="sylhet">Sylhet</option>
                        <option value="chittagong">Chittagong</option>
                    </select>
                </td>
                <td><p id="DCityP"><?php echo $DCityError ?></p></td>
            </tr>
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
                <td><label for="Dpass">Password :</label></td>
                <td><input type="password" name="Dpass" id="Dpass"></td>
                <td><p id="DpassP"><?php echo $DpassError ?></p></td>
            </tr>
            <tr>
                <td><label for="IDfile">Upload NID(.jpg/.png):</label></td>
                <td><input type="file" name="IDfile" id="IDfile"></td>
                <td><p id="IDfileP"><?php echo $IDfileError ?></p></td>
            </tr>
            <tr>
                <td><label for="Dmno">Mobile Number:</label></td>
                <td><input type="text" name="Dmno" id="Dmno" placeholder="+8801(3/7/8)xxxxxxxx"></td>
                <td><p id="DmnoP"><?php echo $DmnoError ?></p></td>
            </tr>
            <tr>
            <td colspan="3">
                
            </td>
        </tr>
        </table>
        <button type='submit' name='updatebtn'>Update</button>
    </fieldset>
   
    </form>

</body>
</html>