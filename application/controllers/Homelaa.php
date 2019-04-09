<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Homelaa extends CI_Controller {

	public function index()
	{
		$this->load->view('v_homelaa');
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url().'login');
    }
}
