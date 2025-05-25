<?php

$did=$dname=$demail=$ddob=$dcity=$dtype=$drecurrper=$paymethod=$dfile=$dmno='';
$oldFileName='';

include "../Abrar_db/db_func.php";
session_start();

if(!isset($_SESSION['user'])){
    header('Location: ../view/login.php');
}else{
    $display_donor_name = $_SESSION['user'];
}
//show donor info table
$conn=CreateCon();
$res=GetSingleDonorData($conn,$_SESSION['user']);
while($row=mysqli_fetch_assoc($res)){
    $did=$row['DId'];
    $dname=$row['Dname'];
    $demail=$row['Demail'];
    $ddob=$row['Ddob'];
    $dcity=$row['Dcity'];
    $dtype=$row['Dtype'];
    $drecurrper=$row['DrecurrPeriod'];
    $paymethod=$row['DPaymethod'];
    $dfile=$row['Dfile'];
    $dmno=$row['Dmno'];
}

$_GLOBALS[$oldFileName]=$dfile;
CloseCon($conn);

if(isset($_POST['deletebtn'])){
    $conn=CreateCon();
    $res=deleteUser($conn,$_SESSION['user']);
    if($res===TRUE){
        CloseCon($conn);
        $destination = '../Abrar_uploads/';
        if (!empty($_GLOBALS[$oldFileName]) && file_exists($destination.$_GLOBALS[$oldFileName])) {
        unlink($destination.$_GLOBALS[$oldFileName]);
    }
        header("Location: login.php");
    }else{
        echo 'User could not be deleted';
    }   
}

if(isset($_POST['updatebtn'])){
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
    $update_flag=TRUE;

    if(empty($_POST["Dname"])){
        $DnameError="Field cannot be empty.";
        $update_flag=FALSE;
    }
    if(empty($_POST["Demail"])){
        $DemailError="Field cannot be empty.";
        $update_flag=FALSE;
    }
    if(empty($_POST["Ddob"])){
        $DdobError="Field cannot be empty.";
        $update_flag=FALSE;
    }
    if(empty($_POST["DCity"])){
        $DCityError="Field cannot be empty.";
        $update_flag=FALSE;
    }
    if(empty($_POST["Dontype"])){
        $DontypeError="Field cannot be empty.";
        $update_flag=FALSE;
    }
    if(empty($_POST["Paymethod"])){
        $PayMethodError="Please select a payment method.";
        $update_flag=FALSE;
    }
    if(empty($_POST["Dpass"])){
        $DpassError="Field cannot be empty.";
        $update_flag=FALSE;
    }
    if (!isset($_FILES["IDfile"]) || $_FILES["IDfile"]["error"] !== 0) {
        $IDfileError = "No file uploaded or upload error.";
        $update_flag=FALSE;
    }
    if(empty($_POST["Dmno"])){
        $DmnoError="Field cannot be empty.";
        $update_flag=FALSE;
    }else{
        if(strlen($_POST["Dmno"]) <14){
            $DmnoError="Please enter an 11 digit number";
            $update_flag=FALSE;
        }elseif(!preg_match("/\+880\d{10}/",$_POST["Dmno"])){
            $DmnoError="Number format do not match";
            $update_flag=FALSE;
        }
    }
    if(preg_match("/\d/",$_POST["Dname"])){
        $DnameError="Name cannot contains numbers.";
        $DnameInp="";
        $update_flag=FALSE;
    }
    if(!preg_match("/^[A-Za-z]+\d*@gmail.com$/",$_POST["Demail"]) && !empty($_POST["Demail"])){
        $DemailError="Email format not correct.";
        $update_flag=FALSE;
    }
    if(strlen($_POST["Dpass"]) <8 && !empty($_POST["Dpass"])){
        $DpassError="Password must be 8 char long."; 
        $update_flag=FALSE;
    }
    if($update_flag){
        global $did,$dfile;
    
    $conn=CreateCon();
    if(updateUser($conn,$did,$_POST['Dname'],$_POST["Demail"],$_POST["Ddob"],$_POST["DCity"],$_POST["Dontype"],$_POST["Recper"],$_POST["Paymethod"],$_POST['Dpass'],$_FILES['IDfile']['name'], $_POST["Dmno"])){
        echo 'User info updated,';
        // update session , cookie
        $_SESSION['user']=$_POST['Dname'];
        setcookie('user',$_POST['Dname'],time()+(86400*30),'/');
        CloseCon($conn);

        

        $conn=CreateCon();
$res=GetSingleDonorData($conn,$_SESSION['user']);
while($row=mysqli_fetch_assoc($res)){
    $did=$row['DId'];
    $dname=$row['Dname'];
    $demail=$row['Demail'];
    $ddob=$row['Ddob'];
    $dcity=$row['Dcity'];
    $dtype=$row['Dtype'];
    $drecurrper=$row['DrecurrPeriod'];
    $paymethod=$row['DPaymethod'];
    $dfile=$row['Dfile'];
    $dmno=$row['Dmno'];
}
CloseCon($conn);
    $display_donor_name = $_SESSION['user'];
    //update file in server
    if (isset($_FILES['IDfile']) && $_FILES['IDfile']['error'] === UPLOAD_ERR_OK) {
    $newfileName = $_FILES['IDfile']['name'];
    $newfilePath = $_FILES['IDfile']['tmp_name'];
    $destination = '../Abrar_uploads/';
    if (!empty($dfile) && file_exists($destination.$_GLOBALS[$oldFileName])) {
        unlink($destination.$_GLOBALS[$oldFileName]);
    }
    if (move_uploaded_file($newfilePath, $destination . $newfileName)) {
        echo 'New file updated';
    } else {
        echo 'New file could not be updated';
    }
} else {
    echo 'No file uploaded or upload error';
}



    }else{
        echo 'Update info unsuccessful.';
        CloseCon($conn);
    }

}
    }
    
?>