<?php
//Model_data.php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Data_barang extends CI_Model{

	public function load_barang(){
		$sql = $this->db->query("SELECT * FROM tb_barang WHERE flag = 1");
		return $sql->result_array();
	}

	public function simpan($post){
		//pastikan nama index post yang dipanggil sama seperti di form input
		$nama = $this->db->escape($post['nama']);
		$tanggal = $this->db->escape($post['tanggal']);
		$jumlah = $this->db->escape($post['jumlah']);

		$sql = $this->db->query("INSERT INTO tb_barang VALUES (NULL, $nama, $tanggal, $jumlah, 1)");
		if($sql)
			return true;
		return false;
	}

	public function get_default($id){
		$sql = $this->db->query("SELECT * FROM tb_barang WHERE id = ".intval($id));
		if($sql->num_rows() > 0)
			return $sql->row_array();
		return false;
	}

	public function update($post, $id){
		//parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
		$nama= $this->db->escape($post['nama']);
		$tanggal = $this->db->escape($post['tanggal']);
		$jumlah = $this->db->escape($post['jumlah']);

		$sql = $this->db->query("UPDATE tb_barang SET nama_barang = $nama, tanggal_datang = $tanggal, jumlah = $jumlah WHERE id = ".intval($id));

		return true;
	}

	public function hapus($id){
		$sql = $this->db->query("UPDATE tb_barang SET flag = 0 WHERE id = ".intval($id));
	}	
}