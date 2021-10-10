<?php
$database="id17738753_flutter_database";
$database_user="id17738753_user_databse";
$database_password="d14oec9f>L}[tG=B";
$database_host="localhost";

$return["error"]=false;
$return["message"]="";
$con=new mysqli($database_host,$database_user,$database_password,$database);

if($con->connect_error)
{
die("failed conection".$con->connect_error);
}
if(!empty($_POST["Name"])and!empty($_POST["Email"]))
{
	$name=$_POST["Name"];
	$email=$_POST["Email"];
	$name=mysqli_real_escape_string($con,$Name);
	$email=mysqli_real_escape_string($con,$Email);
	$stmt=$con->prepare("INSERT INTO user_data (Name,Email) VALUES(?,?)");
	if($stmt)
	{
	$stmt->bind_param("ss",$Name,$Email);
    $stmt->	execute();
	$stmt->close();
	$return["error"]=false;
	$return["message"]="success";
	}
	else{
	$return["error"]=true;
	$return["message"]="failed";	
	
	
	
	}
}
else
{
$return["error"]=true;
	$return["message"]="ALL VALURES youy REQUIRED";	 	
}
$con->close();
header('content-Type:application/json');
echo json_encode($return);
?>