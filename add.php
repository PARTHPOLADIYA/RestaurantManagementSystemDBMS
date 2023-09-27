<?php

error_reporting(E_ERROR | E_PARSE);
include ("functions.php");

    $error ="";
    if(isset($_POST["employeeName"]) && isset($_POST["employeeId"]) && isset($_POST["employeeAddress"]) && isset($_POST["employeeSalary"]) && isset($_POST["workType"]))
    {
        
        $empId = $_POST["employeeId"];
        $empName = $_POST["employeeName"];
        $empAddress = $_POST["employeeAddress"];
        $empSalary = $_POST["employeeSalary"];
        $workType = $_POST["workType"];
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
        $query = "create table if not exists employeeManagement(id varchar(255), name varchar(255), address varchar(255), salary int, workType varchar(255), PRIMARY KEY(id) );";
        mysqli_query($conn,$query);

        $query = "insert into employeeManagement (id,name,address,salary,workType) values('$empId','$empName','$empAddress','$empSalary','$workType' );";
     
        mysqli_query($conn,$query);



    }
    
    header("location: admin.php");
    ?>