<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
include ("functions.php");

$server="localhost";
$username="root";
$password="";
$db=$_SESSION['db'];
$orderItems = array();
$orderId=null;
$error="";
$clear=false;


$conn = mysqli_connect($server,$username,$password,$db);
if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}


$createOrderTable = "create table if not exists ordermanagement(orderId int NOT NULL AUTO_INCREMENT, orderItems varchar(255), orderAmount int, paymentType varchar(20), date varchar(20),time varchar(20), PRIMARY KEY (orderId))";
mysqli_query($conn,$createOrderTable);



if(isset($_POST["addItem"]))
{
   
   
    if(!$_POST["orderItems"] || !$_POST["orderId2"])
    {
        $error = "Select items from the list";
    }
    else
    {
        $error="";
        $orderId = $_POST["orderId2"];

        $query = "select orderItems from orderManagement where orderId='$orderId'";
        $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {    
            $orderItemsdb =  $row["orderItems"];
        }
    }
        $orderItem = $_POST["orderItems"];
        $query = "select Price from menu where ItemName='$orderItem'";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {    
                $amount =  $row["Price"];
            }
        }

        $orderItems = $orderItemsdb.", ".$orderItem; 
        
        $query = "update orderManagement set orderItems = '$orderItems',orderAmount=orderAmount+'$amount' where orderId='$orderId'";
        //$query = "update orderManagement set orderItems = '$orderItems ' where orderId='$orderId'";
        mysqli_query($conn,$query);
    }

}


if(isset($_POST["generateBtn"]))
{
    
    global $clear;
    global $orderId;
    global $orderItems;
    $clear = false;
    // $query = "INSERT INTO ordermanagement(paymentType) values ('')";
    $query = "INSERT INTO ordermanagement(orderAmount) values (0)";
    mysqli_query($conn,$query);

    $query = "SELECT orderId FROM orderManagement ORDER BY orderId DESC LIMIT 1;";
    $result = mysqli_query($conn,$query);


    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {    
            $orderId =  $row["orderId"];
           
        }

    }

    $date = date("Y/m/d");
    $time = date("h:i:sa");
  

    $query = "update orderManagement set date = '$date', time='$time' where orderId='$orderId'";
    mysqli_query($conn,$query);


}

if(isset($_POST["clearBtn"]))
{
    $clear = true;
}

if(isset($_POST["generateBill"]))
{

    if($_POST["orderIdbill"] && $_POST["paymentMethod"])
    {
        $error2 = "";
        global $orderAmountf, $finalAmountf,$orderIdf,$orderItemsf,$orderDatef,$discountf,$error2;
        $orderIdf = $_POST["orderIdbill"];
        $query = "select * from orderManagement where orderId='$orderIdf';";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result) > 0)
        {
        while($row = mysqli_fetch_assoc($result))
        {    
            $orderAmountf = $row['orderAmount'];
            $orderItemsf = $row['orderItems'];
            $orderDatef = $row['date'];
        }
        }
        $discountf = $_POST["orderDiscount"];

        $finalAmountf = (int)$orderAmountf - (((int)$orderAmountf / 100) * (int)$discountf);

            $paymentMethod = $_POST["paymentMethod"];
          
            $query = "update orderManagement set orderAmount = '$finalAmountf', paymentType='$paymentMethod' where orderId='$orderIdf'";
            mysqli_query($conn,$query);
   }
   else
    {
        $error2 = "Please enter valid credentials";
    }

}

?>



   <?php include("header.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <form class="form-inline" method="POST">

                    <legend>Generate New Order</legend>
                    <hr>
                    <fieldset>
                        <div class="form-group">
                            <label for="orderId">Order Id</label>
                            <input disabled type="text" class="form-control" id="orderId" name="orderId" placeholder=" <?php clearForm($orderId); ?>" >
                        </div>

                        <div class="form-group">
                            <label for="orderDate">Date</label>
                            <input disabled type="text" class="form-control" id="orderDate" name="orderDate" placeholder=" <?php clearForm($date); ?> ">
                        </div>

                        <div class="form-group">
                            <label for="orderTime">Time</label>
                            <input disabled type="text" class="form-control" id="orderTime" name="orderTime"  placeholder=" <?php clearForm($time); ?>">
                        </div>

                        <div class="form-group">
                            <button id="generateBtn" name="generateBtn">Generate</button>
                            <button name="clearBtn">Clear</button>
                        </div>
                    </fieldset>
                </form>

            </div>

            <div class="col-sm-6">
            <form class="form-inline" method="POST">
                <legend>Add Item to existing Order</legend>
                <hr>
                    <div class="form-group">
                        <label for="orderId">Order Id</label>
                        <input type="text" class="form-control" id="orderId2" name="orderId2">
                    </div>

                    <div class="form-group">
                                <label>Order Items</label>
                                <select class="form-control" name="orderItems">
                                    <option disabled selected value="0">Choose Items</option>
                                    <?php FetchItems($conn) ?>
                                </select>
                                <button name="addItem">Add Item </button>
                                <p><?php echo $error; ?></p>
                    </div>
                </form>
            </div>
        </div><!--Row-->
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <form class="form-inline" method="POST">

                    <legend>Generate Bill</legend>
                    <hr>
                    <fieldset>
                        <div class="form-group">
                            <label for="orderIdbill">Order Id</label>
                            <input type="text" class="form-control" id="orderIdbill" name="orderIdbill" >
                        </div>

                        <div class="form-group">
                            <label for="orderAmount1">Order Amount</label>
                            <input disabled type="text" class="form-control" id="orderAmount1" name="orderAmount1" placeholder="<?php echo $orderAmountf; ?>">
                            <label for="orderId">Discount (%)</label>
                            <input type="text" class="form-control" id="orderDiscount" name="orderDiscount">
                      
                        </div>

                        <div class="form-group">
                        <label>Payment</label>
                            <select class="form-control" name ="paymentMethod">
                                <option disabled selected value="0">Choose Payment Method</option>
                                <option>Card</option>
                                <option>UPI</option>
                                <option>Cash</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Generate Bill" id="generateBill" name="generateBill">
                            <p><?php echo $error2; ?></p>
                        </div>
                    </fieldset>
                </form>
            </div>

            <div class="col-sm-6">
                <form class="form-inline" method="POST">

                    <h4>Display Bill</h4>
                    <hr>
                    
                    <fieldset id="bill">
                    <legend>Koukh Al Shay</legend>
                    <p class="lead"><?php echo $orderDatef; ?></p>
                        <div class="form-group">
                            <label for="orderIdbill">Order Id</label>
                            <input disabled type="text" class="form-control" id="orderIdbill" name="orderIdbill" value="<?php echo $orderIdf; ?>" >
                        </div>

                        <div class="form-group">
                            <label for="orderItemsBill">Order Items</label>
                              <table>
                                
                              <?php  $chars = str_split($orderItemsf);
                                        $count =0;
                                    foreach ($chars as $char) {
                                    if($char==",")
                                    {
                                        echo "<br>".++$count.". ";
                                    }
                                    else
                                    {
                                        echo "<tr>".$char."</tr>";
                                    }
                                    } ?>
                              </table>                            
                              <br>                      
                                                                                                                        
                            
                        </div>

                        <div class="form-group">
                            <label for="orderAmount">Order Amount</label>
                            <input disabled type="text" class="form-control" id="orderAmount" name="orderAmount1" value="<?php echo $orderAmountf; ?>">

                            <label for="orderId">Discount (%)</label>
                            <input disabled type="text" class="form-control" id="orderDiscount" name="orderDiscount" value=" <?php echo $discountf; ?> ">
                            <label for="orderAmount">Final Amount</label>

                            <input disabled type="text" class="form-control" id="finalAmount" name="finalAmount" value="<?php echo $finalAmountf; ?>">
                        </div>

                        <div class="form-group">
                            <input type="button" value="Print Bill" id="printBill" name="printBill">
                        </div>

                    </fieldset>
                </form>
                
   
                        

            </div>
        </div><!--Row-->
    </div><!--Container-->

    <?php include ("footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>