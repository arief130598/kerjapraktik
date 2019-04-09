<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tinjaulaporan extends CI_Controller {

	public function index()
	{
		$this->load->helper('directory'); //load directory helper
		$dir = "file/laporan"; // Your Path to folder
		$map = directory_map($dir); /* This function reads the directory path specified in the first parameter and builds an array representation of it and all its contained files. */
		$this->load->view('v_tinjaulaporan',['map'=>$map]);
	}
}