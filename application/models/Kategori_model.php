<?php
class Kategori_model extends CI_Model {

	public function get()
	{
		$query = $this->db->get('kategori');
		return $query->result();
	}

	public function getById($id)
	{
		$this->db->where('id_kategori', $id);
		$query = $this->db->get('kategori');
		return $query->row();
	}

	public function insert($data)
	{
		return $this->db->insert('kategori', $data);
	}
	
	public function update($data, $id){       
        $this->db->where('id_kategori', $id);
        return $this->db->update('kategori', $data); 
    }
	
	public function delete($id)
	{
		return $this->db->delete('kategori', array('id_kategori' => $id));
	}
	
}