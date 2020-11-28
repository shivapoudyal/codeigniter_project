<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<br>
<br>
<br>
<title>Welcome Interview</title>
<center><button class="btn btn-primary btn-xs" id="empBtn" onclick="getEmployeesList()">Employees List</button></center>

<br>
<br>



<center><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addModal" style="display:none" id="addEmpBtn">Add Employee</button></center>
<br>
<br>

<div class="containter">
    <div class="row">
        <div class="col-md-3">
            
        </div>
        
        
        <div class="col-md-6" id="employee_list">
            
            
        
        </div>
        
        
        <div class="col-md-3">
            
        </div>
        
    </div>
</div>


<!---------------------------------- ADD EMPLOYEE POPUP------------------------------>
  <div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Employee</h4>
        </div>
        <div class="modal-body">
            
            <input type="text" id="emp_name" class="form-control" placeholder="Enter Employee Name">
            <span id="emp_name_err" style="color:red"></span>
            
            <br>
            <input type="text" id="salary" class="form-control" placeholder="Enter Employee Salary">
            <span id="salary_err" style="color:red"></span>
            
        </div>
        <div class="modal-footer">
            <center><button type="button" onclick="saveEmployee()" class="btn btn-success btn-xs" >Save</button></center>
        </div>
      </div>
      
    </div>
  </div>
<!---------------------------------- //ADD EMPLOYEE POPUP------------------------------>

<!---------------------------------- EDIT EMPLOYEE POPUP------------------------------>
  <div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Employee</h4>
        </div>
        <div class="modal-body">
            
            <input type="hidden" id="e_id" class="form-control">
            <input type="text" id="e_emp_name" class="form-control" placeholder="Enter Employee Name">
            <span id="e_emp_name_err" style="color:red"></span>
            
            <br>
            <input type="text" id="e_salary" class="form-control" placeholder="Enter Employee Salary">
            <span id="e_salary_err" style="color:red"></span>
            
        </div>
        <div class="modal-footer">
            <center><button type="button" onclick="updateEmployee()" class="btn btn-success btn-xs" >Save</button></center>
        </div>
      </div
      
    </div>
  </div>
<!---------------------------------- //EDIT EMPLOYEE POPUP------------------------------>

<script>
    base_url = "<?php echo base_url('index.php/Welcome')?>";
</script>

<script src="<?php echo base_url('js/employees.js')?>"></script>