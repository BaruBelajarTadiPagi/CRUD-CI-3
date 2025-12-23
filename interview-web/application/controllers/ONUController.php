<?php
if ( !defined('BASEPATH') ) exit('No direct script access allowed');

class ONUController extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ONUModel', 'oNUModel');
		$this->load->model('OLTModel', 'oLTModel');

		if (!$this->session->userdata('logged_in'))
		{
			redirect('loginController/login');
		}

	}

	public function index()
	{
		$data['onu'] = $this->oNUModel->view();
		$data['olts'] = $this->oNUModel->get_all_with_olt();
		$data['total_online_tr']  = $this->oNUModel->count_online_tr();
		$data['total_offline_tr']  = $this->oNUModel->count_offline_tr();
    	$data['total_online_omci'] = $this->oNUModel->count_online_omci();
    	$data['total_offline_omci'] = $this->oNUModel->count_offline_omci();

		$this->load->view('ONU/index', $data);
	}

	public function show($id)
	{
		$data['onus'] = $this->oNUModel->get_detail($id);

		$this->load->view('ONU/show', $data);
	}

	public function tambah()
	{
		$data['olts'] = $this->oNUModel->get_all_with_olt();
		$data['olts'] = $this->oNUModel->get_all_with_olt();
		$data['wifis'] = $this->oNUModel->get_all_wifi();
		$data['networks'] = $this->oNUModel->get_all_network();
		
		if ($this->input->post('submit'))
		{
			if($this->oNUModel->validation("save"))
			{
				$this->oNUModel->save();
				redirect('oNUController');
			}
		}
		$this->load->view('ONU/form_tambah', $data);
	}

	public function ubah($id)
	{
		$data['onu'] = $this->oNUModel->view_by($id);
		$data['olts'] = $this->oNUModel->get_all_with_olt();
		$data['wifis'] = $this->oNUModel->get_all_wifi();
		$data['networks'] = $this->oNUModel->get_all_network();

		if ($this->input->post('submit'))
		{
			if($this->oNUModel->validation("update"))
			{
				$this->oNUModel->update($id);
				redirect('oNUController');
			}
		}

		$this->load->view('ONU/form_ubah', $data);
	}

	public function hapus($id)
	{
		$this->oNUModel->delete($id);
		redirect('oNUController');
	}
}
