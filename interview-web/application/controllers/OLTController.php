<?php
if ( !defined('BASEPATH') ) exit('No direct script access allowed');

class OLTController extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('oLTModel');
		if (!$this->session->userdata('logged_in'))
		{
			redirect('loginController/login');
		}
	}

	public function index()
	{
		$data['olt'] = $this->oLTModel->view();
		$data['total_online']  = $this->oLTModel->count_online();
    	$data['total_offline'] = $this->oLTModel->count_offline();
		$this->load->view('OLT/index', $data);
	}

	public function tambah()
	{
		if ($this->input->post('submit'))
		{
			if($this->oLTModel->validation("save"))
			{
				$this->oLTModel->save();
				redirect('oLTController');
			}
		}
		$this->load->view('OLT/form_tambah');
	}

	public function ubah($id)
	{
		$data['olt'] = $this->oLTModel->view_by($id);

		if ($this->input->post('submit'))
		{
			if($this->oLTModel->validation("update"))
			{
				$this->oLTModel->update($id);
				redirect('oLTController');
			}
		}

		$this->load->view('OLT/form_ubah', $data);
	}

	public function hapus($id)
	{
		$this->oLTModel->delete($id);
		redirect('oLTController');
	}
}
