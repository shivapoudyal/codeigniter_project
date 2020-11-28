// List Employee

function getEmployeesList(){
    
    $("#empBtn").hide();
    $("#addEmpBtn").show();
    
    $.ajax({
        url : base_url+"/getEmpList",
        type: "post",
        success : function(res){ 
            //console.log(res);
            document.getElementById("employee_list").innerHTML = res;
        },
        
        error : function(req, status, err){
            console.log(err);
            
        }
    })
}


//------------------------------- Add Employee ----------------------------------- //
function saveEmployee(){
   var emp_name = $("#emp_name").val().trim();
   var salary = $("#salary").val().trim();
   
   if(emp_name == ""){
       $("#emp_name_err").html("Enter Employee Name<br>");
       return false;
   }
   
   else if(salary == ""){
       $("#salary_err").html("Enter Employee Salary<br>");
       return false;
   }
   
   else{
       $.ajax({
           url : base_url+"/saveEmployee",
           type : "post",
           data : {name : emp_name, salary : salary},
           success : function(res){
               response = JSON.parse(res);
               if(response.status == true){
                   
                   $("#emp_name").val("");
                   $("#salary").val("");
                   
                   $("#addModal").modal("hide");
                   getEmployeesList();
               }
               else{
                   alert(response.msg);
               }
           },
           error : function(req, status, err){
               console.log(err);
           }
       })
   }
}

//------------------------------- End Of Add Employee ----------------------------------- //

//------------------------------- Edit Employee ----------------------------------- //
function editEmployee(id){
    
        $("#e_emp_name_err").html("");
        $("#e_salary_err").html("");
   
          $.ajax({
           url : base_url+"/getEmployeeDetails",
           type : "post",
           data : {id:id},
           success : function(res){
               response = JSON.parse(res); 
               //console.log(response);
                   
                   $("#e_id").val(response.id);
                   $("#e_emp_name").val(response.emp_name);
                   $("#e_salary").val(response.salary);
                                  
           },
           error : function(req, status, err){
               console.log(err);
           }
       })
   
   $("#editModal").modal("show");
}

//------------------------------- End Of Edit Employee ----------------------------------- //


//------------------------------- update Employee ----------------------------------- //
function updateEmployee(id){
   var emp_name = $("#e_emp_name").val().trim();
   var salary = $("#e_salary").val().trim();
   var id = $("#e_id").val().trim();
   
   
   
   if(emp_name == ""){
       $("#e_emp_name_err").html("Enter Employee Name<br>");
       return false;
   }
   
   else if(salary == ""){
       $("#e_salary_err").html("Enter Employee Salary<br>");
       return false;
   }
   
   else{
       $.ajax({
           url : base_url+"/updateEmployee",
           type : "post",
           data : {name : emp_name, salary : salary, id : id},
           success : function(res){
               response = JSON.parse(res);
               if(response.status == true){
                   
                   $("#e_emp_name").val("");
                   $("#e_salary").val("");
                   
                   $("#editModal").modal("hide");
                   getEmployeesList();
               }
               else{
                   alert(response.msg);
               }
           },
           error : function(req, status, err){
               console.log(err);
           }
       })
   }
   $("#editModal").modal("show");
}

//------------------------------- Update Of Edit Employee ----------------------------------- //