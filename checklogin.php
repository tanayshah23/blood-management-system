<?php
session_start();
$uname=$_POST["uname"];
$pass=$_POST["pass"];
$_SESSION['username']=$uname;

$ser="localhost";
$u="root";
$pwd="";
$db="bloodbank";
$conn=new mysqli($ser,$u,$pwd,$db);
if($conn->connect_error){
    die("Connection error: ".$$conn->connect_error);
}
$sql="SELECT `Password` FROM `donors` WHERE `Username`='$uname'";
$result=$conn->query($sql);
$record=$result->fetch_assoc();
if($result->num_rows>0){
    if($record['Password']==$pass){
        header('Location: option.html');
    }
    else{
        echo "<body bgcolor='#ffbe76'>";
        echo "<br><br><br><br><br><br><center><h1><i>Invalid Password</i></h1></center>";
    }
}
else{
    echo "<body bgcolor='#ffbe76'>";
    echo "<br><br><br><br><br><br><center><h1><i>Invalid username</i></h1></center>";
}
?>