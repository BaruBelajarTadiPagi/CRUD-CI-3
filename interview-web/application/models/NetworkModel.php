<?php

if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class NetworkModel extends CI_Model 
{
	public function view()
	{
		return $this->db->get('networks')->result();
	}

	public function view_by($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('networks')->row();
	}

	public function validation($mode)
	{
		$this->load->library('form_validation');

		if($mode == 'save')
		{
			$this->form_validation->set_rules('ip_address_device', 'ip_address_device', 'required');
			$this->form_validation->set_rules('gateway', 'gateway', 'required');
			$this->form_validation->set_rules('dns', 'dns', 'required');

			if($this->form_validation->run())
				return TRUE;
			else
				return FALSE;
		}

		if ($mode == 'update') 
		{
			$this->form_validation->set_rules('ip_address_device', 'ip_address_device', 'required');
			$this->form_validation->set_rules('gateway', 'gateway', 'required');
			$this->form_validation->set_rules('dns', 'dns', 'required');

			if($this->form_validation->run())
				return TRUE;
			else
				return FALSE;
		}

	}

	public function save()
	{
		$data = array(
			'id'    => uniqid('NETWORK_ADBS_'),
			'ip_address_device'    => $this->input->post('ip_address_device'),
			'gateway'  				=> $this->input->post('gateway'),
			'dns'  				=> $this->input->post('dns'),
		);

		return $this->db->insert('networks', $data);
	}

	public function update($id)
	{
		$data = array(
			'ip_address_device'    => $this->input->post('ip_address_device'),
			'gateway'  				=> $this->input->post('gateway'),
			'dns'  				=> $this->input->post('dns'),
		);

		$this->db->where('id', $id);
		return $this->db->update('networks', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('networks');
	}
}
