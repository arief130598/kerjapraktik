<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_register');
	}
	function index(){
		$this->load->view('v_register');
	}

	function insert()
	{
		if($this->m_register->duplicatenim($this->input->post('id'),$this->input->post('status'))){
            echo "<script>alert('Register gagal, NIM sudah terdaftar..');</script>";
            redirect('Register/index','refresh');
         }
         else
         {
			$nama = $this->input->post('nama');
			$id = $this->input->post('id');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$status = $this->input->post('status');
			
			$data = array(
				'nama' => $nama,
				'id' => $id,
				'email' => $email,
				'password' => md5($password),
				'status' => $status
			);

			$this->m_register->insert($data,$status);
			echo "<script>alert('Register sukses, silahkan login..');</script>";
			redirect('login','refresh');
		}
	}
}