<!DOCTYPE html>
<html lang="en">
<head>
  <title>online food delivery</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <style type="text/css">
    .logout{
      margin-left: 10px;
    }
body{
background-image:url("../resource/background.jfif");
background-position: center;
background-repeat: no-repeat;
background-size: cover;
height: 100%;
width: 100%;
}
</style>
</head>
<div class="container">
	<div class="row no-gutters">
<?php
include("../header.php");
?>
</div>
</div> 
<br>
<body>
<div class="container-fluid">

	<div class="row justify-content-center ">
			<?php
					$connection = mysqli_connect("localhost","root","","food");
					$user_query = "select * from food";
					$result = mysqli_query($connection, $user_query);
					$num_rows = mysqli_num_rows($result);
					while($res = mysqli_fetch_array($result))
					{	
						echo"
						<div class='col-lg-3 col-md-5 col-sm-5 col-8 '>
						
								<div class='card'>
									<img src='../".$res['path']."' class='card.img ' style='height:200px;'>
									<div class='card-body'>
										<h4 class='card-title text-center'>".$res['name']."</h4>
										<p class='card-text text-center'>$".$res['price']."</p>
										<div class='card-footer'>
										<a href='#'' class='btn btn-primary d-block'>Add to Cart</a>
										</div>
									</div>
								</div>
							<br>
						</div>
				";
					}
				?>
		</div>

</div>
<?php
include("../footer.php");
?>
</body>
</html>