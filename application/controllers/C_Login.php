<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_admin');
		$this->load->helper(array('url','form'));
	}

	public function index()
	{

		$data['title']='Login';
		$data['user']=$this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
		$this->load->view('login/index',$data);
	}
	

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
				$data['title']='Login';
				$this->load->view('login/index',$data);
			} else{
				$this->_login();
			}
	}

	public function _login()
		{
			$username = $this->input->post('username');
			$password=$this->input->post('password');

			$user = $this->db->get_where('user', ['username'=>$username])->row_array();
			

			if ($user['username'] == $username) {
				//jika ada
			
					//cek password
					if ($user['password'] == $password) {
						$data=[
						'username'=>$user['username'],
						'password'=>$user['password'],
						'role_id'=>$user['role_id'],
						'id_kab'=>$user['id_kab'],
						'id_desa'=>$user['id_desa'],
						'id_kec'=>$user['id_kec'],

						];
					    $this->session->set_userdata($data);

						if ($user['role_id']== '1') {
							redirect('C_Admin');
						}else if ($user['role_id']=='2') {
							redirect('C_Admin');
						}
						else{
							redirect('C_Admin');
						}
						
					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Password Salah!</div>');
				redirect('C_Login');
					}
				

			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Username Salah</div>');
				redirect('C_Login');
			}
		}

		public function logout()
		{
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('role_id');
			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">you have been logged out</div>');
			redirect('C_Login');
		}

		

}

/* End of file C_Login.php */
/* Location: ./application/controllers/C_Login.php */ ?>