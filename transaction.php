<?php 

if(isset($_GET['food_id']))
{
	$id = $_GET['food_id'];
	$cust_id = $_GET['cust_id'];
	$connection = mysqli_connect("localhost","root","","food");
	$user_query = "select * from food where id='$id';";
	$result = mysqli_query($connection, $user_query);
	$res = mysqli_fetch_array($result);
	$path = $res['path'];
	$price = $res['price'];
	$f_name = $res['name'];
	$user_query = "select * from customer where email='$cust_id';";
	$result = mysqli_query($connection, $user_query);
	$res = mysqli_fetch_array($result);
	$name = $res['name'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>online food delivery</title>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <link rel="stylesheet" type="text/css" href="css/transaction.css">
     <style type="text/css">
     	.img-left{
     			background: url("<?php echo $path?>") center;
     			width: 45%;
				background-size: cover;
     		}	
     </style>
</head>
<body>
<div class="container">
	<div class="row px-3">
		<div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
			<div class="img-left d-none d-md-flex">
			</div>
			<div class="card-body">
				<h4 class="title text-center mt-4">
				Transaction Page
				</h4>
				<form class="form-box px=3" method="post" action="#">
					<div class="form-input">
 							<h4 class="form-control my-3">Food Name : <?php echo $f_name ?></h4>
 					</div>
					<div class="form-input">
 							<h4 class="form-control my-3">Price : <?php echo $price ?></h4>
 					</div>
					<div class="form-input">
 							<h4 class="form-control my-3"><?php echo $name?></h4>
 					</div>
 					<div class="form-input">
 							<input type="tel" class="form-control my-3" id="phone" name="phone" placeholder="Your Number" required>
 					</div>
 					<div class="form-input">
 							<input type="text" class="form-control my-3" name="address" placeholder="Delivery address" required>
 					</div>
 					
 					<div class="form-input">
 							<input type="number" class="form-control my-3" name="quantity" placeholder="Quantity" required>
 					</div>
 					<div class="mb-3">
 							<button type="submit" class="btn btn-primary btn-block" name="submit">Buy</button>
 						</div>
 					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
function buy()
{
      global $price,$id,$cust_id,$f_name,$name;
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $quantity = $_POST['quantity'];
      $res = bcmul($price, $quantity,3);
      $con = mysqli_connect("localhost","root","","food");
      $user_query = "INSERT INTO order_details(`quantity`, `price`, `address`, `phone`, `pay_mode`, `food_id`, `cust_id`) VALUES ($quantity,$res,'$address',$phone,'cod','$id','$cust_id');";
	  $result = mysqli_query($con, $user_query);
	  $msg="";
        if($result>0){
      ?>
      <script type="text/javascript"> 
      	var msg = "Name:<?php echo $name ?>\r\nFood:<?php echo $f_name ?>\r\nQuantity:<?php echo $quantity ?>\r\nPrice:<?php echo $res ?>\r\nDelivery Address:$address\r\nYour order has been placed successfully!!"
      alert(msg); 
      </script> 
     <?php
 }
 else
 {
 	?>
 	 <script type="text/javascript"> 
      alert("Oops something went wrong!!"); 
      </script> 
      <?php
 }
  	   unset($_POST);
		unset($_REQUEST);
		$_POST['submit']=null;
       $_POST = array();

   }
if(isset($_POST['submit']))
{
  buy();
}
?>

</body>
</html>

