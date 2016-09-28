<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	private $auid;
	private $username;
	private $nama;

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('m_dashboard');
		$this->load->model('administrator/m_administrator');
		$this->load->model('login/m_login');

		$this->auid = $this->session->userdata('auid');
		$this->username = $this->session->userdata('username');
		$this->nama = $this->session->userdata('nama');
	}

	public function index(){
		if($this->auid == '2'){
			$data['title'] = 'Dashboard Petugas Tiket';
			$data['nama'] = $this->nama;
			$data['username'] = $this->username;
			$total = $this->m_administrator->get_totaltiket()->row_array()['total'];
			$sisa = $this->m_administrator->get_sisatiket()->row_array()['sisa'];
			$data['sudah'] = $total-$sisa;
			$data['sisa'] = $sisa;
			$data['total'] = $total;

			$this->load->view('dashboard',$data);

		} else if($this->auid == '1'){
			redirect();
		} else {
			redirect();
		}			
	}
	public function pemudik(){
		if($this->auid == '2'){
			$data['title'] = 'Daftar Pemudik';
			$data['nama'] = $this->nama;
			$data['username'] = $this->username;
			$data['data_pemudik'] = $this->m_dashboard->get_pemudik()->result();
			$this->load->view('pemudik',$data);
		} else if($this->auid == '1'){
			redirect();
		} else {
			redirect();
		}			
	}

	public function cetak($id=""){
		if($id){
			if($this->auid == '2'){
				$data['title'] = 'Cetak Tiket';
				$data['pemudik'] = $this->m_dashboard->get_pemudik_byid($id)->row_array();
				$this->load->view('cetak',$data);
			} else if($this->auid == '1'){
				redirect();
			} else {
				redirect();
			}
		} else {
			redirect();
		}			
	}

	public function tambahpemudik(){
		if($this->auid == '2'){
			$data['title'] = 'Tambah Pemudik';
			$data['nama'] = $this->nama;
			$data['username'] = $this->username;
			$data['jenis_transportasi'] = $this->m_administrator->get_semuajenistransportasi()->result();
			$data['route'] = $this->m_administrator->get_semuatempat()->result();
			$data['data_transportasi'] = $this->m_administrator->get_transportasi()->result();

			$this->load->view('tambah_pemudik',$data);

			$submit = $this->input->post('submit');

			if($submit){
				$nama = $this->input->post('nama');
				$jenis_kelamin = $this->input->post('jenis_kelamin');
				$pekerjaan = $this->input->post('pekerjaan');
				$asal = $this->input->post('asal');
				$tujuan = $this->input->post('tujuan');
				$transportasi = $this->input->post('transportasi');
				
				if($nama && $jenis_kelamin && $pekerjaan && $transportasi){
					$hasil = $this->m_dashboard->new_pemudik($nama, $jenis_kelamin, $pekerjaan, $asal, $tujuan, $transportasi);
					$this->m_dashboard->update_sisa($transportasi);
					if($hasil){
						redirect('dashboard/pemudik');

					}
				}

				
			}
		} else if($this->auid == '1'){
			redirect();
		} else {
			redirect();
		}			
	}

	public function gettransporttersedia(){
		$asal = $this->input->post('asal');
		$tujuan = $this->input->post('tujuan');
		$data['transportasi_tersedia'] = $this->m_dashboard->get_transportasi($asal, $tujuan)->result();

        $this->load->view('transporttersedia', $data);
    }

}