<?php

class M_dashboard extends MY_Model{


	public function new_pemudik($nama, $jenis, $pekerjaan, $asal, $tujuan, $transportasi){
		return $this->db->query("INSERT INTO `pemudik` (`nama`, `jenis_kelamin`, `pekerjaan`, `asal`, `tujuan`, `transportasi`) 
			VALUES ('".$nama."', '".$jenis."', '".$pekerjaan."', '".$asal."', '".$tujuan."', '".$transportasi."');");
	}

	public function get_pemudik(){
		return $this->db->query("SELECT a.`pid` AS ID, a.`nama` AS NAMA, a.`jenis_kelamin` AS JENIS, a.`pekerjaan` AS PEKERJAAN, (SELECT `nama` FROM `tempat` WHERE `tid`=a.`asal`) AS ASAL, (SELECT `nama` FROM `tempat` WHERE `tid`=a.`tujuan`) AS TUJUAN,  (SELECT `nama` FROM `transportasi` WHERE `tid`=a.`transportasi`) AS TRANSPORTASI, (SELECT `tanggal_pemberangkatan` FROM `transportasi` WHERE `tid`=a.`transportasi`) AS TANGGAL, (SELECT `waktu_pemberangkatan` FROM `transportasi` WHERE `tid`=a.`transportasi`) AS WAKTU, (SELECT c.`nama` FROM `transportasi` as d, `jenis_transportasi` as c WHERE c.`jtid`=d.`jtid` && d.`tid`=a.`transportasi` ) AS JENIS_TRANSPORTASI
      FROM `pemudik` AS a");
	}

	public function get_pemudik_byid($id){
		return $this->db->query("SELECT a.`pid` AS ID, a.`nama` AS NAMA, a.`jenis_kelamin` AS JENIS, a.`pekerjaan` AS PEKERJAAN, (SELECT `nama` FROM `tempat` WHERE `tid`=a.`asal`) AS ASAL, (SELECT `nama` FROM `tempat` WHERE `tid`=a.`tujuan`) AS TUJUAN,  (SELECT `nama` FROM `transportasi` WHERE `tid`=a.`transportasi`) AS TRANSPORTASI, (SELECT `tanggal_pemberangkatan` FROM `transportasi` WHERE `tid`=a.`transportasi`) AS TANGGAL, (SELECT `waktu_pemberangkatan` FROM `transportasi` WHERE `tid`=a.`transportasi`) AS WAKTU, (SELECT c.`nama` FROM `transportasi` as d, `jenis_transportasi` as c WHERE c.`jtid`=d.`jtid` && d.`tid`=a.`transportasi` ) AS JENIS_TRANSPORTASI
      FROM `pemudik` AS a
      WHERE a.`pid`='".$id."' ");
	}

	public function get_transportasi($asal, $tujuan){
		return $this->db->query("SELECT a.`tid` AS ID, a.`nama` AS NAMA, b.`nama` AS JENIS, a.`jumlah_penumpang` AS PENUMPANG, a.`sisa_penumpang` AS SISA, (SELECT `nama` FROM `tempat` WHERE `tid`=a.`asal`) AS ASAL, (SELECT `nama` FROM `tempat` WHERE `tid`=a.`tujuan`) AS TUJUAN, a.`tanggal_pemberangkatan` AS TANGGAL, a.`waktu_pemberangkatan` AS WAKTU, a.`route` AS ROUTE 
      FROM `transportasi` AS a, `jenis_transportasi` AS b
      WHERE a.`jtid`= b.`jtid` 
      	AND a.`route` LIKE '%".$asal."%' 
      	AND a.`route` LIKE '%".$tujuan."%' 
      	AND a.`sisa_penumpang` > 0 ");
	}

	public function update_sisa($id){
		$sisa = $this->db->query("SELECT `sisa_penumpang` as sisa FROM `transportasi` WHERE `tid` = '".$id."' ")->row_array()['sisa'];

		$sisa--;

		return $this->db->query("UPDATE `transportasi` 
			SET `sisa_penumpang` = '".$sisa."' 
			WHERE `transportasi`.`tid` = '".$id."' ");
	}


}