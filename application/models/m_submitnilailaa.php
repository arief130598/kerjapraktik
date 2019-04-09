<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_submitnilailaa extends CI_Model
{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct(); 
    }  

    public function insert($data)
    {
        $this->db->insert('nilai',$data);
    }

    public function cekdata($id)
    {     
        $this->db->get_where('nilai', array('id' => $id), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;         
    }

    public function updatedata($id, $data)
    {     
        $this->db->where('id',$id);
        $this->db->update('nilai',$data);        
    }
}