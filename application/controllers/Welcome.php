<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    
    // ----------------------------- EMPLOYEE LISTING ------------------------------------ //
	public function index(){
            $this->load->view("employeeList");
        }
        
        public function getEmpList(){
            $this->load->model("getData");
            $data = $this->getData->getResult();
            //echo json_encode($data);
            $myTable = "<table class=table><th>#</th><th>Emp Name</th><th>Status</th><th>Action</th>";
            $i=0;
            foreach($data as $k => $v){
                $i++;
                $emp_name = $v['emp_name'];
                $status = $v['status'];
                $id = $v['id'];
                $myTable .= "<tr><td>$i</td><td>$emp_name</td><td>$status</td><td><button class=btn btn-warning btn-xs onclick=editEmployee($id)>Edit</td></tr>";
            }
            $myTable .= "</table>";
            
            echo $myTable;
        }
        
        
    // ----------------------------- SAVE EMPLOYEE ------------------------------------ //    
        public function saveEmployee(){
           $res = [];
            $data["emp_name"] = $this->input->post("name");
            $data["salary"] = $this->input->post("salary");
            
            if($this->db->insert("employees", $data)){
                $res["status"] = true;
                $res["msg"] = "Data Saved Succesfully";
            }
            
            else{
                $res["status"] = false;
                $res["msg"] = "Data Not Saved";
            }
            
            echo json_encode($res);
        }
        
     // ----------------------------- GET EMPLOYEE DETAILS AS PER ID ------------------------------------ // 
     public function getEmployeeDetails(){
         $id = $this->input->post("id"); 
         
         $this->load->model("getData");
         echo json_encode($this->getData->getRow($id));
    }
    
    // ----------------------------- UPDATE EMPLOYEE ------------------------------------ //    
        public function updateEmployee(){
           $res = [];
            $id = $this->input->post("id");
            $data["emp_name"] = $this->input->post("name");
            $data["salary"] = $this->input->post("salary");
            
            $this->db->where("id", $id);
            if($this->db->update("employees", $data)){
                $res["status"] = true;
                $res["msg"] = "Data Saved Succesfully";
            }
            
            else{
                $res["status"] = false;
                $res["msg"] = "Data Not Saved";
            }
            
            echo json_encode($res);
        }
        
        function importSheetView(){
            $this->load->view("sheetView");
        }
        
        
        function import()
        {
            
          $this->load->library('excel');
            
         if(isset($_FILES["file"]["name"]))
         {
          $path = $_FILES["file"]["tmp_name"];
          $object = PHPExcel_IOFactory::load($path);
          foreach($object->getWorksheetIterator() as $worksheet)
          {
           $highestRow = $worksheet->getHighestRow();
           $highestColumn = $worksheet->getHighestColumn();
           for($row=2; $row<=$highestRow; $row++)
           {
            $id = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
            $customer_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
            $address = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
            $city = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
            $postal_code = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
            $country = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
            $data = array(
             'CustomerName'  => $customer_name,
             'Address'   => $address,
             'City'    => $city,
             'PostalCode'  => $postal_code,
             'Country'   => $country
            );
            
            $this->db->where("id", $id);
            $this->db->update("sheet", $data);
            
           }
           
           
           
          }
          
          
          echo 'Data Imported successfully';
         } 
        }
        
        
}
