<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online food ordering</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/admin_login.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid bg">
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12"></div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <form action="admin_valid.php" method="post" class="form-container">
            <h1>Admin Login</h1>   
            <div class="form-group">
                    <label>Admin ID</label>
                    <input type="text" class="form-control" id = "username" name="id" placeholder="Admin ID" required>
                    <?php if(isset($id_error)){
                        echo "<p style='color:#e60017'>".$id_error."</p>" ;
                     } ?>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <?php if(isset($password_error)){
                        echo "<p style='color:#e60017'>".$password_error."</p>" ;
                     } ?>
                </div>
                <button type="submit" class="btn btn-success btn-block">Signin</button>
                <div class="anchor">
                <a href="#">Forgot Password?</a>
                </div>
            </form>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12"></div>
    </div>
</div>

</body>
</html>