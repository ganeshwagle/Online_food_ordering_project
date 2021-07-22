<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-default">
  <div class="container-fluid">
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
      <a class="nav-link" href="home.php">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="veg.php">Veg</a>
          <a class="dropdown-item" href="nonveg.php">Non-Veg</a>
          <a class="dropdown-item" href="south.php">South-Indian</a>
          <a class="dropdown-item" href="north.php">North-Indian</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_login.php">Admin Login</a>
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
</div>
</nav>