<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends MY_Controller {

	private $auid;
	private $username;
	private $nama;

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('m_administrator');
		$this->load->model('login/m_login');

		$this->auid = $this->session->userdata('auid');
		$this->username = $this->session->userdata('username');
		$this->nama = $this->session->userdata('nama');
	}

	public function index(){
		if($this->auid == '1'){
			$data['title'] = 'Dashboard Administrator';
			$data['nama'] = $this->nama;
			$data['username'] = $this->username;
			$total = $this->m_administrator->get_totaltiket()->row_array()['total'];
			$sisa = $this->m_administrator->get_sisatiket()->row_array()['sisa'];
			$data['sudah'] = $total-$sisa;
			$data['sisa'] = $sisa;
			$data['total'] = $total;

			$this->load->view('administrator',$data);

		} else if($this->auid == '2'){
			redirect();
		} else {
			redirect();
		}			
	}
	public function transportasi(){
		if($this->auid == '1'){
			$data['title'] = 'Transportasi';
			$data['nama'] = $this->nama;
			$data['username'] = $this->username;
			$data['data_transportasi'] = $this->m_administrator->get_transportasi()->result();
			$this->load->view('transportasi',$data);
		} else if($this->auid == '2'){
			redirect();
		} else {
			redirect();
		}			
	}

	public function master(){
		if($this->auid == '1'){
			$data['title'] = 'Data Master';
			$data['nama'] = $this->nama;
			$data['username'] = $this->username;
			
			
			$data['tempat'] = $this->m_administrator->tempat()->result();
			$data['transportasi'] = $this->m_administrator->get_semuajenistransportasi()->result();
			$data['user'] = $this->m_administrator->get_user()->result();

			$this->load->view('master',$data);
		} else if($this->auid == '2'){
			redirect();
		} else {
			redirect();
		}			
	}

	public function submit_jenistransport(){
			$nama = $this->input->post('nama');
			if($nama){
				$this->m_administrator->new_jenistransport($nama);
			}
			redirect('/administrator/master');			
	}
	public function submit_tempat(){
			$nama = $this->input->post('nama');
			$jenis = $this->input->post('jenis');
			if($nama){
				$this->m_administrator->new_tempat($nama, $jenis);
			}
			redirect('/administrator/master');			
	}

	public function tambahtransportasi(){
		if($this->auid == '1'){
			$data['title'] = 'Tambah Transportasi';
			$data['nama'] = $this->nama;
			$data['username'] = $this->username;
			$data['jenis_transportasi'] = $this->m_administrator->get_semuajenistransportasi()->result();
			$data['route'] = $this->m_administrator->get_semuatempat()->result();

			$this->load->view('tambah_transportasi',$data);

			$submit = $this->input->post('submit');

			if($submit){
				$nama = $this->input->post('nama');
				$jenis = $this->input->post('jenis');
				$jumlah = $this->input->post('jumlah');
				$asal = $this->input->post('asal');
				$tujuan = $this->input->post('tujuan');
				$tanggal = $this->input->post('tanggal');
				$waktu = $this->input->post('waktu');

				$route = $this->input->post('route');

					$route_data = "";

				if ($route) {
					foreach ($route as $key)
						{
						    $route_data = $key . ", " .$route_data;
						}

				}
				
				if($nama && $jenis && $jumlah && $tanggal && $waktu && $route){
					$hasil = $this->m_administrator->new_transportasi($nama, $jenis, $jumlah, $asal, $tujuan, $tanggal, $waktu, $route_data);
					redirect('administrator/transportasi');
				}

				
			}
		} else if($this->auid == '2'){
			redirect();
		} else {
			redirect();
		}			
	}



}