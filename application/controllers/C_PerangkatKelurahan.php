<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_PerangkatKelurahan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('form_validation','pdf'));
		$this->load->model(array('M_admin','M_perangkat'));
	}

	public function index()
	{
		
		// $data['perangkat']=$this->db->where('id_desa', $this->session->userdata('id_desa'));
		$data['perangkat']=$this->db->where('id_kel', $this->session->userdata('id_desa'));
		$data['perangkat']=$this->db->get('perangkat_desa')->result();
		$data['main_view']='kelurahan/index';
		$this->load->view('admin/index', $data);
	}

	public function inbox()
	{
		$id=$this->session->userdata('username'); 	
		$data['pesan']=$this->M_perangkat->getPesan($id)->result();
		$data['main_view']='desa/V_inbox';
		$this->load->view('admin/index', $data);	
	}

	public function tambah_data()
	{
		$id=$this->session->userdata('id_desa'); 
		$data['perangkat']=$this->M_perangkat->getKab($id)->result();
		$data['main_view']='kelurahan/V_tambah_data';
		$this->load->view('admin/index',$data);

	}

	public function tambah_perangkat()
	{
		$id=$this->session->userdata('id_desa'); 
		$jb=$this->input->post('jabatan');
		$data['perangkat']=$this->M_perangkat->getKab($id)->result();

		$user=$this->db->query("SELECT * FROM perangkat_desa WHERE id_desa='$id'")->row_Array();

		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('nip', 'NIP', 'required|trim');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('pd', 'Pendidikan', 'required|trim');
		$this->form_validation->set_rules('tpt_lahir', 'Tempat Lahir', 'required|trim');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('no_hp', 'No HP', 'required|trim');

		if ($this->form_validation->run() ==  FALSE ) {
			$data['main_view']='kelurahan/V_tambah_data';
			$this->load->view('admin/index',$data);

		}elseif ($user['jabatan']==$jb) {
			
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Maaf. Data Telah Ada, Mohon Cek Kembali!</div>');
			redirect('C_PerangkatKelurahan/tambah_data');

		} else {
			
				$data=[
				'jabatan'=>htmlspecialchars($this->input->post('jabatan')),
				'nip'=>htmlspecialchars($this->input->post('nip')),
				'nama'=>htmlspecialchars($this->input->post('nama')),
				'pendidikan'=>htmlspecialchars($this->input->post('pd')),
				'tanggal_pelantikan'=>htmlspecialchars($this->input->post('awal_jabatan')),
				'masa_akhir_jabatan'=>htmlspecialchars($this->input->post('akhir_jabatan')),
				'tempat_lahir'=>htmlspecialchars($this->input->post('tpt_lahir')),
				'tanggal_lahir'=>htmlspecialchars($this->input->post('tgl_lahir')),
				'jk'=>htmlspecialchars($this->input->post('jk')),
				'no_hp'=>htmlspecialchars($this->input->post('no_hp')),
				'id_kab'=>$this->session->userdata('id_kab'),
				'id_kec'=>$this->session->userdata('id_kec'),
				'id_desa'=>'',
				'id_kel'=>$this->session->userdata('id_desa'),
			];

			$this->db->insert('perangkat_desa', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Ditambah!</div>');
				redirect('C_PerangkatKelurahan');
			}
		}
	

	public function edit_perangkat()
	{
		$uri=$this->uri->segment(3);
		$data['perangkat']=$this->db->where('id',$uri);
		$data['perangkat']=$this->db->get('perangkat_desa')->result();
		$data['main_view']='kelurahan/V_edit_perangkat';
		$this->load->view('admin/index', $data);

		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('nip', 'NIP', 'required|trim');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('pd', 'Pendidikan', 'required|trim');
		$this->form_validation->set_rules('tpt_lahir', 'Tempat Lahir', 'required|trim');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
		// $this->form_validation->set_rules('awal_jabatan', 'Awal Jabatan', 'required|trim');
		// $this->form_validation->set_rules('akhir_jabatan', 'Akhir Jabatan', 'required|trim');
		$this->form_validation->set_rules('no_hp', 'No HP', 'required|trim');

		if ($this->form_validation->run() ==  FALSE) {
			$data['perangkat']=$this->db->get('perangkat_desa')->result();
			$data['main_view']='kelurahan/V_edit_perangkat';
		} else {
			$id=$this->db->where('id', $this->input->post('id'));
			$data=[
				// 'id'=>htmlspecialchars($this->input->post('id')),
				'jabatan'=>htmlspecialchars($this->input->post('jabatan')),
				'nip'=>htmlspecialchars($this->input->post('nip')),
				'nama'=>htmlspecialchars($this->input->post('nama')),
				'pendidikan'=>htmlspecialchars($this->input->post('pd')),
				'tanggal_pelantikan'=>htmlspecialchars($this->input->post('awal_jabatan')),
				'masa_akhir_jabatan'=>htmlspecialchars($this->input->post('akhir_jabatan')),
				'tempat_lahir'=>htmlspecialchars($this->input->post('tpt_lahir')),
				'tanggal_lahir'=>htmlspecialchars($this->input->post('tgl_lahir')),
				'jk'=>htmlspecialchars($this->input->post('jk')),
				'no_hp'=>htmlspecialchars($this->input->post('no_hp')),
			];

			$this->db->update('perangkat_desa', $data, $id);
			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Diedit!</div>');
				redirect('C_PerangkatKelurahan');
		}

	}

	public function hapus_perangkat()
	{
		$id= $this->db->where('id', $this->input->post('id'));
		$this->db->delete('perangkat_desa', $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Data Berhasil Dihapus!</div>');
				redirect('C_PerangkatKelurahan');
	}

	public function cetak_data()
	{

		$id=$this->session->userdata('id_desa');
		$query=$this->db->query("SELECT * FROM kelurahan  INNER JOIN kabupaten ON kelurahan.id_kab=kabupaten.id_kab INNER JOIN kecamatan ON kelurahan.id_kec=kecamatan.id_kec  WHERE id_kel='$id'")->row_array();
		$pdf = new FPDF("L", "cm", array('21','30'));
        $pdf->SetMargins(1, 1, 1);
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 14);
        // $pdf->Image('assets/img/comp.jpg',1.5,0.7,2,2);
        $pdf->SetX(8);
        $pdf->MultiCell(14,0.5,'PEMERINTAH PROVINSI RIAU',0,'C');
         $pdf->SetFont('Times', 'B', 12);
        $pdf->SetX(8);
        $pdf->MultiCell(14,0.5,'DINAS PERMBERDAYAAN MASYARAKAT DAN DESA ',0,'C');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetX(8);
        $pdf->MultiCell(14,0.5,'Jalan H.R Soebrantas Km. 10 Tel.0761-62705 fax. 65839' ,0,'C');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetX(8);
        $pdf->MultiCell(14,0.5,'Website: dpmd.riau.go.id Email: sekretariatdpmd.riau.go.id' ,0,'C');
        
        $pdf->Line(1, 3.1, 29, 3.1);
        $pdf->SetLineWidth(0.1,1);
        $pdf->Line(1, 3.2, 29, 3.2);
        $pdf->SetLineWidth(0);
        $pdf->ln(1);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetX(8);
        $pdf->MultiCell(14, 0.5, "Data Aparatur Kelurahan ".$query['nama_kelurahan'], 0, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->ln(1);
        $pdf->MultiCell(14, 0.5, "Kabupaten  : ".$query['nama_kab'], 0, 'L');
        $pdf->MultiCell(14, 0.5, "Kecamatan : ".$query['nama_kec'], 0, 'L');
        $pdf->MultiCell(14, 0.5, "Kelurahan   : ".$query['nama_kelurahan'], 0, 'L');
        
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->ln(1);
        $pdf->SetFont('Arial', 'B', 10);
        
        $pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
        $pdf->Cell(5, 0.8, 'Nama', 1, 0, 'C');
        $pdf->Cell(3, 0.8, 'NIP', 1, 0, 'C');
        $pdf->Cell(3, 0.8, 'Jabatan', 1, 0, 'C');
        $pdf->Cell(1, 0.8, 'JK', 1, 0, 'C');
        $pdf->Cell(3, 0.8, 'Pendidikan', 1, 0, 'C');
        $pdf->Cell(4, 0.8, 'TTL', 1, 0, 'C');
        $pdf->Cell(5, 0.8, 'Masa Jabatan', 1, 0, 'C');
        $pdf->Cell(3, 0.8, 'NO HP', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 9);
        $no = 1;
      
      	//$data['desa']=$this->M_admin->getDesa()->result();
      	$ket=$this->session->userdata('id_desa');
      	$lurah=$this->db->query("SELECT nama from perangkat_desa  WHERE id_desa='$ket'")->result();
        $data=$this->db->query("SELECT * from perangkat_desa  WHERE id_desa='$id'")->result();
        foreach ($data as $j) {

            $pdf->Cell(1, 0.8, $no, 1, 0, 'C');
            $pdf->Cell(5, 0.8,strtoupper($j->nama), 1, 0, 'C');
            $pdf->Cell(3, 0.8, $j->nip, 1, 0, 'C');
            $pdf->Cell(3, 0.8, $j->jabatan, 1, 0, 'C');
            $pdf->Cell(1, 0.8, $j->jk, 1, 0, 'C');
            $pdf->Cell(3, 0.8, $j->pendidikan, 1, 0, 'C');
            $pdf->Cell(4, 0.8, $j->tempat_lahir.', '.$j->tanggal_lahir, 1, 0, 'C');
            $pdf->Cell(5, 0.8, $j->tanggal_pelantikan.' s/d '.$j->masa_akhir_jabatan, 1, 0, 'C');
            $pdf->Cell(3, 0.8,$j->no_hp,  1, 1, 'C');
            
            $no++;
        }
        $name= $this->db->get_where('user')->row_Array();

        $pdf->ln(1);
        //$pdf->Cell(25, 0.8, 'Mengetahui', 0, 0, 'R');
       // $pdf->Cell(1, 0.8, '', 0, 0, 'C');
 
         $pdf->ln(1.5);
         //$pdf->Cell(25, 0.8, 0, 1, 'R');
      
         //$pdf->Cell(1, 0.8, 'dfd', 0, 0, 'C');

        $pdf->Output("Data Aparatur.pdf","I");
	}

	public function daftar_lurah()
	{
		$id=$this->session->userdata('id_desa');
		$data['lurah']=$this->db->query("SELECT * FROM history_aparatur WHERE id_desa='$id'")->result();
		$data['main_view']='kelurahan/V_daftar_lurah';
		$this->load->view('admin/index', $data);
	}

	public function send()
	{
		$data['send']=$this->db->where('id_kel',$this->session->userdata('id_desa'));
		$data['send']=$this->db->get('pesan')->result();
		$data['main_view']='desa/V_send';
		$this->load->view('admin/index', $data);
	}

	public function tambah_pesan()
	{
		$data['main_view']='desa/V_tambah_send';
		$this->load->view('admin/index', $data);

	}

	public function aksi_send()
	{
		$this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');
		$this->form_validation->set_rules('isi', 'Isi', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['main_view']='desa/V_send';
			$this->load->view('admin/index', $data);
		} else {
			date_default_timezone_set('Asia/Jakarta');
			$data=[
				'perihal'=>$this->input->post('perihal'),
				'isi'=>$this->input->post('isi'),
				'file'=>$this->M_perangkat->_upload(),
				'id_desa'=>$this->session->userdata('id_desa'),
				'id_kec'=>$this->session->userdata('id_kec'),
				'id_kab'=>$this->session->userdata('id_kab'),
				'tanggal'=>date('Y-m-d H:i:s'),
			];

			$this->db->insert('pesan', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Pesan Berhasil Dikirim!</div>');
				redirect('C_PerangkatDesa/send');

		}
	}



}

/* End of file C_PerangkatDesa.php */
/* Location: ./application/controllers/C_PerangkatDesa.php */