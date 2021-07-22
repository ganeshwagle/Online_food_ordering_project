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
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <style type="text/css">
  	.container-fluid{
  		margin: 10px;
  		margin-right: 100px;
  	}
    .logout{
      margin-left: 10px;
    }
    body{
background-image:url("resource/admin_background.jfif");
background-position: center;
background-repeat: no-repeat;
background-size: cover;
height: 100%;
width: 100%;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
  <img src="resource\food_icon.png" width="30" height="30" class="d-inline-block align-top" alt="" style="border-radius:3px" >
  OFOS
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
      <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="#">My cart</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Veg</a>
          <a class="dropdown-item" href="#">Non-Veg</a>
          <a class="dropdown-item" href="#">South-Indian</a>
          <a class="dropdown-item" href="#">North-Indian</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <a href="signin.php" class="btn btn-info btn-md logout" >
          <span class="glyphicon glyphicon-log-out"></span> Logout
    </a>
  </div>
</nav>
<div class="container-fluid">
	<div class="row justify-content-center text-light">
    <div class="col-md-4 col-sm-10 col-xs-12 border rounded">
    	<h2 class="text-light text-center">Add Food Item</h2>
	<form action="#" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control">	
		</div>
		<div class="form-group">
			<label for="id">Id</label>
			<input type="text" name="id" id="id" class="form-control">	
		</div>
		<div class="form-group">
			<label for="cat">Category</label>
			<input type="text" name="cat" id="cat" class="form-control">	
		</div>
		<div class="form-group">
			<label for="price">Price</label>
			<input type="number" name="price" id="price" class="form-control">	
		</div>
		<div class="form-group">
			<label for="description">Description</label>
			<input type="text" name="description" id="description" class="form-control">	
		</div>
		<div class="form-group">
			<label for="file" class="form-label">Food Image</label>
			<input class="form-control form-control-sm" id="file" type="file" name="file" />
		</div>
		<div class="text-center">
		<button class="btn btn-primary" type="submit" name="submit">Submit</button>
	</div>
	<br>
	</form>
</div>
</div>
</div>
<?php
function upload()
{
      $con = mysqli_connect("localhost","root","","food");
      $name = $_POST['name'];
      $id = $_POST['id'];
      $cat = $_POST['cat'];
      $price = $_POST['price'];
      $desc =$_POST['description'];
      $file = $_FILES['file'];
      $filename = $file['name'];
      $fileerror = $file['error'];
      $filetmp = $file['tmp_name'];
      $filetext = explode('.',$filename);
      $filecheck = strtolower(end($filetext));
      $fileextstored = array('pnp','jpg','jpeg','jfif');
      if(in_array($filecheck,$fileextstored))
      {
        $destinationfile = 'resource/food_images/'.$filename;
        move_uploaded_file($filetmp,$destinationfile);
      $query = "insert into food values('$name','$id','$desc',$price,'$cat','$destinationfile');";
       $result = mysqli_query($con, $query);
        $msg = $name." Successfully added to the database";
        ?>
      <script type="text/javascript"> 
      var msg = "<?php echo $msg;?>"
      alert(msg); 
      </script> 
      <?php
      }
}
if(isset($_POST['submit']))
{
  upload();
}
include("footer.php");
?>
</body>
</html>