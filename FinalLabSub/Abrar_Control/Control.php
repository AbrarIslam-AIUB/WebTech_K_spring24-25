<?php

include "../Abrar_db/db_func.php";

$DnameError="";
$DemailError="";
$DdobError="";
$DCityError="";
$DontypeError="";
$DpassError="";
$IDfileError="";
$DmnoError="";
$DnameInp="";
$toserror="";
$PayMethodError="";
$db_flag=TRUE;

if(isset($_POST["Submit"])){
    if(empty($_POST["Dname"])){
        $DnameError="Field cannot be empty.";
        $db_flag=FALSE;
    }
    if(empty($_POST["Demail"])){
        $DemailError="Field cannot be empty.";
        $db_flag=FALSE;
    }
    if(empty($_POST["Ddob"])){
        $DdobError="Field cannot be empty.";
        $db_flag=FALSE;
    }
    if(empty($_POST["DCity"])){
        $DCityError="Field cannot be empty.";
        $db_flag=FALSE;
    }
    if(empty($_POST["Dontype"])){
        $DontypeError="Field cannot be empty.";
        $db_flag=FALSE;
    }
    if(empty($_POST["Paymethod"])){
        $PayMethodError="Please select a payment method.";
        $db_flag=FALSE;
    }
    if(empty($_POST["Dpass"])){
        $DpassError="Field cannot be empty.";
        $db_flag=FALSE;
    }
    if(empty($_POST["Dconpass"])){
        $DconpassError="Field cannot be empty.";
        $db_flag=FALSE;
    }
    if (!isset($_FILES["IDfile"]) || $_FILES["IDfile"]["error"] !== 0) {
        $IDfileError = "No file uploaded or upload error.";
        $db_flag = FALSE;
    }
    
    
    if(empty($_POST["Dmno"])){
        $DmnoError="Field cannot be empty.";
        $db_flag=FALSE;
    }else{
        if(strlen($_POST["Dmno"]) <14){
            $DmnoError="Please enter an 11 digit number";
            $db_flag=FALSE;
        }elseif(!preg_match("/\+880\d{10}/",$_POST["Dmno"])){
            $DmnoError="Number format do not match";
            $db_flag=FALSE;
        }
    }
    if(!isset($_POST["tos"])){
        $toserror="Must agree to the terms and conditions !";

    }
    if(preg_match("/\d/",$_POST["Dname"])){
        $DnameError="Name cannot contains numbers.";
        $DnameInp="";
        $db_flag=FALSE;
    }
    if(!preg_match("/^[A-Za-z]+\d*@gmail.com$/",$_POST["Demail"]) && !empty($_POST["Demail"])){
        $DemailError="Email format not correct.";
        $db_flag=FALSE;
    }
    if(strlen($_POST["Dpass"]) <8 && !empty($_POST["Dpass"])){
        $DpassError="Password must be 8 char long."; 
        $db_flag=FALSE;
    }
    if($_POST["Dpass"]  !== $_POST["Dconpass"] && !empty($_POST["Dconpass"])){
        $DconpassError="Passwords do not match.";
        $db_flag=FALSE;
    }
    if($db_flag===TRUE){
        $conn= CreateCon();
        InsertVal($conn,$_POST["Dname"],$_POST["Demail"],$_POST["Ddob"],$_POST["DCity"],$_POST["Dontype"],$_POST["Recper"],$_POST["Paymethod"],$_POST["Dconpass"],$_FILES['IDfile']['name'],$_POST["Dmno"]);
        CloseCon($conn);

        //file upload on server
    
$filename = $_FILES['IDfile']['name'];
$filepath = $_FILES['IDfile']['tmp_name'];
$destinationPath = '/Applications/XAMPP/xamppfiles/htdocs/labworks/Abrar_uploads/';

if (is_uploaded_file($filepath)) {
    if (move_uploaded_file($filepath, $destinationPath . $filename)) {
        //echo "File uploaded successfully.";
        header("Location: ../view/login.php");
    } else {
        echo "File move failed.";
    }
} else {
    echo 'File was not uploaded.';
}
    }

    //$Success="Registration successful";
    
    
    
}

?>