<?php
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
if(isset($_POST["Submit"])){
    if(empty($_POST["Dname"])){
        $DnameError="Field cannot be empty.";
    }
    if(empty($_POST["Demail"])){
        $DemailError="Field cannot be empty.";
    }
    if(empty($_POST["Ddob"])){
        $DdobError="Field cannot be empty.";
    }
    if(empty($_POST["DCity"])){
        $DCityError="Field cannot be empty.";
    }
    if(empty($_POST["Dontype"])){
        $DontypeError="Field cannot be empty.";
    }
    if(empty($_POST["Paymethod"])){
        $PayMethodError="Please select a payment method.";
    }
    if(empty($_POST["Dpass"])){
        $DpassError="Field cannot be empty.";
    }
    if(empty($_POST["Dconpass"])){
        $DconpassError="Field cannot be empty.";
    }
    if(empty($_POST["IDfile"])){
        $IDfileError="Field cannot be empty.";
    }
    if(empty($_POST["Dmno"])){
        $DmnoError="Field cannot be empty.";
    }else{
        if(strlen($_POST["Dmno"]) <14){
            $DmnoError="Please enter an 11 digit number";
        }elseif(!preg_match("/\+880\d{10}/",$_POST["Dmno"])){
            $DmnoError="Number format do not match";
        }
    }
    if(!isset($_POST["tos"])){
        $toserror="Must agree to the terms and conditions !";
    }
    if(preg_match("/\d/",$_POST["Dname"])){
        $DnameError="Name cannot contains numbers.";
        $DnameInp="";
    }
    if(!preg_match("/^[A-Za-z]+\d*@gmail.com$/",$_POST["Demail"]) && !empty($_POST["Demail"])){
        $DemailError="Email format not correct.";
    }
    if(strlen($_POST["Dpass"]) <8 && !empty($_POST["Dpass"])){
        $DpassError="Password must be 8 char long."; 
    }
    if($_POST["Dpass"]  !== $_POST["Dconpass"] && !empty($_POST["Dconpass"])){
        $DconpassError="Passwords do not match.";
    }
    
    
}

?>