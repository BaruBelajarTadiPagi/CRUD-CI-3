<?php

if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class OLTModel extends CI_Model 
{
	public function view()
	{
		return $this->db->get('olts')->result();
	}

	public function view_by($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('olts')->row();
	}

	public function validation($mode)
	{
		$this->load->library('form_validation');

		if($mode == 'save')
		{
			$this->form_validation->set_rules('description', 'description', 'required');
			$this->form_validation->set_rules('grup', 'grup', 'required');
			$this->form_validation->set_rules('model', 'model', 'required');
			$this->form_validation->set_rules('ip_address', 'ip_address', 'required');
			$this->form_validation->set_rules('vendor', 'vendor', 'required');
			$this->form_validation->set_rules('firmware', 'firmware', 'required');
			$this->form_validation->set_rules('status', 'status', 'required');

			if($this->form_validation->run())
				return TRUE;
			else
				return FALSE;
		}

		if ($mode == 'update') 
		{
			$this->form_validation->set_rules('description', 'description', 'required');
			$this->form_validation->set_rules('grup', 'grup', 'required');
			$this->form_validation->set_rules('model', 'model', 'required');
			$this->form_validation->set_rules('ip_address', 'ip_address', 'required');
			$this->form_validation->set_rules('vendor', 'vendor', 'required');
			$this->form_validation->set_rules('firmware', 'firmware', 'required');
			$this->form_validation->set_rules('status', 'status', 'required');

			if($this->form_validation->run())
				return TRUE;
			else
				return FALSE;
		}

	}

	public function save()
	{
		$data = array(
			'description'    		=> $this->input->post('description'),
			'grup'  				=> $this->input->post('grup'),
			'model'  				=> $this->input->post('model'),
			'ip_address'  			=> $this->input->post('ip_address'),
			'vendor'  				=> $this->input->post('vendor'),
			'firmware'  			=> $this->input->post('firmware'),
			'status'  				=> $this->input->post('status'),
		);

		return $this->db->insert('olts', $data);
	}

	public function update($id)
	{
		$data = array(
			'description'    		=> $this->input->post('description'),
			'grup'  				=> $this->input->post('grup'),
			'model'  				=> $this->input->post('model'),
			'ip_address'  			=> $this->input->post('ip_address'),
			'vendor'  				=> $this->input->post('vendor'),
			'firmware'  			=> $this->input->post('firmware'),
			'status'  				=> $this->input->post('status'),
		);

		$this->db->where('id', $id);
		return $this->db->update('olts', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('olts');
	}

	public function count_online()
    {
        return count($this->db
			->where('status', 'Online')
			->get('olts')
			->result());
    }

    public function count_offline()
    {
        return  count($this->db
			->where('status', 'Offline')
			->get('olts')
			->result());
    }

	// relasi
	public function get_all()
    {
        return $this->db->get('olts')->result();
    }

    // Ambil 1 OLT
    public function get_by_id($id)
    {
        return $this->db
            ->get_where($this->table, ['id' => $id])
            ->row();
    }

    // Ambil OLT + ONU (JOIN)
    public function get_with_onu($id)
    {
        $this->db->select('
            olts.*,
            onus.id as onu_id,
            onus.name as onu_name,
            onus.sn,
            onus.pon_number,
            onus.status_tr,
            onus.status_omci
        ');
        $this->db->from('olts');
        $this->db->join('onus', 'onus.id_olt = olts.id', 'left');
        $this->db->where('olts.id', $id);

        return $this->db->get()->result();
    }
}
