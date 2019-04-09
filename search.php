<html>
<head>
    <style>
        table,td,th{
            border-collapse: collapse;
            border: 3px solid black;
            text-align: center;
        }
        th{
            font-weight: normal;
            font-family: cursive;
        }
    </style>
</head>
<?php
$bg=$_GET["bg"];
$loc=$_GET["location"];

echo "<body bgcolor='#ffbe76'>";

$ser="localhost";
$user="root";
$pwd="";
$db="bloodbank";
$conn= new mysqli($ser,$user,$pwd,$db);
if($conn->connect_error){
    die("Connection error:".$connect_error);
}

if($bg == "o+"){
    $sql="SELECT distinct* FROM `emergency` WHERE `bgroup` IN ('o+','o-') AND `City`='$loc' AND `Status`='Available'";
}
elseif($bg == "o-"){
    $sql="SELECT distinct* FROM `emergency` WHERE `bgroup` IN ('o-') AND `City`='$loc' AND `Status`='Available'";
}
elseif($bg == "a+"){
    $sql="SELECT distinct* FROM `emergency` WHERE `bgroup` IN ('o+','o-','a+','a-') AND `City`='$loc' AND `Status`='Available'";
}
elseif($bg == "a-"){
    $sql="SELECT distinct* FROM `emergency` WHERE `bgroup` IN ('o-','a-') AND `City`='$loc' AND `Status`='Available'";
}
elseif($bg == "b+"){
    $sql="SELECT distinct* FROM `emergency` WHERE `bgroup` IN ('o+','o-','b+','b+') AND `City`='$loc' AND `Status`='Available'";
}
elseif($bg == "b-"){
    $sql="SELECT distinct* FROM `emergency` WHERE `bgroup` IN ('o-','b-') AND `City`='$loc' AND `Status`='Available'";
}
elseif($bg == "ab+"){
    $sql="SELECT distinct* FROM `emergency` WHERE `City`='$loc' AND `Status`='Available'";
}
else{
    $sql="SELECT distinct* FROM `emergency` WHERE `bgroup` IN ('o-','a-','b-','ab-') AND `City`='$loc' AND `Status`='Available'";
}

$result=$conn->query($sql);
if($result->num_rows>0){
    echo "<center><table border='1'><tr><th style='width:150px'>Name</th><th style='width:150px'>Phone Number</th><th style='width:150px'>Date of Birth</th><th style='width:200px'>Email</th><th style='width:150px'>Blood Group</th>";
    while($record=$result->fetch_assoc()){
        echo "<tr><td>".$record["Name"]."</td><td>".$record["phone number"]."</td><td>".$record["dob"]."</td><td>".$record["email"]."</td><td>".$record["bgroup"]."</h4></td></tr>";

    }
    echo "</table><center>";
}else{
    echo "<center><h1>Sorry! No donor is available.</h1></center>";
}
?>
</html>