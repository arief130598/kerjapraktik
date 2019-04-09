<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_homemahasiswa extends CI_Model
{
	function __construct(){
        // Call the Model constructor
        parent::__construct(); 
    }  

    public function ambilnotif($id)
    {
    	$this->db->select('isi');
        $this->db->where('id',$id);
        $this->db->order_by("no", "desc");
        $query = $this->db->get('notifikasi','3'); 
        
        return $query->result();
    }
}