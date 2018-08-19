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

	public function get_where($paramid,$id){
		$query = $this->db->get_where('kategori', array($paramid => $id));
		return $query;
	}

	function update($param_kode, $kode, $data){       
        $this->db->where($param_kode, $kode);
        $this->db->update('kategori', $data); 
        return true;
    }
}