<?php

if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class WiFIModel extends CI_Model 
{
	public function view()
	{
		return $this->db->get('wifis')->result();
	}

	public function view_by($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('wifis')->row();
	}

	public function validation($mode)
	{
		$this->load->library('form_validation');

		if($mode == 'save')
		{
			$this->form_validation->set_rules('wifi_name', 'wifi_name', 'required');
			$this->form_validation->set_rules('wifi_password', 'wifi_password', 'required');

			if($this->form_validation->run())
				return TRUE;
			else
				return FALSE;
		}

		if ($mode == 'update') 
		{
			$this->form_validation->set_rules('wifi_name', 'wifi_name', 'required');
			$this->form_validation->set_rules('wifi_password', 'wifi_password', 'required');

			if($this->form_validation->run())
				return TRUE;
			else
				return FALSE;
		}

	}

	public function save()
	{
		$data = array(
			'id'    => uniqid('WIFI_ADBS_'),
			'wifi_name'    => $this->input->post('wifi_name'),
			'wifi_password'    => password_hash($this->input->post('wifi_password'), PASSWORD_DEFAULT),
		);

		return $this->db->insert('wifis', $data);
	}

	public function update($id)
	{
		$data = array(
			'wifi_name'    => $this->input->post('wifi_name'),
			'wifi_password'  => password_hash($this->input->post('wifi_password'), PASSWORD_DEFAULT),
		);

		$this->db->where('id', $id);
		return $this->db->update('wifis', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('wifis');
	}
}
