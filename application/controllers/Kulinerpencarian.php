<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kulinerpencarian extends CI_Controller {

	public function index()
	{
		$this->load->model('Kuliner_model');
		$this->load->library('Distance');
		$kuliner = $this->Kuliner_model->get();
		
		$lat = $this->input->get('lat');
		$lng = $this->input->get('lng');
		
		if (empty($lat) OR empty($lng)) {
			$this->session->set_flashdata('msg', 'Anda belum memilih lokasi Anda pada Peta.');
			redirect('pencarian');
		}
		
		$data = array('link' => 'kuliner', 
					'kuliner' => $kuliner,
					'lat' => $lat,
					'lng' => $lng,
					);
		$this->load->view('kuliner_pencarian', $data);
	}

}
