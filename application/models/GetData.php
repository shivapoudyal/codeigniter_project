<?php

class GetData extends CI_Model{
    
    function getResult(){
        
        return $query = $this->db->query("select * from employees order by id desc")->result_array();
    }
    
    function getRow($id){
        return $query = $this->db->query("select * from employees where id=$id")->row_array();
    }
}

