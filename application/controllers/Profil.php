<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function index()
	{
		$this->load->model('Profil_model');
		$profil = $this->Profil_model->get();
		$data = array('link' => 'profil', 'profil' => $profil);
		$this->load->view('profil', $data);
	}
}
