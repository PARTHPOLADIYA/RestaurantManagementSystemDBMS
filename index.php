
<?php

session_start();


include("functions.php");
$server="localhost";
$username="root";
$dbpassword="";
$db="NULL";


if(isset($_POST["loginBtn"]))
{
   $userID = validateFormData($_POST["userId"]); 
   $password = validateFormData( $_POST["password"]);

   if(str_contains($userID,"KT"))
   {
    $db = "kothrud";
   }
   else if(str_contains($userID,"CP"))
   {
    $db = "camp";
   }
   else if(str_contains($userID,"PP"))
   {
    $db = "pimpri";
   }
   elseif(strcmp($userID,"admin") == 0 && strcmp($password,"admin@69") == 0)
   {
    $db = "admin";
    $conn = mysqli_connect($server,$username,$dbpassword,$db);
    $_SESSION['db'] = $db;
    $_SESSION['userID'] = $userID;
    if (!$conn)
    {
      die("Connection failed" . mysqli_connect_error());
    }
    else
    {
      header("location: admin.php");
      exit();
    }
   }
   else
   {
    echo "Invalid User id";
   }

   try
   {
      $conn = mysqli_connect($server,$username,$dbpassword,$db);
      $_SESSION['db'] = $db;
      $_SESSION['userID'] = $userID;

      if (!$conn)
      {
        die("Connection failed" . mysqli_connect_error());
      }
      else
      {
        header("location: orders.php");
      }
   }
   catch(Exception $e)
   {
    die("Exception occured ". $e->getMessage());
   }  
}


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Staff Login</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
  <header class="container-fluid">
    <nav>
        <div class="row">
            <div class="col-sm-12">   
                <img id="navImg" src="images/bgimg.png" class="img-fluid" alt="navimg">
            </div>
  
        </div>
    </nav>
    </header>

  <div class="container ">
    <div class="row">
              <div class="col-sm-6">
                  <form  id="form-login" method="POST">
                      <fieldset>
                          <legend><h3>Staff Login</h3></legend>
                          <hr>
                          <div class="form-group">
                              <label for="userId">User Id</label>
                              <input type="text" id="userId" name="userId" class="form-control">
                          </div>                                        
                          
                          <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" id="password" name="password" class="form-control">
                          </div>
                          
                          <button name="loginBtn" id="loginBtn">Login</button>
                      </fieldset>
                  </form>
              </div><!--col-sm-6-->
      </div><!--row-->
  </div><!--Container-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>