<?php
class Kuliner_model extends CI_Model {

	public function get()
	{
		$this->db->join('kategori', 'kuliner.id_kategori = kategori.id_kategori', 'left');
		$query = $this->db->get('kuliner');
		return $query->result();
	}

	public function getById($id)
	{
		$this->db->where('kuliner.id_kuliner', $id);
		$this->db->join('kategori', 'kuliner.id_kategori = kategori.id_kategori', 'left');
		$query = $this->db->get('kuliner');
		return $query->result();
	}

	public function getByKategori($k)
	{
		$this->db->where('kuliner.id_kategori', $k);
		$this->db->join('kategori', 'kuliner.id_kategori = kategori.id_kategori', 'left');
		$query = $this->db->get('kuliner');
		return $query->result();
	}

	public function insert($data)
	{
		return $this->db->insert('kuliner', $data);
	}

	public function delete($id)
	{
		return $this->db->delete('kuliner', array('id_kuliner' => $id));
	}
}