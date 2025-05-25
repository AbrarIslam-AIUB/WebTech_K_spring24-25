<?php 
session_start();
include "../Abrar_db/db_func.php";
$nameErr='';
$passErr='';
$credentialError='';

if(isset($_POST['Submit'])){
    if(empty($_POST['Dname'])){
        $nameErr='please fill up name field';
    }
    if(empty($_POST['Dpass'])){
        $passErr='please fill up password field';
    }
    if(!empty($_POST['Dname']) && !empty($_POST['Dpass'])){
        $conn=CreateCon();
        $storedPass=GetPass($conn,$_POST['Dname']);
        if($storedPass===$_POST['Dpass']){
            $_SESSION['user']=$_POST['Dname'];
            setcookie('user',$_POST['Dname'],time()+(86400*30),'/');
            header('Location:../view/dashboard.php');
        }else{
            echo 'Password not correct.';
        }

    }
}
?>