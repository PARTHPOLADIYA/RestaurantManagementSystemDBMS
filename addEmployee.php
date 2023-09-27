

<form class="form-inline" method = "POST" action="add.php">

    <div class="form-group">
        <label for="employeeName">Employee Name</label>
        <input type="text" class="form-control" id="employeeName" name="employeeName" placeholder="Enter Employee Name" >
    </div>

    <div class="form-group">
        <label for="employeeId">Employee Id</label>
        <input type="text" class="form-control" id="employeeId" name="employeeId" placeholder="Enter Employee Id (BranchIdEmpId)" >
    </div>

    <div class="form-group">
        <label for="employeeAddress">Employee Address</label>
        <input type="text" class="form-control" id="employeeAddress" name="employeeAddress" placeholder="Enter Employee Address" >
    </div>

    <div class="form-group">
        <label for="employeesalary">Employee Salary</label>
        <input type="text" class="form-control" name="employeeSalary" id="employeeSalary" placeholder="Enter Employee Salary" >
    </div>

    <div class="form-group">
        <label for = "workType">Work Type</label>
            <select class="form-control" name ="workType" id ="workType">
                <option disabled selected value="0">Choose Work Type</option>
                <option>Cashier</option>
                <option>Chef</option>
                <option>Manager</option>
                <option>Other Kitchen Staff</option>
                <option>Security</option>
                <option>Waiter</option>
             </select>
    </div>

    <div class="form-group">
        <input  type="submit" class="form-control" name="submitBtn" id="submitBtn" >
        
    </div>

</form>