<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_login extends CI_Model
	{
		function cek_login($table,$where)
		{
			return $this->db->get_where($table,$where);
		}

		function check_session()
		{
			if(!is_null($this->session->userdata('id')))
			{
				$status=$this->session->userdata('status');
				if($status=='mahasiswa')
				{
					redirect(base_url('homemahasiswa')); 
				}
				else if($status=='dosen')
				{
					redirect(base_url('homedosen'));
				}
				else if($status=='laa')
				{
					redirect(base_url('homelaa'));
				}
			}
		}
	}
	