<?php

if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class UserModel  extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
	}

	public function view()
	{
		return $this->db->get('users')->result();
	}
	public function validation($mode)
	{
		$this->load->library('form_validation');

		if($mode == 'save')
		{
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
			

			if($this->form_validation->run())
				return TRUE;
			else
				return FALSE;
		}
	}

	public function save()
	{
		$data = array(
			'username'	=> $this->input->post('username'),
			'email'    	=> $this->input->post('email'),
			'password'  => $this->input->post('password'),
		);

		return $this->db->insert('users', $data);
	}

	public function getByUsername($username)
    {
        return $this->db
            ->where('username', $username)
            ->get('users')
            ->row();
    }
	public function getByEmail($email)
	{
		return $this->db
			->where('email', $email)
			->get('users')
			->row();
	}

}
