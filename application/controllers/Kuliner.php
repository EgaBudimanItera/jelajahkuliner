<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuliner extends CI_Controller {

	public function index()
	{
		$this->load->model('Kuliner_model');
		$this->load->library('Distance');
		
		$id = $this->input->get('id');
		$lat = $this->input->get('lat');
		$lng = $this->input->get('lng');
		$kuliner = $this->Kuliner_model->getById($id);
		
		$data = array('link' => 'kuliner', 
					'k' => $kuliner,
					'lat' => $lat,
					'lng' => $lng
					);
		$this->load->view('kuliner', $data);
	}

}
