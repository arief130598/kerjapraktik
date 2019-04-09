<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Submitnilailaa extends CI_Controller {

	public function __construct(){
		parent::__construct();		
		$this->load->library('form_validation');
		$this->load->model('m_submitnilailaa');
	}

	public function index()
	{
		$this->load->view('v_submitnilailaa');
	}

	public function inputnilai()
	{
        $this->form_validation->set_rules('id','NIM','required');
		$this->form_validation->set_rules('nilaisimilarity','Value of Similarity','required|greater_than_equal_to[0]|less_than_equal_to[100]');

        if ($this->form_validation->run() == FALSE)
        {   
            $this->load->view('v_submitnilailaa');
        }
        else
        {
			$id = $this->input->post('id');
			$nilaisimilarity = $this->input->post('nilaisimilarity');
				
			$data = array(
				'id' => $id,
				'nilaisimilarity' => $nilaisimilarity
			);
			

			if($this->m_submitnilailaa->cekdata($id))
        	{
	            $this->m_submitnilailaa->updatedata($id,$data);
	            echo "<script>alert('Update sukses, Nilai sudah diupdate..');</script>";
	            redirect('Submitnilailaa/index','refresh');
	        }
	        else
	        {
				$this->m_submitnilailaa->insert($data);
				echo "<script>alert('Input sukses, Nilai sudah diinput..');</script>";
	            redirect('Submitnilailaa/index','refresh');
			}
        }
	}
}