<html>
<head>
<meta charset="UTF-8">
<script>
window.onload = function() {
<?php
$op=$on=$ap=$an=$bp=$bn=$abp=$abn=0;
$op1=$on1=$ap1=$an1=$bp1=$bn1=$abp1=$abn1=0;
$conn=new mysqli("localhost","root","","bloodbank");
if($conn->connect_error){
    die("Connection error:".$conn->connect_error);
}
$sql="SELECT `bgroup`,COUNT(`bgroup`) FROM `donors` GROUP BY `bgroup`";
$result=$conn->query($sql);
if($result->num_rows>0){
    while($record=$result->fetch_assoc()){
        if($record['bgroup']=='o+'){
            $op=$record["COUNT(`bgroup`)"];   
        }
        elseif($record['bgroup']=='o-'){
            $on=$record["COUNT(`bgroup`)"];   
        }
        elseif($record['bgroup']=='a+'){
            $ap=$record["COUNT(`bgroup`)"];   
        }
        elseif($record['bgroup']=='a-'){
            $an=$record["COUNT(`bgroup`)"];   
        }
        elseif($record['bgroup']=='b+'){
            $bp=$record["COUNT(`bgroup`)"];   
        }
        elseif($record['bgroup']=='b-'){
            $bn=$record["COUNT(`bgroup`)"];   
        }
        elseif($record['bgroup']=='ab+'){
            $abp=$record["COUNT(`bgroup`)"];   
        }
        elseif($record['bgroup']=='ab-'){
            $abn=$record["COUNT(`bgroup`)"];   
        }
    }
}

$sql1="SELECT `bgroup`,COUNT(`bgroup`) FROM `emergency` GROUP BY `bgroup`";
$result1=$conn->query($sql1);
if($result1->num_rows>0){
    while($record1=$result1->fetch_assoc()){
        if($record1['bgroup']=='o+'){
            $op1=$record1["COUNT(`bgroup`)"];   
        }
        elseif($record1['bgroup']=='o-'){
            $on1=$record1["COUNT(`bgroup`)"];   
        }
        elseif($record1['bgroup']=='a+'){
            $ap1=$record1["COUNT(`bgroup`)"];   
        }
        elseif($record1['bgroup']=='a-'){
            $an1=$record1["COUNT(`bgroup`)"];   
        }
        elseif($record1['bgroup']=='b+'){
            $bp1=$record1["COUNT(`bgroup`)"];   
        }
        elseif($record1['bgroup']=='b-'){
            $bn1=$record1["COUNT(`bgroup`)"];   
        }
        elseif($record1['bgroup']=='ab+'){
            $abp1=$record1["COUNT(`bgroup`)"];   
        }
        elseif($record1['bgroup']=='ab-'){
            $abn1=$record1["COUNT(`bgroup`)"];   
        }
    }
}
?>
var chart = new CanvasJS.Chart("noOfDonors", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Number of Donors respective to blood group"
	},
	data: [{
		type: "line",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - {y}",
		dataPoints: [
			{ y: <?php echo "$op";?>, label: "O+ve" },
			{ y: <?php echo "$on";?>, label: "O-ve" },
			{ y: <?php echo "$ap";?>, label: "A+ve" },
			{ y: <?php echo "$an";?>, label: "A-ve" },
			{ y: <?php echo "$bp";?>, label: "B+ve" },
			{ y: <?php echo "$bn";?>, label: "B-ve" },
			{ y: <?php echo "$abp";?>, label: "AB+ve" },
            { y: <?php echo "$abn";?>, label: "AB-ve" }
		]
	}]
});
chart.render();

var chart = new CanvasJS.Chart("noOfDonors1", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Number of Donors registered for emergency respective to blood group"
	},
	data: [{
		type: "line",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - {y}",
		dataPoints: [
			{ y: <?php echo "$op1";?>, label: "O+ve" },
			{ y: <?php echo "$on1";?>, label: "O-ve" },
			{ y: <?php echo "$ap1";?>, label: "A+ve" },
			{ y: <?php echo "$an1";?>, label: "A-ve" },
			{ y: <?php echo "$bp1";?>, label: "B+ve" },
			{ y: <?php echo "$bn1";?>, label: "B-ve" },
			{ y: <?php echo "$abp1";?>, label: "AB+ve" },
            { y: <?php echo "$abn1";?>, label: "AB-ve" }
		]
	}]
});
chart.render();
}
</script>
</head>
<body bgcolor="#ffbe76">
<div id="noOfDonors" style="height: 250px; max-width: 920px; margin: 0px auto;"></div><br>
<div id="noOfDonors1" style="height: 250px; max-width: 920px; margin: 0px auto;"></div>
<script src="canvasjs.min.js"></script>
</body>
</html>