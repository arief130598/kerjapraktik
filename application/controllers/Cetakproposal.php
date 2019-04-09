<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetakproposal extends CI_Controller {
	function __construct(){
        // Call the Model constructor
        parent::__construct(); 
        $this->load->model('m_cetakproposal');
    }

	public function index()
	{
		$this->load->helper('directory');
		$status = $this->m_cetakproposal->ambilstatus(); 
		foreach($status as $key)
		{
			$values[] = $key->status;
			$ids[] = $key->id;
		}

		$dir1 = "file/proposal";
        $map1 = directory_map($dir1);
		$this->load->view('v_cetakproposal',['map1'=>$map1,'values'=>$values,'ids'=>$ids]);
	}

	public function cetak($ids)
	{
		$nomor = $this->m_cetakproposal->nomor();
		$angka = count($nomor)+1;
		$notif = "Proposal anda sudah dicetak";

		$datanotif = array(	'no' => $angka,
							'id' => $ids,
							'isi' => $notif
		);

		$data = array( 'id' => $ids,
					   'status' => '3'
		);
		$this->m_cetakproposal->ubahstatus($ids,$data);
		$this->m_cetakproposal->notifikasi($datanotif);
		redirect('Cetakproposal','refresh');
	}
}