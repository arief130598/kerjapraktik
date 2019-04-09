<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homemahasiswa extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->session->userdata('user');
		$this->load->model('m_homemahasiswa');
	}

	public function index()
	{
		$id = $this->session->userdata('id');
		$notif=$this->m_homemahasiswa->ambilnotif($id);
		$this->load->view('v_homemahasiswa',['notif'=>$notif]);
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url().'login');
    }
}