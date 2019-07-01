<?php
Class Data extends CI_Controller{
	public function index(){
		$this->load->model("data_barang");
		$data['list_barang'] = $this->data_barang->load_barang();

		$this->load->view("data_barang",$data);
	}


	public function add(){
		$this->load->model("data_barang");
		$data['tipe'] = "Add";

		if(isset($_POST['tombol_submit'])){
			//proses simpan dilakukan
			$this->data_barang->simpan($_POST);
			redirect("data");
		}

		$this->load->view("form_barang",$data);
	}
	public function edit($id){
		$this->load->model("data_barang");
		$data['tipe'] = "Edit";
		$data['default'] = $this->data_barang->get_default($id);

		if(isset($_POST['tombol_submit'])){
			$this->data_barang->update($_POST, $id);
			redirect("data");
		}

		$this->load->view("form_barang",$data);
	}


	public function delete($id){
		$this->load->model("data_barang");
		$this->data_barang->hapus($id);
		redirect("data");
	}


}