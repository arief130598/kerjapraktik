<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_register extends CI_Model
	{

		public function insert($data,$status)
		{
			$this->db->insert($status,$data);
		}

	    public function duplicatenim($id,$status)
	    {     
	        $this->db->get_where($status, array('id' => $id), 1);
	        return $this->db->affected_rows() > 0 ? TRUE : FALSE;         
	    }
	}