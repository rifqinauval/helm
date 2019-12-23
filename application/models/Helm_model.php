<?php

class Helm_model extends CI_model
{
	// public function getAllProduk($id)
	// {
	// 	$this->db->get_where('helm_jadi', ;
	// }

	public function getProduk($limit, $start)
	{
		return $this->db->get('helm_jadi', $limit, $start)->result_array();
	}


	public function getProdukById($id)
	{
		return $this->db->get_where('helm_jadi', ['id' => $id])->row_array();
	}

	public function tambahProduk($data)
	{

		$this->db->insert('helm_jadi', $data);
	}

	public function hapusDataProduk($id)
	{
		$this->db->delete('helm_jadi', ['id' => $id]);
	}

	public function ubahDataProduk()
	{

		$id = $this->input->post('id');
		$merek = $this->input->post('merek');
		$tipe = $this->input->post('tipe');
		$ukuran = $this->input->post('ukuran');
		$jenis = $this->input->post('jenis');
		$warna = $this->input->post('warna');
		$harga = $this->input->post('harga');
		$gambar = $_FILES['gambar'];
		if ($gambar = "") {
		} else {
			$config['upload_path'] = './assets/img/produk';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '2048';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				echo "gagal";
				die;
			} else {
				$gambar = $this->upload->data('file_name');
			}
		}
		// $gambar = $this->input->post('gambar')
		$data = array(
			'merek' => $merek,
			'tipe' => $tipe,
			'ukuran' => $ukuran,
			'jenis' => $jenis,
			'warna' => $warna,
			'harga' => $harga,
			'gambar' => $gambar
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('helm_jadi', $data);
	}

	public function cariDataHelm()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('merek', $keyword);
		$this->db->or_like('warna', $keyword);
		return $this->db->get('helm_jadi')->result_array();
	}
	public function cariDataHelmUser()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('merek', $keyword);
		$this->db->or_like('tipe', $keyword);
		return $this->db->get('helm_jadi')->result_array();
	}

	public function countAllHelm()
	{
		return $this->db->get('helm_jadi')->num_rows();
	}
	
}
