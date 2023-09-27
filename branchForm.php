



        <div class="col-sm-6">
            <form class="form-inline" method="POST">
                <legend>Employee Management</legend>

                <div class="form-group">
                    <input type="submit" class="form-control empBtns" id="addEmployee" name="addEmployee" value="Add Employee" >
                </div>

                <div class="form-group">
                    <input type="submit" class="form-control empBtns" id="removeEmployee" name="removeEmployee" value="Remove Employee" >
                </div>


                <div class="form-group">
                    <input type="submit" class="form-control empBtns" id="displayEmployee" name="displayEmployee" value="Display Employees" >
                </div>
            </form>
            <?php 

            if(isset($_POST["addEmployee"]))
            {
                $_SESSION['displayEmployees'] = false;
                include ("addEmployee.php");
                
            }
            elseif(isset($_POST["removeEmployee"]))
            {
                $_SESSION['displayEmployees'] = false;
                include ("removeEmployee.php");
            }
            elseif(isset($_POST["displayEmployee"]))
            {
                $_SESSION['displayEmployees'] = false;
                include ("displayEmployee.php");
            }
            else
            {

            }

            

            ?>
        </div>

    </div>