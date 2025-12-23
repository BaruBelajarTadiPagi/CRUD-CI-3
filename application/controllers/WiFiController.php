<?php
if ( !defined('BASEPATH') ) exit('No direct script access allowed');

class WiFiController extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('wiFiModel');
		
		if (!$this->session->userdata('logged_in'))
		{
			redirect('loginController/login');
		}
	}

	public function index()
	{
		$data['wifi'] = $this->wiFiModel->view();
		$this->load->view('WiFi/index', $data);
	}

	public function tambah()
	{

		if ($this->input->post('submit'))
		{
			if($this->wiFiModel->validation("save"))
			{
				$this->wiFiModel->save();
				redirect('wiFiController');
			}
		}
		$this->load->view('WiFi/form_tambah');
	}

	public function ubah($nis)
	{
		$data['wifi'] = $this->wiFiModel->view_by($nis);

		if ($this->input->post('submit'))
		{
			if($this->wiFiModel->validation("update"))
			{
				$this->wiFiModel->update($nis);
				redirect('wiFiController');
			}
		}

		$this->load->view('WiFi/form_ubah', $data);
	}

	public function hapus($nis)
	{
		$this->wiFiModel->delete($nis);
		redirect('wiFiController');
	}
}
