<?php
session_start();
$u=$_SESSION["username"];
$dcity=$_GET["City"];
$hos=$_GET["Hospital"];
$time=$_GET["time"];
$date=$_GET["date"];
$conn= new mysqli("localhost","root","","bloodbank");
if($conn->connect_error){
    die("Connection error:".$conn->connect_error);
}
echo '<body bgcolor="#ffbe76"><br><br><br><br><center>';
$sql1="SELECT * FROM `donors` WHERE `Username`='$u'";
$result=$conn->query($sql1);
$record=$result->fetch_assoc();
if($result->num_rows>0){
    $name=$record["Name"];
    $dob=$record["dob"];
    $bgroup=$record["bgroup"];
    $phone=$record["phone no"];
    $email=$record["email"];
    $sql2="INSERT INTO `hospitalreg`(`Name`, `dob`, `bgroup`, `phone number`, `email`, `City`, `Hospital`, `Date`, `Time`) VALUES ('$name','$dob','$bgroup','$phone','$email','$dcity','$hos','$date','$time')";
    if($conn->query($sql2)===TRUE){
        echo "<h1>Congratulations $name, your appointment has been fixed on $date $time at $hos,$dcity.<br> SEE YOU THERE! &#128522</h1>";
    }
    else{
        echo "Error!";
    }
}
echo '</center>';
?>