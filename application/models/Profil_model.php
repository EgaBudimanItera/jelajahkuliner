<?php
class Profil_model extends CI_Model {

	public function get()
	{
		$this->db->where('id', '1');
		$query = $this->db->get('profil');
		return $query->row();
	}

	public function update($data)
	{
		return $this->db->update('profil', $data, array('id' => '1'));
	}
}