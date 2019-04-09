<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Submitproposal extends CI_Controller {

	function __construct(){
        // Call the Model constructor
        parent::__construct(); 
        $this->load->model('m_submitproposal');
    }

	public function index(){
		$id = $this->session->userdata('id');
		$notif=$this->m_submitproposal->ambilnotif($id);
		$this->load->view('v_submitproposal',['notif'=>$notif]);
	}
 
	public function mulai_upload(){
		$nama = $this->session->userdata('nama');
		$id = $this->session->userdata('id');
		$filenama = $id . '_' . $nama . '_proposal';

		$config['upload_path']          = 'file/proposal';
		$config['file_name']            = $filenama;
		$config['overwrite']            = TRUE;
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 5120;
 
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
 
		if ( ! $this->upload->do_upload('proposal')){
			echo "<script>alert('Upload gagal, pastikan file PDF dan kurang dari 5MB');</script>";
			redirect('Submitproposal','refresh');
		}else{
			$filename = str_replace(' ', '_', $filenama);
			$file = array(
					'filename' => $filename,
					'status' => '1',
					'id' => $id
					);

			$cek = $this->m_submitproposal->cekstatus($id);

			if($this->m_submitproposal->duplicateid($id)){
				if($cek==1)
				{
					echo "<script>alert('Upload gagal. Tunggu dosen menerima atau menolak proposal anda');</script>";
					redirect('Submitproposal','refresh');
				}
				else if($cek==0)
				{
					$data = array('upload_data' => $this->upload->data());
					
					$this->m_submitproposal->update($file,$id);
					echo "<script>alert('Update file sukses..');</script>";
					redirect('Homemahasiswa','refresh');
				}
				else if($cek==2)
				{
					echo "<script>alert('Upload gagal. Tunggu LAA mencetak proposal anda');</script>";
					redirect('Submitproposal','refresh');
				}
				else
				{
					echo "<script>alert('Upload gagal. Proposal anda sudah dicetak');</script>";
					redirect('Submitproposal','refresh');
				}
         	}
         	else
         	{
				$data = array('upload_data' => $this->upload->data());
				
				$this->m_submitproposal->insert($file);
				echo "<script>alert('Upload sukses..');</script>";
				redirect('Homemahasiswa','refresh');
			}
		}
	}
}