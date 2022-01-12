<?php 
//panggil file\
	include '../Database.php';
	include '../model/Pasien_model.php';


	class Pasien {
		public $model;

		function __construct(){
		$db = new Database();
		$conn = $db->DBConnect();
		$this->model = new Pasien_model($conn);
	}

function index() {
	session_start();
	if(!empty($_SESSION)){
		$hasil = $this->model->tampil_data();
		return $hasil;
	}else{
		header("Location:index.php");
		}
	 }


	// function index() {
	// $hasil = $this->model->tampil_data();
	// return $hasil;
	//  }


	 function getData($id) { 
	$hasil = $this->model->getData($id);
	return $hasil;
	 }


	 function getJenisData() {
	$hasil = $this->model->getJenisData();

	echo json_encode($hasil);
	// return $hasil;
	 }


	 function hapusPasien(){
	 	if(isset($_POST['delete'])) {
	 		$id = $_POST['id'];

	 		$result = $this->model->hapusData($id);

	 		if($result){
					header("Location:content.php?pesan=success&frm=del");
				}else{
					header("Location:content.php?pesan=gagal&frm=del");
				}
	 	}
	 }


	 function simpanPasien(){
	 	if(isset($_POST['simpan'])) {
	 		$nomor_pasien = $_POST['nomor_pasien'];
			$nama_pasien = $_POST['nama_pasien'];
			$tgl_lahir = $_POST['tgl_lahir'];
			$jenis_kelamin = $_POST['jenis_kelamin'];
			$umur = $_POST['umur'];
			$diagnosa_penyakit = $_POST['diagnosa_penyakit'];
			$nama_dokter = $_POST['nama_dokter'];
			$jenis_pelayanan = $_POST['jenis_pelayanan'];


				$data[] = array(
					'nomor_pasien'		=>$nomor_pasien,
					'nama_pasien'		=>$nama_pasien,
					'tgl_lahir'			=>$tgl_lahir,
					'jenis_kelamin'		=>$jenis_kelamin,
					'umur'				=>$umur,
					'diagnosa_penyakit'	=>$diagnosa_penyakit,
					'nama_dokter'		=>$nama_dokter,
					'jenis_pelayanan'	=>$jenis_pelayanan
				);

			$result = $this->model->simpanData($data);

				if($result){
					header("Location:content.php?pesan=success&frm=add");
				}else{
					header("Location:content.php?pesan=gagal&frm=add");
				}
	 	}
	 }

	 function simpanJenis(){
	 	$jenis_pelayanan = $_POST['pelayanan'];
	 	$data[] = array(
	 		'jenis_pelayanan'	=>$jenis_pelayanan,
	 	);

	 		$result = $this->model->simpanJenisPelayanan($data);
	 		if($result){
	 			echo "200";
	 		}else{
	 			echo "300";
	 		}
	 }


	 function updatePasien($id){
	 	if(isset($_POST['update'])) {
	 		$nomor_pasien = $_POST['nomor_pasien'];
			$nama_pasien = $_POST['nama_pasien'];
			$tgl_lahir = $_POST['tgl_lahir'];
			$jenis_kelamin = $_POST['jenis_kelamin'];
			$umur = $_POST['umur'];
			$diagnosa_penyakit = $_POST['diagnosa_penyakit'];
			$nama_dokter = $_POST['nama_dokter'];
			$jenis_pelayanan = $_POST['jenis_pelayanan'];


			$data = array(
					'nomor_pasien' 		=>$nomor_pasien,
					'nama_pasien' 		=>$nama_pasien,
					'tgl_lahir' 		=>$tgl_lahir,
					'jenis_kelamin' 	=>$jenis_kelamin,
					'umur' 				=>$umur,
					'diagnosa_penyakit' =>$diagnosa_penyakit,
					'nama_dokter' 		=>$nama_dokter,
					'jenis_pelayanan' 	=>$jenis_pelayanan
				);

			$result = $this->model->updateData($data,$id);

			if($result){
					header("Location:content.php?pesan=success&frm=edit");
				}else{
					header("Location:content.php?pesan=gagal&frm=edit");
				}
	 	}
	}

	function Logout(){
		if(isset($_POST['logout'])) {
			session_start();
			session_destroy();
			// header("Location:index.php");
			header("Location:index.php?pesan=success&frm=logout");
		}
	}
}
?>