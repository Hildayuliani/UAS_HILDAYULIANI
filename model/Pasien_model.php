<?php

class Pasien_model {

	protected $db;
	function __construct($db) {
		$this->db = $db;
	} 

	function tampil_data()
	{
		$row = $this->db->prepare("SELECT * FROM `tabel_pasien`");
		$row->execute();
		return $hasil = $row->fetchAll();
	}

	function getData($id)
	{
		$row = $this->db->prepare("SELECT * FROM `tabel_pasien` where id = $id ");
		$row->execute();
		return $hasil = $row->fetch();
	}

	function getJenisData()
	{
		$row = $this->db->prepare("SELECT * FROM `tabel_jenis_pelayanan`");
		$row->execute();
		return $hasil = $row->fetchAll();
	}

	function simpanData($data) {

		$rowsSQL = array();
		$toBind = array();
		$columnNames = array_keys($data[0]);

		foreach ($data as $arrayIndex => $row) {
			$params = array();
			foreach ($row as $columnName => $columnValue) {
				$param = ":" . $columnName . $arrayIndex;
				$params[] = $param;
				$toBind[$param] = $columnValue;
			}
			$rowsSQL[] = "(" . implode(", ", $params) . ")";
		}
		$sql = "INSERT INTO tabel_pasien (" . implode(", ", $columnNames) . ") VALUES " . implode(", ", $rowsSQL);
		$row = $this->db->prepare($sql);

		foreach ($toBind as $param => $val) {
			$row ->bindValue($param, $val);
		}

		return $row ->execute();

	}


	function simpanJenisPelayanan($data) {

		$rowsSQL = array();
		$toBind = array();
		$columnNames = array_keys($data[0]);

		foreach ($data as $arrayIndex => $row) {
			$params = array();
			foreach ($row as $columnName => $columnValue) {
				$param = ":" . $columnName . $arrayIndex;
				$params[] = $param;
				$toBind[$param] = $columnValue;
			}
			$rowsSQL[] = "(" . implode(", ", $params) . ")";
		}
		$sql = "INSERT INTO tabel_jenis_pelayanan (" . implode(", ", $columnNames) . ") VALUES " . implode(", ", $rowsSQL);
		$row = $this->db->prepare($sql);

		foreach ($toBind as $param => $val) {
			$row ->bindValue($param, $val);
		}

		return $row ->execute();

	}
	

	function updateData($data,$id) {

		$setPart = array();
		foreach ($data as $key => $value) {
			$setPart[] = $key."=:".$key;
		}
		$sql = "UPDATE tabel_pasien SET ".implode(', ', $setPart). " WHERE id = :id";
		$row = $this->db->prepare($sql);
		$row ->bindValue(':id', $id);
		foreach ($data as $param => $val) 
		{
			$row ->bindValue($param,$val);
		}
		return $row ->execute();
	}

	function hapusData($id) 
	{
		$sql = "DELETE FROM tabel_pasien WHERE id = ?";
		$row = $this->db->prepare($sql);
		return $row ->execute(array($id));
	}
}

?>