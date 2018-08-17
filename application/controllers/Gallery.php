<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public function index()
	{
		$this->load->model('Kategori_model');
		$kategori = $this->Kategori_model->get();
		
		$data = array('link' => 'gallery', 'kategori' => $kategori);
		$this->load->view('gallery', $data);
	}
}
