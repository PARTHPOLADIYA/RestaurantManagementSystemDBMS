

<?php

error_reporting(E_ERROR | E_PARSE);

include("header.php"); 


if(isset($_POST["searchBtn"]))
{   
    $_SESSION['displayEmployees']=false;
    $server="localhost";
    $username="root";
    $password="";
    $db="admin";
    $conn = mysqli_connect($server,$username,$password,$db);
    if (!$conn) {
        die("Connection failed" . mysqli_connect_error());
    }

    $branchName = $_POST["branchName"];
    $query = "select * from branchmanagement where Address = '$branchName';";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {    
            $branchId = $row["BranchId"];
        }
    }
    $revenue = 0;
    $conn = mysqli_connect($server,$username,$password,$branchName);
    $query = "select orderAmount from ordermanagement;";
    $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result))
        {    
            $orderAmount = $row["orderAmount"];
            $revenue += $orderAmount;
        }



    $_SESSION['branchName'] = $_POST["branchName"];

}

?> 

<div class="container">

    <form class="form-inline" method="POST">
        <div class="form-group">
            <label for="branchId">Branch ID</label>
            <input type="text" class="form-control" id="branchName" name="branchName" placeholder=" Enter Branch name" >
        </div>

        <div class="form-group">
            <input type="submit" class="form-control" id="searchBtn" name="searchBtn" value="Search" >
        </div>
    </form>

    <div class="row">
        <div class="col-sm-6">
            <form class="form-inline" method="POST">
                <legend>Branch Details</legend>

                <div class="form-group">
                    <label for="branchId">Branch Id</label>
                    <input disabled type="text" class="form-control" id="branchId" name="branchId" value=" <?php echo $branchId; ?> " >
                </div>

                <div class="form-group">
                    <label for="branchAddress">Branch Address</label>
                    <input disabled type="text" class="form-control" id="branchAddress" name="branchAddress" value=" <?php echo $branchName; ?>  "  >
                </div>

                <div class="form-group">
                    <label for="branchIncome">Total Revenue</label>
                    <input disabled type="text" class="form-control" id="branchIncome" name="branchIncome" value=" <?php echo $revenue; ?> " >
                </div>

            </form>
        </div>

<?php include ("branchForm.php"); ?>

<?php 

    if($_SESSION['displayEmployees']==true)
    {
        echo '<div class="form-group">
        <table  class="table table-bordered table-responsive">
    
            <thead>
                <tr>
                    <th>Emp Id</th>
                    <th>Emp Name</th>
                    <th>Address</th>
                    <th>Salary</th>
                    <th>WorkType</th>
                </tr>
            </thead>
            <tbody>
                
                    ';?><?php 
                    $server="localhost";
                    $username="root";
                    $password="";
                    $branch = $_SESSION['displayBranch'];
                    $conn = mysqli_connect($server,$username,$password,$branch);
                    $query = "select * from employeemanagement;";
                    $result = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_assoc($result))
                    {    
                        $empId =  $row["id"];
                        $empName = $row["name"];
                        $empAddress = $row["address"];
                        $empSalary = $row["salary"];
                        $workType = $row["workType"];
                        echo '<tr><td>'.$empId.'</td>';
                        echo '<td>'.$empName.'</td>';
                        echo '<td>'.$empAddress.'</td>';
                        echo '<td>'.$empSalary.'</td>';
                        echo '<td>'.$workType.'</td></tr>';
                    }
                    
                    echo '
      
                
            </tbody>
    
        </table>
    </div>';
    }

?>

</div><!--container-->