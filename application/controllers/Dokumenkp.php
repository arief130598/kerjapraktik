<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dokumenkp extends CI_Controller {
	public function __construct(){
		parent::__construct();		
		$this->load->model('m_dokumenkp');
	}

	public function index()
	{
		$id = $this->session->userdata('id');
		$notif=$this->m_dokumenkp->ambilnotif($id);
		$this->load->helper('directory'); //load directory helper
		$dir = "file/dokumenkp"; // Your Path to folder
		$map = directory_map($dir); /* This function reads the directory path specified in the first parameter and builds an array representation of it and all its contained files. */
		$this->load->view('v_dokumenkp',['map'=>$map,'notif'=>$notif]);
	}
}
