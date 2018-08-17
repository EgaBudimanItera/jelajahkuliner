<?php
class Kategori_model extends CI_Model {

	public function get()
	{
		$query = $this->db->get('kategori');
		return $query->result();
	}

	public function insert($data)
	{
		return $this->db->insert('kategori', $data);
	}

	public function delete($id)
	{
		return $this->db->delete('kategori', array('id_kategori' => $id));
	}
}