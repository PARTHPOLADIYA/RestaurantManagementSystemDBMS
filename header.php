<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant Management System</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body id="OrderPage">
    <header class="container-fluid">
    <nav>
        <div class="row">
            <div class="col-sm-8">   
                <img id="navImg" src="images/bgimg.png" class="img-fluid" alt="navimg">
            </div>
            <div class="col-sm-4">
                <h3 id="empName"><?php echo $_SESSION['userID'];  ?></h3>

                <button><a id="logoutBtn" href="logout.php">Logout</a></button>
            </div>
        </div>
    </nav>
    </header>
    <hr>