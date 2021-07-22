<?php

error_reporting(0);

$con = mysqli_connect("localhost","root","","food");

if(isset($_POST['submit'])){
$email = $_POST['email'];
$name = $_POST['name'];
$password1 =  mysqli_escape_string($con,$_POST['password1']);
$password2 =  mysqli_escape_string($con,$_POST['password2']);
if($password1!=$password2)
{
	$password_error = "Passwords does not match!!";
}
$query = "select * from customer where email = '$email' ";
$result = mysqli_query($con, $query);
$count = mysqli_num_rows($result);
if($count>0)
{
	$id_error = "That emial is already taken!!";
}
if(!isset($password_error) && !isset($id_error))
{
	$query = "insert into customer values('$email','$name','$password1');";
	$result = mysqli_query($con, $query);
	$count = mysqli_num_rows($result);
	 if($result>0){
     session_start();
     $_SESSION['email'] = $email;
      header("location:home.php");
    }
    else
    {
      ?>
      <script type="text/javascript"> 
      alert("Sorry something went wrong!!"); 
      </script> 
      <?php
    }
}
else
{
	include("signup.php");
}
}

?>
