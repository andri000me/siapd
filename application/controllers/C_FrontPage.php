
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_FrontPage extends CI_Controller {
public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_admin');
		$this->load->helper(array('url','form'));
		
	}

	public function index()
	{
		$data['content']='admin/V_beranda';
		$this->load->view('V_FrontPage',$data);
	}

	public function data()
		{
		$kab=$this->uri->segment(3);
		$data['kabupaten']=$this->M_admin->getKab()->result();
		$data['jml_kec_inhil']= $this->M_admin->getJumKec($kab);
		$data['content']='admin/V_data_desa';
		$this->load->view('V_FrontPage',$data);
		}

	public function monitoring_kab($id)
	{
	
		
		$kab=$this->uri->segment(3);
		$data['kab']= $this->db->query("SELECT * FROM kabupaten WHERE id_kab='$kab'")->result();
		$data['monitoring_kab']=$this->M_admin->getDataKec($id)->result();
		$data['content']='admin/V_monitoring_kab_beranda';
		$this->load->view('V_FrontPage',$data);
	}

	public function monitoring_kec1($id)
	{
		$kab=$this->uri->segment(3);
		$data['kab']= $this->db->query("SELECT * FROM kabupaten INNER JOIN kecamatan ON kabupaten.id_kab=kecamatan.id_kab WHERE id_kec='$kab'")->result();
		$data['jumlah']=$this->M_admin->getJumKelurahan($id);
		$data['monitoring_kelurahan']=$this->M_admin->getDataKelurahan($id)->result();
		$data['content']='admin/V_monitoring_kelurahan_beranda';
		$this->load->view('V_FrontPage',$data);
	}


	public function monitoring_kec($id)
	{
		$kab=$this->uri->segment(3);
		$data['kab']= $this->db->query("SELECT * FROM kabupaten INNER JOIN kecamatan ON kabupaten.id_kab=kecamatan.id_kab WHERE id_kec='$kab'")->result();
		$data['jumlah']=$this->M_admin->getJumDesa($id);
		$data['monitoring_desa']=$this->M_admin->getDataDesa($id)->result();
		$data['content']='admin/V_monitoring_desa_beranda';
		$this->load->view('V_FrontPage',$data);
	}

	public function monitoring_lihat_data_kelurahan($id)
	{
		$kab=$this->uri->segment(3);
		$data['info']=$this->db->query("SELECT * FROM pesan WHERE status = '0'")->num_rows();
		$data['kab']=$this->db->query("SELECT * FROM kelurahan  INNER JOIN kabupaten ON kelurahan.id_kab=kabupaten.id_kab INNER JOIN kecamatan ON kelurahan.id_kec=kecamatan.id_kec  WHERE id_kel='$id'")->result();
		$data['monitoring_kelurahan']=$this->M_admin->getDataDetailKelurahan($id)->result();
		$data['content']='admin/V_detail_kelurahan';
		$this->load->view('V_FrontPage',$data);
	}

	public function monitoring_histori_lurah()
	{
		$id=$this->uri->segment(3);
		$data['kab']=$this->db->query("SELECT * FROM kelurahan  INNER JOIN kabupaten ON kelurahan.id_kab=kabupaten.id_kab INNER JOIN kecamatan ON kelurahan.id_kec=kecamatan.id_kec  WHERE id_kel='$id'")->result();
		$data['info']=$this->db->query("SELECT * FROM pesan WHERE status = '0'")->num_rows();
		$data['lurah']=$this->db->query("SELECT * FROM history_aparatur WHERE id_kel='$id'")->result();
		$data['content']='admin/V_histori_lurah';
		$this->load->view('V_FrontPage', $data);
	}

	public function monitoring_lihat_data_desa($id)
	{
		$kab=$this->uri->segment(3);
		$data['info']=$this->db->query("SELECT * FROM pesan WHERE status = '0'")->num_rows();
		$data['kab']=$this->db->query("SELECT * FROM desa  INNER JOIN kabupaten ON desa.id_kab=kabupaten.id_kab INNER JOIN kecamatan ON desa.id_kec=kecamatan.id_kec  WHERE id_desa='$id'")->result();
		$data['monitoring_desa']=$this->M_admin->getDataDetailDesa($id)->result();
		$data['content']='admin/V_detail_desa';
		$this->load->view('V_FrontPage',$data);
	}

	public function monitoring_histori_kades()
	{
		$id=$this->uri->segment(3);
		$data['kab']=$this->db->query("SELECT * FROM desa  INNER JOIN kabupaten ON desa.id_kab=kabupaten.id_kab INNER JOIN kecamatan ON desa.id_kec=kecamatan.id_kec  WHERE id_desa='$id'")->result();
		$data['info']=$this->db->query("SELECT * FROM pesan WHERE status = '0'")->num_rows();
		$data['kades']=$this->db->query("SELECT * FROM history_aparatur WHERE id_desa='$id'")->result();
		$data['content']='admin/V_histori_kades';
		$this->load->view('V_FrontPage', $data);
	}


}
