<?php
if ( !defined('BASEPATH') ) exit('No direct script access allowed');

class NetworkController extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('networkModel');
		if (!$this->session->userdata('logged_in'))
		{
			redirect('loginController/login');
		}
	}

	public function index()
	{
		$data['network'] = $this->networkModel->view();
		$this->load->view('Network/index', $data);
	}

	public function tambah()
	{

		if ($this->input->post('submit'))
		{
			if($this->networkModel->validation("save"))
			{
				$this->networkModel->save();
				redirect('networkController');
			}
		}
		$this->load->view('Network/form_tambah');
	}

	public function ubah($nis)
	{
		$data['network'] = $this->networkModel->view_by($nis);

		if ($this->input->post('submit'))
		{
			if($this->networkModel->validation("update"))
			{
				$this->networkModel->update($nis);
				redirect('networkController');
			}
		}

		$this->load->view('Network/form_ubah', $data);
	}

	public function hapus($nis)
	{
		$this->networkModel->delete($nis);
		redirect('networkController');
	}
}
