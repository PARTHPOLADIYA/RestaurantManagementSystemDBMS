<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include ("functions.php");

    $error ="";
    if(isset($_POST["branchName"]))
    {
        
        $branchName = $_POST["branchName"];

        $server="localhost";
        $username="root";
        $password="";
        $conn = mysqli_connect($server,$username,$password,$branchName);
        if (!$conn) {
            die("Connection failed" . mysqli_connect_error());
        }
        $query = "SELECT * FROM employeemanagement;";
        $result = mysqli_query($conn,$query);
        $_SESSION['displayEmployees'] = true;
        $_SESSION['displayBranch']=$branchName;
    }
    else
    {
        
    }
    header("location: admin.php");

   
        

    
    
    ?>