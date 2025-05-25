<?php 
session_start();
include "../model/db.php";

$LNnameError = '';
$LPassError = '';
$LoginError = '';

if(isset($_POST['Login'])){
    if(empty($_POST['ngo_name'])){
        $LNnameError = 'Please fill up NGO name field';
    }
    if(empty($_POST['password'])){
        $LPassError = 'Please fill up password field';
    }
    if(!empty($_POST['ngo_name']) && !empty($_POST['password'])){
        $conn=CreateCon();
        $storedPass=GetPass($conn,$_POST['ngo_name']);
        if($storedPass===$_POST['password']){
            $_SESSION['user']=$_POST['ngo_name'];
            setcookie('user',$_POST['ngo_name'],time()+(86400*30),'/');
            header('Location:../view/dashboard.php');
        }else{
            echo 'Password not correct.';
        }

    }
}
?>
