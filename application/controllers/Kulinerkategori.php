<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kulinerkategori extends CI_Controller {

	public function index()
	{
		$this->load->model('Kuliner_model');
		$kategori = $this->input->get('kategori');
		$kuliner = $this->Kuliner_model->getByKategori($kategori);
		
		$data = array('link' => 'kuliner', 
					'kuliner' => $kuliner
					);
		$this->load->view('kuliner_kategori', $data);
	}

}
