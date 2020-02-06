<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class C_Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_admin');
		$this->load->helper(array('url','form'));

	
	}

	public function index()
	{
		$id= $this->session->userdata('id_desa');
		$data['inbox']=$this->db->query("SELECT * FROM pesan WHERE status = '1' AND id_desa='$id'")->num_rows();
		
		$data['pesan']=$this->M_admin->getPesan()->result();
		$data['info']=$this->db->query("SELECT * FROM pesan WHERE status = '0'")->num_rows();
		$data['user']=$this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
		$kab=$this->uri->segment(3);
		$data['kabupaten']=$this->M_admin->getKab()->result();

		$data['jml_kec_inhil']= $this->M_admin->getJumKec($kab);
		$data['main_view']='admin/V_dashboard';
		$this->load->view('admin/index',$data);
	}

	public function kabupaten()
	{
		$data['info']=$this->db->query("SELECT * FROM pesan WHERE status = '0'")->num_rows();
		$data['kabupaten']=$this->M_admin->getKab()->result();
		$data['main_view']='admin/V_kabupaten';
		$this->load->view('admin/index',$data);
	}

	public function kecamatan()
	{
		$data['info']=$this->db->query("SELECT * FROM pesan WHERE status = '0'")->num_rows();
		$data['kabupaten']=$this->M_admin->getKab()->result();
		$data['kecamatan']=$this->M_admin->getKec()->result();
		$data['main_view']='admin/V_kecamatan';
		$this->load->view('admin/index', $data);
	}
	public function desa()
	{
		$data=array(
			
			'kab_selected'=>'',
			'kec_selected'=>''
		);
		$data['info']=$this->db->query("SELECT * FROM pesan WHERE status = '0'")->num_rows();
		$data['kabupaten']=$this->M_admin->getKab()->result();
		$data['kecamatan']=$this->M_admin->getKec()->result();
		$data['desa']=$this->M_admin->getDesa()->result();
		$data['main_view']='admin/V_desa';
		$this->load->view('admin/index', $data);
	}

	public function kelurahan()
	{
		$data=array(
			
			'kab_selected'=>'',
			'kec_selected'=>''
		);
		$data['info']=$this->db->query("SELECT * FROM pesan WHERE status = '0'")->num_rows();
		$data['kabupaten']=$this->M_admin->getKab()->result();
		$data['kecamatan']=$this->M_admin->getKec()->result();
		$data['kelurahan']=$this->M_admin->getKelurahan()->result();
		$data['main_view']='admin/V_kelurahan';
		$this->load->view('admin/index', $data);
	}



	public function tambah_kabupaten()
	{
		$this->form_validation->set_rules('kode', 'Kode Kabupaten', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama Kabupaten', 'required|trim');
		
		if ($this->form_validation->run() == FALSE) {
			$data['main_view']='admin/V_kabupaten';
			$this->load->view('admin/index',$data);
		} else {
			$data=[
				'kode_kab'=>htmlspecialchars($this->input->post('kode')),
				'nama_kab'=>htmlspecialchars($this->input->post('nama'))
			];

			$this->db->insert('kabupaten', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Ditambah!</div>');
				redirect('C_admin/kabupaten');
			 
		}

	}
	

	public function edit_kabupaten()
	{
		$this->form_validation->set_rules('kode', 'Kode Kabupaten', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama Kabupaten', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$data['main_view']='admin/V_kabupaten';
			$this->load->view('admin/index',$data);
		} else {
			$data=[
				
				$id 	=$this->input->post('id'),
				$kode=$this->input->post('kode'),
				$nama 	=htmlspecialchars($this->input->post('nama'))
			];
			
			$this->db->query("UPDATE kabupaten SET kode_kab='$kode',nama_kab='$nama' WHERE id_kab='$id'");
		
			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Diedit!</div>');
			redirect('C_admin/kabupaten');
		}
	}

	public function hapus_kabupaten()
	{
		$id=$this->input->post('id');

		$this->db->query("DELETE FROM kabupaten WHERE id_kab='$id'");
		$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Dihapus!</div>');
			redirect('C_admin/kabupaten');
	}

	public function tambah_kecamatan()
	{
		$this->form_validation->set_rules('kode_kec', 'Kode Kecamatan', 'trim|required');
		$this->form_validation->set_rules('kode_kab', 'Kode Kabupaten', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama Kecamatan', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['main_view']='admin/V_kecamatan';
			$this->load->view('admin/index', $data);
		} else {
			$data=[
				'kode_kec'=>$this->input->post('kode_kec'),
				'id_kab'=>$this->input->post('kode_kab'),
				'nama_kec'=>$this->input->post('nama')
			];

			$this->db->insert('kecamatan', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Ditambah!</div>');
				redirect('C_admin/kecamatan');
		}
	}

	public function edit_kecamatan()
	{
		$this->form_validation->set_rules('kode_kec', 'Kode Kecamatan', 'trim|required');
		// $this->form_validation->set_rules('kode_kab', 'Kode Kabupaten', 'trim|required');
		$this->form_validation->set_rules('nama_kec', 'Nama Kecamatan', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['main_view']='admin/V_kecamatan';
			$this->load->view('admin/index',$data);
		} else {
			$data=[
				$id=$this->input->post('id'),
				$kode_kec=$this->input->post('kode_kec'),
				$id_kab=$this->input->post('id_kab'),
				$nama_kec=$this->input->post('nama_kec')
			];
			
			$this->db->query("UPDATE kecamatan SET kode_kec='$kode_kec', id_kab='$id_kab', nama_kec='$nama_kec' WHERE id_kec='$id'");

			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Diedit!</div>');
			redirect('C_Admin/kecamatan');


		}
	}

	public function hapus_kecamatan()
	{
		$id=$this->input->post('id_kec');

		$this->db->query("DELETE FROM kecamatan WHERE id_kec='$id'");
		$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Dihapus!</div>');
			redirect('C_admin/kecamatan');
	}

	public function tambah_desa()
	{
			$this->form_validation->set_rules('id_kab', 'Nama Kabupaten', 'trim|required');
			$this->form_validation->set_rules('id_kec', 'Nama Kecamatan', 'trim|required');
			$this->form_validation->set_rules('kode_desa', 'Kode Desa', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama Desa', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['main_view']='admin/V_desa';
				$this->load->view('admin/index', $data);
			} else {
				$data=[
					'kode_desa'=>$this->input->post('kode_desa'),
					'id_kab'=>$this->input->post('id_kab'),
					'id_kec'=>$this->input->post('id_kec'),
					'nama_desa'=>$this->input->post('nama'),
					
				];

				$this->db->insert('desa', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Ditambah!</div>');
					redirect('C_admin/desa');

				
			}
	}

	public function tambah_kelurahan()
	{
			$this->form_validation->set_rules('id_kab', 'Nama Kabupaten', 'trim|required');
			$this->form_validation->set_rules('id_kec', 'Nama Kecamatan', 'trim|required');
			$this->form_validation->set_rules('kode_kelurahan', 'Kode Kelurahan', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama Kelurahan', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['main_view']='admin/V_kelurahan';
				$this->load->view('admin/index', $data);
			} else {
				$data=[
					'kode_kelurahan'=>$this->input->post('kode_kelurahan'),
					'id_kab'=>$this->input->post('id_kab'),
					'id_kec'=>$this->input->post('id_kec'),
					'nama_kelurahan'=>$this->input->post('nama'),
					
				];

				$this->db->insert('kelurahan', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Ditambah!</div>');
					redirect('C_admin/kelurahan');

				
			}
	}

	public function hapus_desa()
	{
		$id=$this->input->post('id_desa');

		$this->db->query("DELETE FROM desa WHERE id_desa='$id'");
		$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Dihapus!</div>');
			redirect('C_admin/desa');

	}

	public function hapus_kelurahan()
		{
			$id=$this->input->post('id_kel');

			$this->db->query("DELETE FROM kelurahan WHERE id_kel='$id'");
			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Dihapus!</div>');
				redirect('C_admin/kelurahan');

		}

		public function edit_kelurahan()
	{
		
		$this->form_validation->set_rules('kode_kelurahan', 'Kode Kelurahan', 'trim|required');
		$this->form_validation->set_rules('nama_kelurahan', 'Nama Kelurahan', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['main_view']='admin/V_kelurahan';
			$this->load->view('admin/index', $data);
		} else {
			$data=[
				$id_kel=$this->input->post('id_kel'),
				$kode_kelurahan=$this->input->post('kode_kelurahan'),
				$nama_kelurahan=$this->input->post('nama_kelurahan')
				
			];

			$this->db->query("UPDATE kelurahan SET kode_kelurahan='$kode_kelurahan', nama_kelurahan='$nama_kelurahan' WHERE id_kel='$id_kel'");
			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Diedit!</div>');
			redirect('C_admin/kelurahan');
		}

	}

	public function edit_desa()
	{
		
		$this->form_validation->set_rules('kode_desa', 'Kode Desa', 'trim|required');
		$this->form_validation->set_rules('nama_desa', 'Nama Desa', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['main_view']='admin/V_desa';
			$this->load->view('admin/index', $data);
		} else {
			$data=[
				$id_desa=$this->input->post('id_desa'),
				$kode_desa=$this->input->post('kode_desa'),
				$nama_desa=$this->input->post('nama_desa')
				
			];

			$this->db->query("UPDATE desa SET kode_desa='$kode_desa', nama_desa='$nama_desa' WHERE id_desa='$id_desa'");
			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Diedit!</div>');
			redirect('C_admin/desa');
		}

	}

	public function monitoring_kab($id)
	{
	
		//$data['jumlah']=$this->M_admin->getJumKec($id);
		$data['info']=$this->db->query("SELECT * FROM pesan WHERE status = '0'")->num_rows();
		$kab=$this->uri->segment(3);
		$data['kab']= $this->db->query("SELECT * FROM kabupaten WHERE id_kab='$kab'")->result();
		$data['monitoring_kab']=$this->M_admin->getDataKec($id)->result();
		$data['main_view']='admin/V_monitoring_kab';
		$this->load->view('admin/index',$data);
	}

	public function monitoring_kec($id)
	{
		$kab=$this->uri->segment(3);
		$data['info']=$this->db->query("SELECT * FROM pesan WHERE status = '0'")->num_rows();
		$data['kab']= $this->db->query("SELECT * FROM kabupaten INNER JOIN kecamatan ON kabupaten.id_kab=kecamatan.id_kab WHERE id_kec='$kab'")->result();
		$data['jumlah']=$this->M_admin->getJumDesa($id);
		$data['monitoring_desa']=$this->M_admin->getDataDesa($id)->result();
		$data['main_view']='admin/V_monitoring_desa';
		$this->load->view('admin/index',$data);
	}

	public function monitoring_kec1($id)
	{
		$kab=$this->uri->segment(3);
		$data['info']=$this->db->query("SELECT * FROM pesan WHERE status = '0'")->num_rows();
		$data['kab']= $this->db->query("SELECT * FROM kabupaten INNER JOIN kecamatan ON kabupaten.id_kab=kecamatan.id_kab WHERE id_kec='$kab'")->result();
		$data['jumlah']=$this->M_admin->getJumKelurahan($id);
		$data['monitoring_kelurahan']=$this->M_admin->getDataKelurahan($id)->result();
		$data['main_view']='admin/V_monitoring_kelurahan';
		$this->load->view('admin/index',$data);
	}

	public function monitoring_histori_kades()
	{
		$id=$this->uri->segment(3);
		$data['kab']=$this->db->query("SELECT * FROM desa  INNER JOIN kabupaten ON desa.id_kab=kabupaten.id_kab INNER JOIN kecamatan ON desa.id_kec=kecamatan.id_kec  WHERE id_desa='$id'")->result();
		$data['info']=$this->db->query("SELECT * FROM pesan WHERE status = '0'")->num_rows();
		$data['kades']=$this->db->query("SELECT * FROM history_aparatur WHERE id_desa='$id'")->result();
		$data['main_view']='admin/V_histori_kades';
		$this->load->view('admin/index', $data);
	}

	public function monitoring_histori_lurah()
	{
		$id=$this->uri->segment(3);
		$data['kab']=$this->db->query("SELECT * FROM kelurahan  INNER JOIN kabupaten ON kelurahan.id_kab=kabupaten.id_kab INNER JOIN kecamatan ON kelurahan.id_kec=kecamatan.id_kec  WHERE id_kel='$id'")->result();
		$data['info']=$this->db->query("SELECT * FROM pesan WHERE status = '0'")->num_rows();
		$data['lurah']=$this->db->query("SELECT * FROM history_aparatur WHERE id_kel='$id'")->result();
		$data['main_view']='admin/V_histori_lurah';
		$this->load->view('admin/index', $data);
	}

	public function monitoring_lihat_data_desa($id)
	{
		$kab=$this->uri->segment(3);
		$data['info']=$this->db->query("SELECT * FROM pesan WHERE status = '0'")->num_rows();
		$data['kab']=$this->db->query("SELECT * FROM desa  INNER JOIN kabupaten ON desa.id_kab=kabupaten.id_kab INNER JOIN kecamatan ON desa.id_kec=kecamatan.id_kec  WHERE id_desa='$id'")->result();
		$data['monitoring_desa']=$this->M_admin->getDataDetailDesa($id)->result();
		$data['main_view']='admin/V_detail_desa';
		$this->load->view('admin/index',$data);
	}

	public function monitoring_lihat_data_kelurahan($id)
	{
		$kab=$this->uri->segment(3);
		$data['info']=$this->db->query("SELECT * FROM pesan WHERE status = '0'")->num_rows();
		$data['kab']=$this->db->query("SELECT * FROM kelurahan  INNER JOIN kabupaten ON kelurahan.id_kab=kabupaten.id_kab INNER JOIN kecamatan ON kelurahan.id_kec=kecamatan.id_kec  WHERE id_kel='$id'")->result();
		$data['monitoring_kelurahan']=$this->M_admin->getDataDetailKelurahan($id)->result();
		$data['main_view']='admin/V_detail_kelurahan';
		$this->load->view('admin/index',$data);
	}

	public function manajemen_user()
	{
		$data['info']=$this->db->query("SELECT * FROM pesan WHERE status = '0'")->num_rows();
		$data['user']=$this->db->get('user')->result();
		$data['main_view']='admin/V_user';
		$this->load->view('admin/index', $data);
	}

	public function hapus_user()
	{
		$id=$this->input->post('id');

		$this->db->query("DELETE FROM user WHERE id='$id'");
		$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Dihapus!</div>');
			redirect('C_admin/manajemen_user');
	}

	public function pesann()
	{
		$id= $this->session->userdata('id_desa');
		$data['info']=$this->db->query("SELECT * FROM pesan WHERE status = '0'")->num_rows();
		$data['inbox']=$this->db->query("SELECT * FROM pesan WHERE status = '1' AND id_desa='$id'")->num_rows();
		$data['pesan']=$this->M_admin->getPesan()->result();
		$data['main_view']='admin/V_pesan';
		$this->load->view('admin/index', $data);
	}

	public function konfirmasi_pesan($id)
	{
		if($this->M_admin->konfirmasi($id)){
			redirect('C_admin/pesann');
		}else{
			exit('Data unknown!');
		}
	}

	public function balas_pesan()
	{
		$this->form_validation->set_rules('isi', 'Isi', 'trim|required');
		
		date_default_timezone_set('Asia/Jakarta');
		if ($this->form_validation->run() == FALSE) {
			$data['main_view']='admin/V_pesan';
			$this->load->view('admin/index', $data);
		} else {

			$data=[ 
				$id=$this->input->post('id'),
				$balas=$this->input->post('isi'),
				$tb=date('Y-m-d H:i:s'),
				
			];

			$this->db->query("UPDATE pesan SET balas='$balas', tanggal_balas='$tb' WHERE id='$id'");
			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Pesan Berhasil Dikirim!</div>');
			redirect('C_admin/pesann');
	}
}

	public function changePassword()
	{
		$data['info']=$this->db->query("SELECT * FROM pesan WHERE status = '0'")->num_rows();
		$data['main_view']='admin/V_changePassword';
		$this->load->view('admin/index',$data);
	}

	public function aksiChange(){
		$this->form_validation->set_rules('pl', 'Password Lama', 'trim|required');
		
				
		$this->form_validation->set_rules('pb', 'Password Baru', 'trim|required');

		if ($this->form_validation->run() == FALSE) {

				$data['title']='Ganti Password';
				$data['main_view']='admin/V_changePassword';
				$this->load->view('admin/index',$data);

			} else{
				$pl=$this->input->post('pl');
				$pb=$this->input->post('pb');

				$user = $this->db->get_where('user', ['password'=>$pl])->row_array();
				if ($user['password']==$pl) {
					$this->db->query("UPDATE user SET password='$pb' WHERE password='$pl' ");
					$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">password Berhasil Diedit!</div>');
					redirect('C_admin/changePassword');
				}
				else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Password Lama Salah!</div>');
					redirect('C_admin/changePassword');
				}
			}

	}

	public function tambahuser(){
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('hak_akses', 'Hak Akses', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['main_view']='admin/V_user';
				$this->load->view('admin/index', $data);
			} else {
				$data=[
					'username'=>$this->input->post('username'),
					'password'=>$this->input->post('password'),
					'role_id'=>$this->input->post('hak_akses'),
					
					
				];

				$this->db->insert('user', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Ditambah!</div>');
					redirect('C_admin/manajemen_user');

				
			}
	}
	public function edit_user(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('hak_akses', 'Hak Akses', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['main_view']='admin/V_user';
			$this->load->view('admin/index',$data);
		} else {
			$data=[
				$id=$this->input->post('id'),
				$un=$this->input->post('username'),
				$pass=$this->input->post('password'),
				$hak_akses=$this->input->post('hak_akses')
			];
			
			$this->db->query("UPDATE user SET username='$un', password='$pass', role_id='$hak_akses' WHERE id='$id'");

			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Diedit!</div>');
			redirect('C_Admin/manajemen_user');


		}
	}


}

/* End of file C_Admin.php */
/* Location: ./application/controllers/C_Admin.php */