<?php
session_start();
$u=$_SESSION["username"];
$st=$_GET['status'];
echo '<body bgcolor="#ffbe76">';

$conn= new mysqli("localhost","root","","bloodbank");
if($conn->connect_error){
    die("Connection error:".$connect_error);
}
if($st==="ava"){
    $sql1 ="UPDATE `donors` SET `Status`='Available' WHERE `Username`='$u'";
    $sql2 ="UPDATE `emergency` SET `Status`='Available' WHERE `Name` in (SELECT `Name` FROM `donors` WHERE `Username`='$u')";
}
else{
    $sql1 ="UPDATE `donors` SET `Status`='Not Available' WHERE `Username`='$u'";
    $sql2 ="UPDATE `emergency` SET `Status`='Not Available' WHERE `Name` in (SELECT `Name` FROM `donors` WHERE `Username`='$u')";
}
if($conn->query($sql1)===True and $conn->query($sql2)===True){
    echo "<center><h1><br><br><br><br>Updation Successful</br></br></br></br></h1></center>";
}
else {
    echo "<center><h1>Error</h1></center>";
}
?>