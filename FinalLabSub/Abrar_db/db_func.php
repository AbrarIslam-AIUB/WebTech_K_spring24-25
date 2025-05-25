<?php 
$hostname = "localhost";
$username = "root";
$pass = "";
$dbname = "Webtech_db";

function CreateCon() {
    global $hostname, $username, $pass, $dbname;
    return mysqli_connect($hostname, $username, $pass, $dbname);
}

function InsertVal($conn, $Dname, $Demail, $dob, $Dcity, $Dtype, $Dper, $DpayMethod, $Dpass, $Dfile, $Dmno) {

    $qry = "INSERT INTO Donors (Dname, Demail, Ddob, Dcity, Dtype, DrecurrPeriod, DPaymethod, Dpass, Dfile, Dmno)
            VALUES ('$Dname', '$Demail', '$dob', '$Dcity', '$Dtype', '$Dper', '$DpayMethod', '$Dpass', '$Dfile', '$Dmno')";
    
    if ($conn->query($qry)) {
        echo "Data inserted successfully";
    } else {
        echo "Data insertion failed: " . $conn->error;
    }
}

function GetPass($conn,$name){
    $qry = "SELECT * FROM Donors WHERE Dname='$name'";
    $res = mysqli_query($conn,$qry);
    if(mysqli_num_rows($res)>0){
        while($row = mysqli_fetch_assoc($res)){
            return $row['Dpass'];
        }
    }else{
        echo 'No user found.';
    }
}

function GetSingleDonorData($conn,$name){
    $qry = "SELECT * FROM Donors WHERE Dname='$name'";
    $res = mysqli_query($conn,$qry);
    if(mysqli_num_rows($res)>0){
        return $res;
    }else{
        echo 'No single user found.';
    }
}

function deleteUser($conn,$name){
    $qry="DELETE FROM Donors WHERE Dname='$name'";
    if(mysqli_query($conn,$qry)){
        return TRUE;
    }else{
        return FALSE;
    }
}

function updateUser($conn,$did,$Dname, $Demail, $dob, $Dcity, $Dtype, $Dper, $DpayMethod, $Dpass,$Dfile,$Dmno){
    $qry="UPDATE Donors SET Dname='$Dname',Demail='$Demail', Ddob='$dob', Dcity='$Dcity', Dtype='$Dtype', DrecurrPeriod='$Dper', DPaymethod='$DpayMethod', Dpass='$Dpass',Dfile='$Dfile', Dmno='$Dmno' WHERE DId='$did'";
    if(mysqli_query($conn,$qry)){
        return TRUE;
    }else{
        echo "Error: " . mysqli_error($conn);
        return FALSE;
    }
}
function CloseCon($conn) {
    $conn->close();
}
?>
