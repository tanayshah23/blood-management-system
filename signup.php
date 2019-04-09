<?php
$uname=$_POST["uname"];
$pass=$_POST["pass"];
$name=$_POST["name"];
$dob=$_POST["dob"];
$city=$_POST["city"];
$bgroup=$_POST["bgroup"];
$ph=$_POST["ph"];
$email=$_POST["email"];

$ser="localhost";
$user="root";
$pwd="";
$db="bloodbank";
$conn=new mysqli($ser,$user,$pwd,$db);
if($conn->connect_error){
    die("Connection error: ".$conn->connect_error);
}
$sql="INSERT INTO `donors`(`Username`, `Password`, `Name`, `dob`, `bgroup`, `City`, `phone no`, `email`,`Status`) VALUES ('$uname','$pass','$name','$dob','$bgroup','$city','$ph','$email','Available')";
if($conn->query($sql)===TRUE){
    header('Location: ty.html');
}
else{
    echo "<body bgcolor='#ffbe76'><center><h1>User already exists!</h1></center></body>";
}
?>