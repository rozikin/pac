<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model

{

	public function getAllmahasiswa()
	{
		return $this->db->get('mahasiswa')->result_array();
	}

	public function add_data($data)
	{
		$this->db->insert('mahasiswa', $data);
		return $this->db->insert_id();
	}



	public function hapusData($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('mahasiswa');
	}

	public function getIDmhs($id)
	{
		return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
	}

	public function getID($id)
	{
		return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
	}

	public function editData()
	{

		$data = [
			"nrp" => $this->input->post('nrp', true),
			"nama" => $this->input->post('nama', true),
			"email" => $this->input->post('email', true),
			"jurusan" => $this->input->post('jurusan', true)
		];
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('mahasiswa', $data);
	}
}
