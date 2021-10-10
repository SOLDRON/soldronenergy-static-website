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
if(!empty($_POST["name"])and!empty($_POST["email"]))
{
	$name=$_POST["name"];
	$email=$_POST["email"];
	$name=mysqli_real_escape_string($con,$name);
	$email=mysqli_real_escape_string($con,$email);
	$stmt=$con->prepare("INSERT INTO user_data (name,email) VALUES(?,?)");
	if($stmt)
	{
	$stmt->bind_param("ss",$name,$email);
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
