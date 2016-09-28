<?php

class M_administrator extends MY_Model{

	public function new_transportasi($nama, $jenis, $jumlah, $asal, $tujuan, $tanggal, $waktu, $route){
		return $this->db->query("INSERT INTO `transportasi` (`tid`, `nama`, `jtid`, `jumlah_penumpang`, `sisa_penumpang`, `asal`, `tujuan`, `tanggal_pemberangkatan`, `waktu_pemberangkatan`, `route`) 
			VALUES (NULL, '".$nama."', '".$jenis."', '".$jumlah."', '".$jumlah."', '".$asal."', '".$tujuan."', '".$tanggal."', '".$waktu."', '".$route."');");
	}

	public function get_transportasi(){
		return $this->db->query("SELECT a.`tid` AS ID, a.`nama` AS NAMA, b.`nama` AS JENIS, a.`jumlah_penumpang` AS PENUMPANG, a.`sisa_penumpang` AS SISA, (SELECT `nama` FROM `tempat` WHERE `tid`=a.`asal`) AS ASAL, (SELECT `nama` FROM `tempat` WHERE `tid`=a.`tujuan`) AS TUJUAN, a.`tanggal_pemberangkatan` AS TANGGAL, a.`waktu_pemberangkatan` AS WAKTU, a.`route` AS ROUTE 
      FROM `transportasi` AS a, `jenis_transportasi` AS b
      WHERE (a.`jtid`= b.`jtid`) ");
	}

	public function get_totaltiket(){
		return $this->db->query("SELECT sum(`jumlah_penumpang`) AS total FROM `transportasi`");
	}
	public function get_sisatiket(){
		return $this->db->query("SELECT sum(`sisa_penumpang`) AS sisa FROM `transportasi`");
	}

	public function get_user(){
		return $this->db->query("SELECT a.`username` as username, a.`nama` as nama, b.`nama` as hak 
			FROM `user` as a, `auth` as b 
			where a.`auid`=b.`auid`");
	}

	public function get_semuatempat(){
		$this->db->select('*');
      	$this->db->from('tempat');
      	//$this->db->where('jenis', $jenis);
      	return $this->db->get();
	}

	public function get_tempat($tid){
		$this->db->select('*');
      	$this->db->from('tempat');
      	$this->db->where('tid', $tid);
      	return $this->db->get();
	}

	public function get_semuajenistransportasi(){
		$this->db->select('*');
      	$this->db->from('jenis_transportasi');
      	return $this->db->get();
	}

	public function tempat(){
      	return $this->db->query("SELECT a.`nama` as nama, b.`nama` as jenis 
			FROM `tempat` as a, `jenis_transportasi` as b 
			where a.`jenis`=b.`jtid`");
	}

	public function get_jenistransportasi($jtid){
		$this->db->select('*');
      	$this->db->from('jenis_transportasi');
      	$this->db->where('jtid', $jtid);
      	return $this->db->get();
	}

	public function new_jenistransport($nama){
		return $this->db->query("INSERT INTO `jenis_transportasi` (`jtid`, `nama`) 
			VALUES (NULL, '".$nama."');");
	}
	public function new_tempat($nama, $jenis){
		return $this->db->query("INSERT INTO `tempat` (`tid`, `nama`, `jenis`) 
			VALUES (NULL, '".$nama."', '".$jenis."' )");
	}

}