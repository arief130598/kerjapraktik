<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Nilai extends CI_Controller {
	public $nilai;
	public function __construct(){
		parent::__construct();		
		$this->load->model('m_nilai');
		$this->model=$this->m_nilai;
	}

	public function index()
	{
		$this->lihatnilai();
	}

	public function lihatnilai()
	{
		$id = $this->session->userdata('id');
		$notif=$this->model->ambilnotif($id);
		$rows = $this->model->lihatnilai();
		$this->load->view('v_nilai',['rows'=>$rows,'notif'=>$notif]);
	}
}