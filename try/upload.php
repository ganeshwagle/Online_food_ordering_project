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
</head>
<body>
<?php 

     if(isset($_POST['submit']))
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
?>
</body>
</html>