<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_submitsurvey extends CI_Model
{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct(); 
    }  

    public function duplicateid($id)
	{     
	    $this->db->get_where('fileproposal', array('id' => $id), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;  
    }

    public function cekstatus($id)
    {
        $this->db->select('status');
        $this->db->where('id',$id);
        $query = $this->db->get('fileproposal');

        if ($query->num_rows() > 0) {
            return $query->row()->status;
        }
        return false;
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