<?php

error_reporting(E_ERROR | E_PARSE);
include ("functions.php");

    $error ="";
    if(isset($_POST["employeeId"]))
    {
        
        $empId = $_POST["employeeId"];
       
        if(str_contains($empId,"CP"))
        {
            $error ="";
            $db = "camp";
        }
        else if(str_contains($empId,"PP"))
        {
            $error ="";
            $db = "pimpri";
        }
        else if(str_contains($empId,"KT"))
        {
            $error ="";
            $db = "kothrud";
        }
        else
        {
            $error = "Invalid Employee Id";
        }
        $server="localhost";
        $username="root";
        $password="";
        $conn = mysqli_connect($server,$username,$password,$db);
        if (!$conn) {
            die("Connection failed" . mysqli_connect_error());
        }
        $query = "DELETE FROM employeemanagement WHERE id='$empId' ;";
        mysqli_query($conn,$query);
       
    }
    header("location: admin.php");
    ?>