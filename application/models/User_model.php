<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();

        $this->db = $this->load->database('default', true);
    }

    public function insert_users_data($data)
    {
         return ($this->db->insert('users', $data))?$this->db->insert_id():false;
         
    }
    public function update_users_data($data)
    {
        if(!empty($data['id'])){
            $this->db->where('id', $data['id']);
        }
        return $this->db->update('users', $data);
    }
    public function list_user($id='')
    {
        $this->db->select('*');
        $this->db->from('users');
        if(!empty($id)){
            $this->db->where('id', $id);
        }
        $result = $this->db->get()->result_array();
        return $result;
    }

    
    
    public function delete_user($id)
    {
        $tables = array('users');
        $this->db->where('id', $id);
        $this->db->delete($tables);
    }


    public function list_mentor($id='')
    {
        $this->db->select('*');
        $this->db->from('users');
        if(!empty($id)){
            $this->db->where('id', $id);
        }
        $this->db->where('user_type', "mentor");
        $result = $this->db->get()->result_array();
        return $result;
    }
    public function list_trainor($id='')
    {
        $this->db->select('*');
        $this->db->from('users');
        if(!empty($id)){
            $this->db->where('id', $id);
        }
        $this->db->where('user_type', "trainor");
        $result = $this->db->get()->result_array();
        return $result;
    }
}
