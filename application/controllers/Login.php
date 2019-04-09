<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
	}

	public function index()
	{
		$this->m_login->check_session();
		$this->load->view('v_login');
	}

	function loginmulai(){
		$id = $this->input->post('id');
		$password = $this->input->post('password');
		$status = $this->input->post('status');
		$where = array(
			'id' => $id,
			'password' => md5($password),
			'status'=> $status
			);

		$cek = $this->m_login->cek_login($status,$where)->num_rows();
		$data = $this->m_login->cek_login($status,$where);
	
		if($cek==1 && $status=='mahasiswa'){
			$this->session->set_userdata('id',$data->row()->id);
			$this->session->set_userdata('nama',$data->row()->nama);
			$this->session->set_userdata('status',$data->row()->status);
 
			redirect(base_url('homemahasiswa')); 
		}
		else if($cek==1 && $status=='dosen')
		{
			$this->session->set_userdata('id',$data->row()->id);
			$this->session->set_userdata('nama',$data->row()->nama);
			$this->session->set_userdata('status',$data->row()->status);
 
			redirect(base_url('homedosen'));
		}
		else if($cek==1 && $status=='laa')
		{
			$this->session->set_userdata('id',$data->row()->id);
			$this->session->set_userdata('nama',$data->row()->nama);
			$this->session->set_userdata('status',$data->row()->status);
 
			redirect(base_url('homelaa'));
		}
		else{
			echo "<script>alert('Login gagal, NIM/NIP atau Password salah..');</script>";
			redirect('','refresh');
		}
	}
}
