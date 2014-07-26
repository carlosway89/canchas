<?php
class Codegen_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    function get($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array',$like_body='',$like_sentence=''){
        
        $this->db->select($fields);
        $this->db->from($table);
        if ($perpage!=null) {
            $this->db->limit($perpage,$start);
        }
        
        if($where){
        $this->db->where($where);
        }
        if($like_body){
        $this->db->like($like_body,$like_sentence);
        }
        
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result($array) : $query->row() ;
        return $result;
    }
    
    function add($table,$data){
        $this->db->insert($table, $data);         
        if ($this->db->affected_rows() == '1')
        {
            return $this->db->insert_id();
        }
        
        return 0;       
    }
    
    function edit($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0)
        {
            return TRUE;
        }
        
        return FALSE;       
    }
    
    function delete($table,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        
        return FALSE;        
    }   
    
    function count($table){
        return $this->db->count_all($table);
    }
}