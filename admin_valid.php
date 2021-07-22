<?php

session_start();
error_reporting(0);

$con = mysqli_connect("localhost","root","","food");

if(isset($_POST['password']) && isset($_POST['id'])){
$id = $_POST['id'];
$password =  mysqli_escape_string($con,$_POST['password']);
$query = "select * from admin where id = '$id' ";
$result = mysqli_query($con, $query);
$count = mysqli_num_rows($result);
if($count>0)
{
$result = mysqli_fetch_assoc($result);
if($result["password"] != $password)
{
	$password_error = "Incorrect Password!!";
}
if(!isset($password_error))
{
    $_SESSION['admin_id'] = $result["id"];
	header("location:admin_page.php");
}
else{
include("admin_login.php");
session_destroy();
}
}
else{
	$id_error = "Invalid Admin ID!!";
    include("admin_login.php");
	session_destroy();
}
}

?>