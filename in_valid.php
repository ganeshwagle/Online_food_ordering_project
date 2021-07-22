<?php

session_start();
error_reporting(0);

$con = mysqli_connect("localhost","root","","food");

if(isset($_POST['password']) && isset($_POST['email'])){
$email = $_POST['email'];
$password =  mysqli_escape_string($con,$_POST['password']);
$query = "select * from customer where email = '$email' ";
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
    $_SESSION['email'] = $result["email"];
	header("location:home.php");
}
else{
include("signin.php");
session_destroy();
}
}
else{
	$id_error = "Invalid Email!!";
    include("signin.php");
	session_destroy();
}
}

?>