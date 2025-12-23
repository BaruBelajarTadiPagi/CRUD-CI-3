<?php
if ( !defined('BASEPATH') ) exit('No direct script access allowed');

class LoginController extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('userModel');
	}
	public function index()
	{
		$data['user'] = $this->userModel->view();
		$this->load->view('register', $data);
	}

	public function register()
	{
		if ($this->input->post('submit'))
		{
			if($this->userModel->validation("save"))
			{
				$this->userModel->save();
				redirect('oNUController');
			}
		}
		$this->load->view('register');
	}

	public function login()
	{
		if ($this->input->post('submit'))
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run())
			{
				$email    = $this->input->post('email');
				$password = $this->input->post('password');

				$user = $this->userModel->getByEmail($email);

				if ($user && $password)
				{
					$this->session->set_userdata([
						'user_id'   => $user->id,
						'username'  => $user->username,
						'logged_in' => TRUE
					]);

					redirect('oNUController');
				}
				else
				{
					$data['error'] = 'Email atau password salah';
				}
			}
		}

		$this->load->view('login', @$data);
	}

	public function logout()
	{
		// Hapus semua session
		$this->session->sess_destroy();

		// Redirect ke halaman login
		redirect('loginController/login');
	}

}
