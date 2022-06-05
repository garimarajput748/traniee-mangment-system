<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trainee_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();

        $this->db = $this->load->database('default', true);
    }

    public function insert_trainee_data($data)
    {
        return $this->db->insert('trainee', $data);
    }
    public function update_trainee_data($data,$edit_id='')
    {
        if(empty($edit_id)) return false;
        $this->db->where('id', $edit_id);
        return $this->db->update('trainee', $data);
    }
    public function list_trainee($id="")
    {
        $this->db->select('*');
        $this->db->from('trainee');
        if(!empty($id)){
            $this->db->where('id',$id);
        }
        $result = $this->db->get()->result_array();
        return $result;
    }
    
    
    
    public function delete_trainee($id)
    {
        $tables = array('trainee');
        $this->db->where('id', $id);
        $this->db->delete($tables);
    }
}
