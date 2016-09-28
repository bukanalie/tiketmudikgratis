<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {
	private $title;

	function __construct()
	{
		parent::__construct();
		$this->title = 'Login';
		$this->load->model('m_login');
		$this->load->library('encrypt');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');

		if($this->form_validation->run()){
			$user = $this->input->post('username');
			$pass = $this->input->post('password');
			$passencript = $this->encrypt->sha1($pass);

			$result = $this->m_login->login($user, $passencript);

			if($result){
				foreach($result as $row) {

	                $sess_array = array(
	                    'nama'=> $row->nama,
	                    'username' => $row->username,
	                    'auid' => $row->auid
	                );
		 
		            $this->session->set_userdata('nama', $row->nama);
		            $this->session->set_userdata('username', $row->username);
		            $this->session->set_userdata('auid', $row->auid);
		            redirect();
		        }
			} else {
				redirect();
			}
		} else {

			if($this->session->userdata('auid')){
				
				$type = $this->session->userdata('auid');

				if ($type == '1') {
					redirect('administrator');
				} else if ($type == '2') {
					redirect('dashboard');
				}
				
				
			} else {
				$data['title'] = $this->title;
				$this->load->view('login',$data);
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
	
}