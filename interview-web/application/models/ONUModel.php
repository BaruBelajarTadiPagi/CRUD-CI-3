<?php

if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class ONUModel extends CI_Model 
{
	public function view()
	{
		return $this->db->get('onus')->result();
	}

	public function view_by($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('onus')->row();
	}

	public function validation($mode)
	{
		$this->load->library('form_validation');

		if($mode == 'save')
		{
			$this->form_validation->set_rules('id_olt', 'id_olt', 'required');
			$this->form_validation->set_rules('id_wifi', 'id_wifi', 'required');
			$this->form_validation->set_rules('id_network', 'id_network', 'required');
			$this->form_validation->set_rules('name', 'name', 'required');
			$this->form_validation->set_rules('description', 'description', 'required');
			$this->form_validation->set_rules('pon_number', 'pon_number', 'required');
			$this->form_validation->set_rules('sn', 'sn', 'required');
			$this->form_validation->set_rules('mac', 'mac', 'required');
			$this->form_validation->set_rules('vendor', 'vendor', 'required');
			$this->form_validation->set_rules('status_tr', 'status_tr', 'required');
			$this->form_validation->set_rules('status_omci', 'status_omci', 'required');
			$this->form_validation->set_rules('rx', 'rx', 'required');
			$this->form_validation->set_rules('tx', 'tx', 'required');

			if($this->form_validation->run())
				return TRUE;
			else
				return FALSE;
		}

		if ($mode == 'update') 
		{
			$this->form_validation->set_rules('id_olt', 'id_olt', 'required');
			$this->form_validation->set_rules('id_wifi', 'id_wifi', 'required');
			$this->form_validation->set_rules('id_network', 'id_network', 'required');
			$this->form_validation->set_rules('name', 'name', 'required');
			$this->form_validation->set_rules('description', 'description', 'required');
			$this->form_validation->set_rules('pon_number', 'pon_number', 'required');
			$this->form_validation->set_rules('sn', 'sn', 'required');
			$this->form_validation->set_rules('mac', 'mac', 'required');
			$this->form_validation->set_rules('vendor', 'vendor', 'required');
			$this->form_validation->set_rules('status_tr', 'status_tr', 'required');
			$this->form_validation->set_rules('status_omci', 'status_omci', 'required');
			$this->form_validation->set_rules('rx', 'rx', 'required');
			$this->form_validation->set_rules('tx', 'tx', 'required');

			if($this->form_validation->run())
				return TRUE;
			else
				return FALSE;
		}

	}

	public function save()
	{
		$data = array(
			'id_olt'    		=> $this->input->post('id_olt'),
			'id_wifi'    		=> $this->input->post('id_wifi'),
			'id_network'    		=> $this->input->post('id_network'),
			'name'    		=> $this->input->post('name'),
			'description'    	=> $this->input->post('description'),
			'pon_number'  		=> $this->input->post('pon_number'),
			'sn'  				=> $this->input->post('sn'),
			'mac'  				=> $this->input->post('mac'),
			'vendor'  			=> $this->input->post('vendor'),
			'status_tr'  		=> $this->input->post('status_tr'),
			'status_omci'  		=> $this->input->post('status_omci'),
			'rx'  				=> $this->input->post('rx'),
			'tx'  				=> $this->input->post('tx'),
		);

		return $this->db->insert('onus', $data);
	}

	public function update($id)
	{
		$data = array(
			'id_olt'    		=> $this->input->post('id_olt'),
			'id_wifi'    		=> $this->input->post('id_wifi'),
			'id_network'    		=> $this->input->post('id_network'),
			'name'    		=> $this->input->post('name'),
			'description'    	=> $this->input->post('description'),
			'pon_number'  		=> $this->input->post('pon_number'),
			'sn'  				=> $this->input->post('sn'),
			'mac'  				=> $this->input->post('mac'),
			'vendor'  			=> $this->input->post('vendor'),
			'status_tr'  		=> $this->input->post('status_tr'),
			'status_omci'  		=> $this->input->post('status_omci'),
			'rx'  				=> $this->input->post('rx'),
			'tx'  				=> $this->input->post('tx'),
		);

		$this->db->where('id', $id);
		return $this->db->update('onus', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('onus');
	}

	public function count_online_tr()
    {
        return count($this->db
			->where('status_tr', 'Online')
			->get('onus')
			->result());
    }

    public function count_offline_tr()
    {
        return  count($this->db
			->where('status_tr', 'Offline')
			->get('onus')
			->result());
    }
	public function count_online_omci()
    {
        return count($this->db
			->where('status_omci', 'Online')
			->get('onus')
			->result());
    }

    public function count_offline_omci()
    {
        return  count($this->db
			->where('status_omci', 'Offline')
			->get('onus')
			->result());
    }

	// data tarikan dari olt
	public function get_all_with_olts()
    {
        $this->db->select('
            onus.id,
            onus.id_olt,
            onus.name,
            onus.description,
            onus.pon_number,
            onus.sn,
            onus.mac,
            onus.vendor,
            onus.status_tr,
            onus.status_omci,
            onus.rx,
            onus.tx,
            onus.updated_at,
            olts.id as id_olt,
            olts.model as olt_model,
            olts.firmware as olt_firmware,
            olts.ip_address as olt_ip_device,
            olts.description as olt_description
        ');
        $this->db->from('onus');
        $this->db->join('olts', 'olts.id = onus.id_olt', 'left');

        return $this->db->get()->result();
    }

	// call
	public function get_all_with_olt()
	{
		return $this->db->get('olts')->result();
	}
	public function get_all_wifi()
	{
		return $this->db->get('wifis')->result();
	}
	public function get_all_network()
	{
		return $this->db->get('networks')->result();
	}

	public function get_detail($id)
	{
		$this->db->select('
			onus.*,

			olts.description AS olt_description,
			olts.grup AS olt_group,
			olts.model AS olt_model,
			olts.vendor AS olt_vendor,
			olts.firmware AS olt_firmware,

			wifis.wifi_name,
			wifis.wifi_password,

			networks.ip_address_device,
			networks.gateway,
			networks.dns
		');

		$this->db->from('onus');
		$this->db->join('olts', 'olts.id = onus.id_olt', 'left');
		$this->db->join('wifis', 'wifis.id = onus.id_wifi', 'left');
		$this->db->join('networks', 'networks.id = onus.id_network', 'left');
		$this->db->where('onus.id', $id);

		return $this->db->get()->row();
	}
}
