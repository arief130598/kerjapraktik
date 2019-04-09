<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nilai extends CI_Model
{	
	public $nilaipembimbinglapangan;
	public $nilaipembimbingakademik;
	public $nilaipenguji;
	public $nilaisimilarity;

	function __construct(){
        // Call the Model constructor
        parent::__construct(); 
        $this->load->database();
    }  

    public function lihatnilai()
    {
        $id = $this->session->userdata('id');
    	$query = $this->db->get_where('nilai',['id'=>$id]);
    	return $query->result();
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