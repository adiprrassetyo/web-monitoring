<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_sensor extends CI_Model {

    function save_data($data){
        $this->db->insert('t_sensor',$data);
        return $this->db->affected_rows();
    }
    
    function get_recent($limit){
        $this->db->select('*');
        $this->db->from('t_sensor');
        $this->db->order_by('id','desc');
        $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result();
    }

    function today_record(){
        $this->db->select('count(*) as today_record');
        $this->db->from('t_sensor');
        $this->db->like('datetime', date('Y-m-d'), 'after');  
        $query =$this->db->get();
        return $query->result();
    }

    function total_record(){
        $this->db->select('count(*) as total_record');
        $this->db->from('t_sensor');
        $query = $this->db->get();
        return $query->result();
    }

    function status_sensor(){
        $this->db->select('*');
        $this->db->from('t_status_sensor');
        $this->db->order_by('id','desc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    function change_status($update){
        $this->db->insert('t_status_sensor',$update);
        return $this->db->affected_rows();
    }

}