<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Submitnilaidosen extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->library('form_validation');
		$this->load->model('m_submitnilaidosen');
	}

	public function index()
	{
		$this->load->view('v_submitnilaidosen');
	}

	public function inputnilai()
	{
        $this->form_validation->set_rules('id','NIM','required');
		$this->form_validation->set_rules('nilaipembimbinglapangan','Value of Pembimbing Lapangan','required|greater_than_equal_to[0]|less_than_equal_to[100]');
		$this->form_validation->set_rules('nilaipembimbingakademik','Value of Pembimbing Akademik','required|greater_than_equal_to[0]|less_than_equal_to[100]');
		$this->form_validation->set_rules('nilaipenguji','Value of Dosen','required|greater_than_equal_to[0]|less_than_equal_to[100]');

        if ($this->form_validation->run() == FALSE)
        {   
            $this->load->view('v_submitnilaidosen');
        }
        else
        {
			$id = $this->input->post('id');
			$nilaipembimbinglapangan = $this->input->post('nilaipembimbinglapangan');
			$nilaipembimbingakademik = $this->input->post('nilaipembimbingakademik');
			$nilaipenguji = $this->input->post('nilaipenguji');
				
			$data = array(
				'id' => $id,
				'nilaipembimbinglapangan' => $nilaipembimbinglapangan,
				'nilaipembimbingakademik' => $nilaipembimbingakademik,
				'nilaipenguji' => $nilaipenguji
			);

        	if($this->m_submitnilaidosen->cekdata($this->input->post('id')))
        	{
	            $this->m_submitnilaidosen->updatedata($id,$data);
	            echo "<script>alert('Update sukses, Nilai sudah diupdate..');</script>";
	            redirect('Submitnilaidosen','refresh');
	        }
	        else
	        {
				$this->m_submitnilaidosen->insert($data);
				echo "<script>alert('Input sukses, Nilai sudah diinput..');</script>";
	            redirect('Submitnilaidosen','refresh');
			}
        }
	}
}