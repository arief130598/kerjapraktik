<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tinjauproposal extends CI_Model
{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct(); 
    }  

    public function updatedataterima($nama, $data)
    {     
        $this->db->where('filename',$nama);
        $this->db->update('fileproposal',$data);        
    }

    public function updatedatatolak($nama, $data)
    {     
        $this->db->where('filename',$nama);
        $this->db->update('fileproposal',$data);        
    }

    public function ambilstatus()
    {
        $this->db->select('status, id');
        $this->db->from('fileproposal');
        $this->db->order_by("filename", "asc");
        $query = $this->db->get(); 
        
        return $query->result();
    }

    public function nomor()
    {
        $this->db->select('no');
        $this->db->from('notifikasi');
        $query = $this->db->get(); 
        
        return $query->result();
    }

    public function notifikasi($datanotif)
    {
        $this->db->insert('notifikasi',$datanotif);
    }
}

