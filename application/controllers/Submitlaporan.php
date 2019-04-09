<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Submitlaporan extends CI_Controller {

	function __construct(){
        // Call the Model constructor
        parent::__construct(); 
        $this->load->model('m_submitlaporan');
    }

	public function index(){
		$id = $this->session->userdata('id');
		$notif=$this->m_submitlaporan->ambilnotif($id);
		$this->load->view('v_submitlaporan', ['notif'=>$notif]);
	}
 
	public function mulai_upload(){
		$nama = $this->input->post('nama');
		$nomorhp = $this->input->post('hp');
		$email = $this->input->post('email');
		$lowongan = $this->input->post('lowongan');
		$gajiminimal = $this->input->post('price-min');
		$gajimaksimal = $this->input->post('price-max');
		
		$isi = array(
			'nama' => $nama,
			'nomorhp' => $nomorhp,
			'email' => $email,
			'lowongan' => $lowongan,
			'gajiminimal' => $gajiminimal,
			'gajimaksimal' => $gajimaksimal
		);


		$config['upload_path']          = 'file';
		$config['file_name']            = $nama;
		$config['overwrite']            = TRUE;
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 5120;
 
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
 
		if ( ! $this->upload->do_upload('laporan')){
			echo "<script>alert('Upload gagal, pastikan file PDF dan kurang dari 5MB');</script>";
			redirect('Submitsurvey','refresh');
		}else{
			$data = array('upload_data' => $this->upload->data());
		}

		$this->m_submitlaporan->insert($isi);

		redirect('homemahasiswa','refresh');
	}
	
}