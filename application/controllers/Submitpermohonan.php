<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Submitpermohonan extends CI_Controller {

	function __construct(){
        // Call the Model constructor
        parent::__construct(); 
        $this->load->model('M_submitpermohonan');
    }

	public function index(){
		$id = $this->session->userdata('id');
		$notif=$this->M_submitpermohonan->ambilnotif($id);
		$this->load->view('v_submitpermohonan',['notif'=>$notif]);
	}
 
	public function mulai_upload(){
		$nama = $this->session->userdata('nama');
		$id = $this->session->userdata('id');
		$filenama = $id . '_' . $nama . '_permohonan';

		$config['upload_path']          = 'file/permohonan';
		$config['file_name']            = $filenama;
		$config['overwrite']            = TRUE;
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 5120;
 
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
 
		if ( ! $this->upload->do_upload('permohonan')){
			echo "<script>alert('Upload gagal, pastikan file PDF dan kurang dari 5MB');</script>";
			redirect('Submitpermohonan','refresh');
		}else{
			$filename = str_replace(' ', '_', $filenama);
			$file = array(
					'filename' => $filename,
					'id' => $id
					);

			$cek = $this->M_submitpermohonan->cekstatus($id);

			if($this->M_submitpermohonan->duplicateid($id)){
				if($cek==1)
				{
					echo "<script>alert('Upload gagal. Tunggu dosen menerima atau menolak proposal anda');</script>";
					redirect('submitpermohonan','refresh');
				}
				else if($cek==0)
				{
					$data = array('upload_data' => $this->upload->data());
				
					echo "<script>alert('Update file sukses..');</script>";
					redirect('submitproposal','refresh');
				}
				else if($cek==2)
				{
					echo "<script>alert('Upload gagal. Tunggu LAA mencetak proposal anda');</script>";
					redirect('submitpermohonan','refresh');
				}
				else
				{
					echo "<script>alert('Upload gagal. Proposal anda sudah dicetak');</script>";
					redirect('submitpermohonan','refresh');
				}
         	}
         	else
         	{
				$data = array('upload_data' => $this->upload->data());
				
				echo "<script>alert('Upload sukses..');</script>";
				redirect('submitproposal','refresh');
			}
		}
	}
}