<?php

$servername = "localhost";
$dbname = "smart_student";
$username = "root";
$password = "";

//create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

//check connection
if(!$conn){
	die("Connection failed: " . mysqli_connect_errno());
}

$sql = "SELECT * FROM notification";
$exam = mysqli_query($conn,$sql);

$s="";

if(mysqli_num_rows($exam)>0){
	echo '{
	"exam":[';

	while($row = mysqli_fetch_assoc($exam)){

		$s.=json_encode($row).",";

	}

	echo substr($s,0,-1);

	echo "]
	       }";

}

?>
