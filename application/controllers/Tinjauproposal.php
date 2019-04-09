<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tinjauproposal extends CI_Controller {
	function __construct(){
        // Call the Model constructor
        parent::__construct(); 
        $this->load->model('m_tinjauproposal');
    }

	public function index()
	{
		$this->load->helper('directory');
		$status = $this->m_tinjauproposal->ambilstatus(); 
		foreach($status as $key)
		{
			$values[] = $key->status;
			$ids[] = $key->id;
		}

		$dir1 = "file/proposal";
        $map1 = directory_map($dir1);
        $dir2 = "file/beritaacara";
        $map2 = directory_map($dir2);
		$dir3 = "file/permohonan";
        $map3 = directory_map($dir3);
		$this->load->view('v_tinjauproposal',['map1'=>$map1,'map2'=>$map2,'map3'=>$map3,'values'=>$values,'ids'=>$ids]);
	}

	public function terima($map1,$id)
	{
		$nomor = $this->m_tinjauproposal->nomor();
		$angka = count($nomor)+1;
		$notif = "Proposal anda disetujui";

		$datanotif = array(	'no' => $angka,
							'id' => $id,
							'isi' => $notif
		);
		
		$nama = $map1;
		$nama = substr($nama,0,-4);
		$data = array( 'filename' => $nama,
					   'status' => '2'
		);
		$this->m_tinjauproposal->updatedataterima($nama,$data);
		$this->m_tinjauproposal->notifikasi($datanotif);
		redirect('tinjauproposal','refresh');
	}

	public function tolak($map1,$id)
	{
		$nomor = $this->m_tinjauproposal->nomor();
		$angka = count($nomor)+1;
		$notif = "Proposal anda ditolak";

		$datanotif = array(	'no' => $angka,
							'id' => $id,
							'isi' => $notif
		);

		$nama = $map1;
		$nama = substr($nama,0,-4);
		$data = array( 'filename' => $nama,
					   'status' => '0'
		);
		$this->m_tinjauproposal->updatedatatolak($nama,$data);
		$this->m_tinjauproposal->notifikasi($datanotif);
		redirect('tinjauproposal','refresh');
	}
}