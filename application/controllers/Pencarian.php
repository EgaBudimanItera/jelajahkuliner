<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencarian extends CI_Controller {

	public function index()
	{
		$this->load->model('Kuliner_model');
		$kuliner = $this->Kuliner_model->get();
		$data = array('link' => 'pencarian', 'kuliner' => $kuliner);
		$this->load->view('pencarian', $data);
	}

	public function result()
	{
		$this->load->model('Kuliner_model');
		$kuliner = $this->Kuliner_model->get();
		$data = array('link' => 'pencarian', 'kuliner' => $kuliner);
		$this->load->view('pencarian_result', $data);
	}
}
