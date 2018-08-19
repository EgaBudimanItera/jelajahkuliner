<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->login();
	}

	private function ceklogin()
	{
		if ($this->session->is_login != '1')
			redirect('admin/login');
	}

	public function login()
	{
		$this->load->view('admin/login');
	}

	public function processlogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		if ($username == "admin" && $password == "admin") {
			$newdata = array(
					'is_login'		=> '1',
					'is_admin'		=> '1',
			);

			$this->session->set_userdata($newdata);
			redirect('admin/kuliner');
		} else {
			$this->session->set_flashdata('msg', 'User tidak ditemukan.');
			redirect('admin/login');
		}
	}
	
	public function logout()
	{
		$this->load->library('session');
		
		$array_items = array('is_login', 'is_admin');
		$this->session->unset_userdata($array_items);
		redirect('admin/login');
		
	}
	
	public function dashboard()
	{
		$this->ceklogin();
		$data = array('link' => 'login');
		$this->load->view('admin/dashboard', $data);
	}

	public function kuliner()
	{
		$this->ceklogin();
		$this->load->model('Kuliner_model');
		$kuliner = $this->Kuliner_model->get();
		$data = array('link' => 'kuliner', 'kuliner' => $kuliner);
		$this->load->view('admin/kuliner', $data);
	}

	public function tambah_kuliner()
	{
		$this->ceklogin();
		$this->load->model('Kategori_model');
		$kategori = $this->Kategori_model->get();
		$data = array('link' => 'tambah_kuliner', 'kategori' => $kategori);
		$this->load->view('admin/kuliner_tambah', $data);
	}
	
	public function ubah_kuliner($id)
	{
		$this->ceklogin();
		$this->load->model('Kuliner_model');
		$this->load->model('Kategori_model');
		
		$kuliner = $this->Kuliner_model->getById($id);
		$kategori = $this->Kategori_model->get();
		
		$data = array('link' => 'ubah_kuliner', 'kategori' => $kategori, 'kuliner' => $kuliner);
		$this->load->view('admin/kuliner_ubah', $data);
	}

	public function kategori()
	{
		$this->ceklogin();
		$this->load->model('Kategori_model');
		$kategori = $this->Kategori_model->get();
		$data = array('link' => 'kategori', 'kategori' => $kategori);
		$this->load->view('admin/kategori', $data);
	}

	public function tambah_kategori()
	{
		$this->ceklogin();
		$data = array('link' => 'tambah_kategori');
		$this->load->view('admin/kategori_tambah', $data);
	}

	public function proses_tambah_kuliner()
	{
		$this->ceklogin();
		$nama = $this->input->post('nama');
		$kategori = $this->input->post('kategori');
		$deskripsi = $this->input->post('deskripsi');
		$menu = $this->input->post('menu');
		$kisaran = $this->input->post('kisaran');
		$alamat = $this->input->post('alamat');
		$lat = $this->input->post('lat');
		$lng = $this->input->post('lng');
		$foto = "";
		
		if (empty($nama)) {
            $this->session->set_flashdata('msg', 'Nama Tempat Kuliner tidak boleh kosong.');
            redirect('admin/tambah_kuliner');
			exit();
		}
		
		if (empty($kategori)) {
            $this->session->set_flashdata('msg', 'Anda belum memilih Kategori.');
            redirect('admin/tambah_kuliner');
			exit();
		}
		
		if (empty($deskripsi)) {
            $this->session->set_flashdata('msg', 'Deskripsi Kategori tidak boleh kosong.');
            redirect('admin/tambah_kuliner');
			exit();
		}
		
		if (empty($kisaran)) {
            $this->session->set_flashdata('msg', 'Kisaran harga tidak boleh kosong.');
            redirect('admin/tambah_kuliner');
			exit();
		}
		
		if (empty($menu)) {
            $this->session->set_flashdata('msg', 'Menu andalan tidak boleh kosong.');
            redirect('admin/tambah_kuliner');
			exit();
		}
		
		if (empty($alamat)) {
            $this->session->set_flashdata('msg', 'Alamat tidak boleh kosong.');
            redirect('admin/tambah_kuliner');
			exit();
		}
		
		if (empty($lat)) {
            $this->session->set_flashdata('msg', 'Latitude tidak boleh kosong.');
            redirect('admin/tambah_kuliner');
			exit();
		}
		
		if (empty($lng)) {
            $this->session->set_flashdata('msg', 'Longitude tidak boleh kosong.');
            redirect('admin/tambah_kuliner');
			exit();
		}
		
		$config['upload_path'] = 'assets/images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2048000';
		
		$this->load->library('upload', $config);
		if($this->upload->do_upload('foto'))
		{
			$data = array('upload_data' => $this->upload->data());
			$foto = $data['upload_data']['file_name'];
		}
		else
		{
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('msg', print_r($error, true));
			redirect('admin/tambah_kuliner');
			exit();
		}
		
		$this->load->model('Kuliner_model');
		$data = array(
					'nama_kuliner' => $nama,
					'deskripsi_kuliner' => $deskripsi,
					'menu_andalan' => $menu,
					'kisaran_harga' => $kisaran,
					'alamat' => $alamat,
					'foto_kuliner' => $foto,
					'id_kategori' => $kategori,
					'lat_kuliner' => $lat,
					'lng_kuliner' => $lng,
				);
		
		$result = $this->Kuliner_model->insert($data);
		if ($result) {
			$this->session->set_flashdata('msg', 'Kuliner berhasil disimpan.');
			redirect('admin/kuliner');	
		} else {
			$this->session->set_flashdata('msg', 'Terjadi Kesalahan. Data tidak berhasil disimpan.');
			redirect('admin/tambah_kuliner');
		}
	}

	public function proses_ubah_kuliner()
	{
		$this->ceklogin();
		$id = $this->input->post('id_kuliner');
		$nama = $this->input->post('nama');
		$kategori = $this->input->post('kategori');
		$deskripsi = $this->input->post('deskripsi');
		$menu = $this->input->post('menu');
		$kisaran = $this->input->post('kisaran');
		$alamat = $this->input->post('alamat');
		$lat = $this->input->post('lat');
		$lng = $this->input->post('lng');
		$foto = "";
		
		if (empty($nama)) {
            $this->session->set_flashdata('msg', 'Nama Tempat Kuliner tidak boleh kosong.');
            redirect('admin/ubah_kuliner/'.$id);
			exit();
		}
		
		if (empty($kategori)) {
            $this->session->set_flashdata('msg', 'Anda belum memilih Kategori.');
            redirect('admin/ubah_kuliner/'.$id);
			exit();
		}
		
		if (empty($deskripsi)) {
            $this->session->set_flashdata('msg', 'Deskripsi Kategori tidak boleh kosong.');
            redirect('admin/ubah_kuliner/'.$id);
			exit();
		}
		
		if (empty($kisaran)) {
            $this->session->set_flashdata('msg', 'Kisaran harga tidak boleh kosong.');
            redirect('admin/ubah_kuliner/'.$id);
			exit();
		}
		
		if (empty($menu)) {
            $this->session->set_flashdata('msg', 'Menu andalan tidak boleh kosong.');
            redirect('admin/ubah_kuliner/'.$id);
			exit();
		}
		
		if (empty($alamat)) {
            $this->session->set_flashdata('msg', 'Alamat tidak boleh kosong.');
            redirect('admin/ubah_kuliner/'.$id);
			exit();
		}
		
		if (empty($lat)) {
            $this->session->set_flashdata('msg', 'Latitude tidak boleh kosong.');
            redirect('admin/ubah_kuliner/'.$id);
			exit();
		}
		
		if (empty($lng)) {
            $this->session->set_flashdata('msg', 'Longitude tidak boleh kosong.');
            redirect('admin/ubah_kuliner/'.$id);
			exit();
		}
		
		if (isset($_FILES['foto']) AND $_FILES['foto']['tmp_name'] != "") {
			$config['upload_path'] = 'assets/images/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048000';
			
			$this->load->library('upload', $config);
			if($this->upload->do_upload('foto'))
			{
				$data = array('upload_data' => $this->upload->data());
				$foto = $data['upload_data']['file_name'];
			}
			else
			{
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('msg', print_r($error, true));
				redirect('admin/ubah_kuliner/'.$id);
				exit();
			}
		}
		
		$this->load->model('Kuliner_model');
		if ($foto == "") {
			$data = array(
					'nama_kuliner' => $nama,
					'deskripsi_kuliner' => $deskripsi,
					'menu_andalan' => $menu,
					'kisaran_harga' => $kisaran,
					'alamat' => $alamat,
					'id_kategori' => $kategori,
					'lat_kuliner' => $lat,
					'lng_kuliner' => $lng,
				);
		} else {
			$data = array(
					'nama_kuliner' => $nama,
					'deskripsi_kuliner' => $deskripsi,
					'menu_andalan' => $menu,
					'kisaran_harga' => $kisaran,
					'alamat' => $alamat,
					'foto_kuliner' => $foto,
					'id_kategori' => $kategori,
					'lat_kuliner' => $lat,
					'lng_kuliner' => $lng,
				);
		}

		$result = $this->Kuliner_model->update($data, $id);
		if ($result) {
			$this->session->set_flashdata('msg', 'Kuliner berhasil disimpan.');
			redirect('admin/kuliner');	
		} else {
			$this->session->set_flashdata('msg', 'Terjadi Kesalahan. Data tidak berhasil disimpan.');
			redirect('admin/ubah_kuliner/'.$id);
		}
	}

	public function proses_tambah_kategori()
	{
		$this->ceklogin();
		$nama = $this->input->post('nama');
		$deskripsi = $this->input->post('deskripsi');
		$foto = "";
		
		if (empty($nama)) {
            $this->session->set_flashdata('msg', 'Nama Kategori tidak boleh kosong.');
            redirect('admin/tambah_kategori');
			exit();
		}
		
		if (empty($deskripsi)) {
            $this->session->set_flashdata('msg', 'Deskripsi Kategori tidak boleh kosong.');
            redirect('admin/tambah_kategori');
			exit();
		}
		
			
		$config['upload_path'] = 'assets/images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2048000';
		
		$this->load->library('upload', $config);
		if($this->upload->do_upload('foto'))
		{
			$data = array('upload_data' => $this->upload->data());
			$foto = $data['upload_data']['file_name'];
		}
		else
		{
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('msg', print_r($error, true));
			redirect('admin/tambah_kategori');
			exit();
		}
		
		
		$this->load->model('Kategori_model');
		$data = array(
					'nama_kategori' => $nama,
					'deskripsi_kategori' => $deskripsi,
					'foto_kategori' => $foto,
				);
		$result = $this->Kategori_model->insert($data);
		if ($result) {
			$this->session->set_flashdata('msg', 'Kategori berhasil disimpan.');
			redirect('admin/kategori');	
		} else {
			$this->session->set_flashdata('msg', 'Terjadi Kesalahan. Data tidak berhasil disimpan.');
			redirect('admin/tambah_kategori');
		}
	}
	
	
	public function hapus_kuliner($id)
	{
		$this->ceklogin();
		$this->load->model('Kuliner_model');
		$notifikasi = $this->Kuliner_model->delete($id);
		$this->session->set_flashdata('msg', 'Data berhasil dihapus.');
		redirect('admin/kuliner');
	}
	
	
	public function hapus_kategori($id)
	{
		$this->ceklogin();
		$this->load->model('Kategori_model');
		$notifikasi = $this->Kategori_model->delete($id);
		$this->session->set_flashdata('msg', 'Data berhasil dihapus.');
		redirect('admin/kategori');
	}

	public function ubah_kategori($id)
	{
		$this->ceklogin();
		$this->load->model('Kategori_model');
		$kategori = $this->Kategori_model->getById($id);
		$data = array('kategori' => $kategori);
		$this->load->view('admin/kategori_ubah', $data);
	}

	public function proses_ubah_kategori()
	{
		$this->ceklogin();
		
		$id = $this->input->post('id_kategori');
		$nama = $this->input->post('nama');
		$deskripsi = $this->input->post('deskripsi');
		$fotolama = $this->input->post('gambarlama');
		
		if (empty($nama)) {
            $this->session->set_flashdata('msg', 'Nama Kategori tidak boleh kosong.');
            redirect('admin/form_ubah_kategori/'.$id);
			exit();
		}
		
		if (empty($deskripsi)) {
            $this->session->set_flashdata('msg', 'Deskripsi Kategori tidak boleh kosong.');
            redirect('admin/form_ubah_kategori/'.$id);
			exit();
		}
		$file = $_FILES['foto']['name'];
		
		if (!empty($file)) {
			$config['upload_path'] = 'assets/images/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048000';
			
			$this->load->library('upload', $config);
			if($this->upload->do_upload('foto'))
			{
				$data = array('upload_data' => $this->upload->data());
				$foto = $data['upload_data']['file_name'];
			}
			else
			{
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('msg', print_r($error, true));
				redirect('admin/form_ubah_kategori/'.$id);
				exit();
			}
		} else {
			$foto = $fotolama;
		}
			
		$this->load->model('Kategori_model');
		$data = array(
					'nama_kategori' => $nama,
					'deskripsi_kategori' => $deskripsi,
					'foto_kategori' => $foto,
				);
		$result = $this->Kategori_model->update($data, $id);
		
		if ($result) {
			$this->session->set_flashdata('msg', 'Kategori berhasil diubah.');
			redirect('admin/kategori');	
		} else {
			$this->session->set_flashdata('msg', 'Terjadi Kesalahan. Data tidak berhasil diubah.');
			redirect('admin/form_ubah_kategori/'.$id);
		}
	}

	public function profil()
	{
		$this->ceklogin();
		$this->load->model('Profil_model');
		$profil = $this->Profil_model->get();
		$data = array('link' => 'profil', 'profil' => $profil);
		$this->load->view('admin/profil', $data);
	}

	public function proses_simpan_profil()
	{
		$this->ceklogin();
		$profil = $this->input->post('profil');
		$foto = "";
		
		if (empty($profil)) {
            $this->session->set_flashdata('msg', 'Profil tidak boleh kosong.');
            redirect('admin/profil');
			exit();
		}
		
		if (isset($_FILES['foto']) AND $_FILES['foto']['tmp_name'] != "") {
			$config['upload_path'] = 'assets/images/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048000';
			
			$this->load->library('upload', $config);
			if($this->upload->do_upload('foto'))
			{
				$data = array('upload_data' => $this->upload->data());
				$foto = $data['upload_data']['file_name'];
			}
			else
			{
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('msg', print_r($error, true));
				redirect('admin/profil');
				exit();
			}
		}
		
		$this->load->model('Profil_model');
		if ($foto != "") {
			$data = array(
					'profil' => $profil,
					'foto' => $foto,
				);
		} else {
			$data = array(
					'profil' => $profil
				);
		}
		$result = $this->Profil_model->update($data);
		if ($result) {
			$this->session->set_flashdata('msg', 'Profil berhasil disimpan.');
			redirect('admin/profil');	
		} else {
			$this->session->set_flashdata('msg', 'Terjadi Kesalahan. Data tidak berhasil disimpan.');
			redirect('admin/profil');
		}
	}
}
