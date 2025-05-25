<?php

function CreateCon(){
  return new mysqli("localhost", "root", "", "WT_Sajjad");
}

function InsertData($conn, $ngo_name, $reg_number, $ngo_type, $email, $website, $address, $area_operation, $op_years, $tax_status, $reg_cert, $password, $terms, $notifications){

  $sql = "INSERT INTO ngo_registration (ngo_name, reg_number, ngo_type, email, website, address, area_operation, op_years, tax_status, reg_cert, password, terms, notifications) VALUES ('$ngo_name', '$reg_number', '$ngo_type', '$email', '$website', '$address', '$area_operation', '$op_years', '$tax_status', '$reg_cert', '$password', '$terms', '$notifications')";

  if (mysqli_query($conn, $sql)) 
  {
    return true;
  } 
  else {
    return false;
  }
}

function closeCon($conn) {
  mysqli_close($conn);
}

function GetPass($conn, $ngo_name) {
    $sql = "SELECT password FROM ngo_registration WHERE ngo_name = '$ngo_name'";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0){
        while($row = mysqli_fetch_assoc($res)){
            return $row['password'];
        }
    }else{
        echo 'No user found.';
    }
}

function UpdateNGOProfile($conn, $ngo_name, $reg_number, $ngo_type, $email, $website, $address, $area_operation, $op_years, $tax_status) {
    $sql = "UPDATE ngo_registration SET 
            reg_number = '" . mysqli_real_escape_string($conn, $reg_number) . "',
            ngo_type = '" . mysqli_real_escape_string($conn, $ngo_type) . "',
            email = '" . mysqli_real_escape_string($conn, $email) . "',
            website = '" . mysqli_real_escape_string($conn, $website) . "',
            address = '" . mysqli_real_escape_string($conn, $address) . "',
            area_operation = '" . mysqli_real_escape_string($conn, $area_operation) . "',
            op_years = '" . mysqli_real_escape_string($conn, $op_years) . "',
            tax_status = '" . mysqli_real_escape_string($conn, $tax_status) . "'
            WHERE ngo_name = '" . mysqli_real_escape_string($conn, $ngo_name) . "'";

    return mysqli_query($conn, $sql);
}

function DeleteNGOAccount($conn, $ngo_name) {
    $sql = "DELETE FROM ngo_registration WHERE ngo_name = '" . mysqli_real_escape_string($conn, $ngo_name) . "'";
    return mysqli_query($conn, $sql);
}

?>
