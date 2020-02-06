
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Cetak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
		$this->load->helper(array('url','form'));
		$this->load->model('M_admin');
	}

	public function index()
	{
		$data=array(
			
			'kab_selected'=>'',
			'kec_selected'=>'',
            'kel_selected'=>'',
            'desa_selected'=>'',
            

		);
       

        $data['info']=$this->db->query("SELECT * FROM pesan WHERE status = '0'")->num_rows();
		$data['kabupaten']=$this->M_admin->getKab()->result();
		$data['kecamatan']=$this->M_admin->getKec()->result();
        $data['desa']=$this->M_admin->getKelurahan()->result();
        $data['kelurahan']=$this->M_admin->getKelurahan()->result();
		$data['main_view']='admin/V_cetak';
		$this->load->view('admin/index', $data);
	}


    // function fetch_kecamatan()
    // {
    //     if ($this->input->post('id_kab')) {
    //         echo $this->M_admin->fetch_kabupaten($this->input->post('id_kab'));
    //     }
    // }

    // function fetch_kelurahan()
    // {
    //     if ($this->input->post('id_kec')) {
    //         echo $this->M_admin->fetch_kecamatan($this->input->post('id_kec'));
    //     }
    // }

	

    public function perkabupaten()
    {
        

        $id_kab=$this->input->post('id_kab');
        $opsi =$this->input->post('opsi');
        $jabatan=$this->input->post('jabatan');

        //$id_kec=$this->input->post('id_kec');
        //$id_desa=$this->input->post('id_desa');
        //$query=$this->db->query("SELECT * FROM desa  INNER JOIN kabupaten ON desa.id_kab=kabupaten.id_kab INNER JOIN kecamatan ON desa.id_kec=kecamatan.id_kec  WHERE id_desa='$id_desa'")->row_array();
        $query=$this->db->query("SELECT * FROM kabupaten WHERE id_kab='$id_kab'")->row_array();
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

        if ($opsi == 'kelurahan') {
            $pdf->MultiCell(14, 0.5, "Data Aparatur Kelurahan ", 0, 'C');
        }else{
            $pdf->MultiCell(14, 0.5, "Data Aparatur Desa ", 0, 'C');
        }
        $pdf->ln(0.3);
        $pdf->MultiCell(28, 0.5, $query['nama_kab'], 0, 'C');
        // $pdf->SetFont('Arial', 'B', 12);
        // $pdf->ln(1);
        // $pdf->MultiCell(14, 0.5, $query['nama_kab'], 0, 'L');
        // $pdf->MultiCell(14, 0.5, "Kecamatan : ".$query['nama_kec'], 0, 'L');
        // $pdf->MultiCell(14, 0.5, "Kel/Desa     : ".$query['nama_desa'], 0, 'L');
        
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

        if ($opsi == 'kelurahan') {

            $data=$this->db->query("SELECT * from perangkat_desa WHERE id_kab='$id_kab' AND id_kel!=0 AND jabatan='$jabatan'")->result();
        foreach ($data as $j) {

            $pdf->Cell(1, 0.8, $no, 1, 0, 'C');
            $pdf->Cell(5, 0.8, $j->nama, 1, 0, 'C');
            $pdf->Cell(3, 0.8, $j->nip, 1, 0, 'C');
            $pdf->Cell(3, 0.8, $j->jabatan, 1, 0, 'C');
            $pdf->Cell(1, 0.8, $j->jk, 1, 0, 'C');
            $pdf->Cell(3, 0.8, $j->pendidikan, 1, 0, 'C');
            $pdf->Cell(4, 0.8, $j->tempat_lahir.', '.$j->tanggal_lahir, 1, 0, 'C');
            $pdf->Cell(5, 0.8, $j->tanggal_pelantikan.' s/d '.$j->masa_akhir_jabatan, 1, 0, 'C');
            $pdf->Cell(3, 0.8,$j->no_hp,  1, 1, 'C');
            
            $no++;
        }
        }else{
           $data=$this->db->query("SELECT * from perangkat_desa WHERE id_kab='$id_kab' AND id_desa!=0 AND jabatan='$jabatan'")->result();
        foreach ($data as $j) {

            $pdf->Cell(1, 0.8, $no, 1, 0, 'C');
            $pdf->Cell(5, 0.8, $j->nama, 1, 0, 'C');
            $pdf->Cell(3, 0.8, $j->nip, 1, 0, 'C');
            $pdf->Cell(3, 0.8, $j->jabatan, 1, 0, 'C');
            $pdf->Cell(1, 0.8, $j->jk, 1, 0, 'C');
            $pdf->Cell(3, 0.8, $j->pendidikan, 1, 0, 'C');
            $pdf->Cell(4, 0.8, $j->tempat_lahir.', '.$j->tanggal_lahir, 1, 0, 'C');
            $pdf->Cell(5, 0.8, $j->tanggal_pelantikan.' s/d '.$j->masa_akhir_jabatan, 1, 0, 'C');
            $pdf->Cell(3, 0.8,$j->no_hp,  1, 1, 'C');
            
            $no++;
        }}
        $name= $this->db->get_where('user')->row_Array();

        $pdf->ln(1);
        $pdf->Cell(25, 0.8, 'Mengetahui', 0, 0, 'R');
        $pdf->Cell(1, 0.8, '', 0, 0, 'C');
 
         $pdf->ln(1.5);
         $pdf->Cell(25, 0.8,$this->session->userdata('username'), 0, 1, 'R');
      
         $pdf->Cell(1, 0.8, '', 0, 0, 'C');

        $pdf->Output("Data Aparatur.pdf","I");

    }

    public function perkecamatan()
    {
        

        $id_kab=$this->input->post('id_kab');
        $id_kec=$this->input->post('id_kec');
        $opsi =$this->input->post('opsi');
        $jabatan=$this->input->post('jabatan');

        //$id_kec=$this->input->post('id_kec');
        //$id_desa=$this->input->post('id_desa');
        $query1=$this->db->query("SELECT * FROM kecamatan  INNER JOIN kabupaten ON kecamatan.id_kab=kabupaten.id_kab   WHERE id_kec='$id_kec'")->row_array();
        $query=$this->db->query("SELECT * FROM kabupaten WHERE id_kab='$id_kab'")->row_array();
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

        if ($opsi == 'kelurahan') {
            $pdf->MultiCell(14, 0.5, "Data Aparatur Kelurahan ", 0, 'C');
        }else{
            $pdf->MultiCell(14, 0.5, "Data Aparatur Desa ", 0, 'C');
        }
        $pdf->MultiCell(28, 0.5, "Kecamatan ".$query1['nama_kec'], 0, 'C');
        $pdf->ln(0.3);
        $pdf->MultiCell(28, 0.5, $query['nama_kab'], 0, 'C');
        // $pdf->SetFont('Arial', 'B', 12);
        // $pdf->ln(1);
        // $pdf->MultiCell(14, 0.5, $query['nama_kab'], 0, 'L');
        // $pdf->MultiCell(14, 0.5, "Kecamatan : ".$query['nama_kec'], 0, 'L');
        // $pdf->MultiCell(14, 0.5, "Kel/Desa     : ".$query['nama_desa'], 0, 'L');
        
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

        if ($opsi == 'kelurahan') {

            $data=$this->db->query("SELECT * from perangkat_desa WHERE id_kab='$id_kab' AND id_kec='$id_kec' AND id_kel!=0 AND jabatan='$jabatan'")->result();
        foreach ($data as $j) {

            $pdf->Cell(1, 0.8, $no, 1, 0, 'C');
            $pdf->Cell(5, 0.8, $j->nama, 1, 0, 'C');
            $pdf->Cell(3, 0.8, $j->nip, 1, 0, 'C');
            $pdf->Cell(3, 0.8, $j->jabatan, 1, 0, 'C');
            $pdf->Cell(1, 0.8, $j->jk, 1, 0, 'C');
            $pdf->Cell(3, 0.8, $j->pendidikan, 1, 0, 'C');
            $pdf->Cell(4, 0.8, $j->tempat_lahir.', '.$j->tanggal_lahir, 1, 0, 'C');
            $pdf->Cell(5, 0.8, $j->tanggal_pelantikan.' s/d '.$j->masa_akhir_jabatan, 1, 0, 'C');
            $pdf->Cell(3, 0.8,$j->no_hp,  1, 1, 'C');
            
            $no++;
        }
        }else{
            $data=$this->db->query("SELECT * from perangkat_desa WHERE id_kab='$id_kab' AND id_kec='$id_kec' AND id_desa!=0 AND jabatan='$jabatan'")->result();
        foreach ($data as $j) {

            $pdf->Cell(1, 0.8, $no, 1, 0, 'C');
            $pdf->Cell(5, 0.8, $j->nama, 1, 0, 'C');
            $pdf->Cell(3, 0.8, $j->nip, 1, 0, 'C');
            $pdf->Cell(3, 0.8, $j->jabatan, 1, 0, 'C');
            $pdf->Cell(1, 0.8, $j->jk, 1, 0, 'C');
            $pdf->Cell(3, 0.8, $j->pendidikan, 1, 0, 'C');
            $pdf->Cell(4, 0.8, $j->tempat_lahir.', '.$j->tanggal_lahir, 1, 0, 'C');
            $pdf->Cell(5, 0.8, $j->tanggal_pelantikan.' s/d '.$j->masa_akhir_jabatan, 1, 0, 'C');
            $pdf->Cell(3, 0.8,$j->no_hp,  1, 1, 'C');
            
            $no++;
        }}
        $name= $this->db->get_where('user')->row_Array();

        $pdf->ln(1);
        $pdf->Cell(25, 0.8, 'Mengetahui', 0, 0, 'R');
        $pdf->Cell(1, 0.8, '', 0, 0, 'C');
 
         $pdf->ln(1.5);
         $pdf->Cell(25, 0.8,$this->session->userdata('username'), 0, 1, 'R');
      
         $pdf->Cell(1, 0.8, '', 0, 0, 'C');

        $pdf->Output("Data Aparatur.pdf","I");

    }

    public function perkelurahan()
    {
        $id_kab=$this->input->post('id_kab');
        $id_kec=$this->input->post('id_kec');
        $id_kel=$this->input->post('id_kel');
        // $opsi =$this->input->post('opsi');
        // $jabatan=$this->input->post('jabatan');

        //$id_kec=$this->input->post('id_kec');
        //$id_desa=$this->input->post('id_desa');
        $query=$this->db->query("SELECT * FROM kelurahan  INNER JOIN kabupaten ON kelurahan.id_kab=kabupaten.id_kab INNER JOIN kecamatan ON kelurahan.id_kec=kecamatan.id_kec  WHERE id_kel='$id_kel'")->row_array();
        //$query=$this->db->query("SELECT * FROM kabupaten WHERE id_kab='$id_kab'")->row_array();
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

        $pdf->MultiCell(14, 0.5, "Data Aparatur Kelurahan ".$query['nama_kelurahan'] , 0, 'C');

      
        $pdf->ln(0.3);
        $pdf->MultiCell(28, 0.5, $query['nama_kab'], 0, 'C');
        // $pdf->SetFont('Arial', 'B', 12);
        // $pdf->ln(1);
        // $pdf->MultiCell(14, 0.5, $query['nama_kab'], 0, 'L');
        // $pdf->MultiCell(14, 0.5, "Kecamatan : ".$query['nama_kec'], 0, 'L');
        // $pdf->MultiCell(14, 0.5, "Kel/Desa     : ".$query['nama_desa'], 0, 'L');
        
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

         $data=$this->db->query("SELECT * from perangkat_desa WHERE id_kab='$id_kab' AND id_kec='$id_kec' AND id_kel='$id_kel'")->result();
        foreach ($data as $j) {

            $pdf->Cell(1, 0.8, $no, 1, 0, 'C');
            $pdf->Cell(5, 0.8, $j->nama, 1, 0, 'C');
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
        $pdf->Cell(25, 0.8, 'Mengetahui', 0, 0, 'R');
        $pdf->Cell(1, 0.8, '', 0, 0, 'C');
 
         $pdf->ln(1.5);
         $pdf->Cell(25, 0.8,$this->session->userdata('username'), 0, 1, 'R');
      
         $pdf->Cell(1, 0.8, '', 0, 0, 'C');

        $pdf->Output("Data Aparatur.pdf","I");

    }

    public function perdesa()
    {
        $id_kab=$this->input->post('id_kab');
        $id_kec=$this->input->post('id_kec');
        $id_desa=$this->input->post('id_desa');
        // $opsi =$this->input->post('opsi');
        // $jabatan=$this->input->post('jabatan');

        //$id_kec=$this->input->post('id_kec');
        //$id_desa=$this->input->post('id_desa');
        $query=$this->db->query("SELECT * FROM desa  INNER JOIN kabupaten ON desa.id_kab=kabupaten.id_kab INNER JOIN kecamatan ON desa.id_kec=kecamatan.id_kec  WHERE id_desa='$id_desa'")->row_array();
        //$query=$this->db->query("SELECT * FROM kabupaten WHERE id_kab='$id_kab'")->row_array();
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

        $pdf->MultiCell(14, 0.5, "Data Aparatur Desa ".$query['nama_desa'] , 0, 'C');

      
        $pdf->ln(0.3);
        $pdf->MultiCell(28, 0.5, $query['nama_kab'], 0, 'C');
        // $pdf->SetFont('Arial', 'B', 12);
        // $pdf->ln(1);
        // $pdf->MultiCell(14, 0.5, $query['nama_kab'], 0, 'L');
        // $pdf->MultiCell(14, 0.5, "Kecamatan : ".$query['nama_kec'], 0, 'L');
        // $pdf->MultiCell(14, 0.5, "Kel/Desa     : ".$query['nama_desa'], 0, 'L');
        
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

         $data=$this->db->query("SELECT * from perangkat_desa WHERE id_kab='$id_kab' AND id_kec='$id_kec' AND id_desa='$id_desa'")->result();
        foreach ($data as $j) {

            $pdf->Cell(1, 0.8, $no, 1, 0, 'C');
            $pdf->Cell(5, 0.8, $j->nama, 1, 0, 'C');
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
        $pdf->Cell(25, 0.8, 'Mengetahui', 0, 0, 'R');
        $pdf->Cell(1, 0.8, '', 0, 0, 'C');
 
         $pdf->ln(1.5);
         $pdf->Cell(25, 0.8,$this->session->userdata('username'), 0, 1, 'R');
      
         $pdf->Cell(1, 0.8, '', 0, 0, 'C');

        $pdf->Output("Data Aparatur.pdf","I");

    }



    public function cetak_data_aparatur_desa()
    {

        $data=array(
            
            'kab_selected'=>'',
            'kec_selected'=>'',
            'kel_selected'=>'',
            'desa_selected'=>'',
            

            );

        // $data['kabupatenn']=$this->M_admin->fetch_kabupaten();


        $data['info']=$this->db->query("SELECT * FROM pesan WHERE status = '0'")->num_rows();
        $data['kabupaten']=$this->M_admin->getKab()->result();
        $data['kecamatan']=$this->M_admin->getKec()->result();
       
        $data['desa']=$this->M_admin->getDesa()->result();
        $data['kelurahan']=$this->M_admin->getKelurahan()->result();
        
        $data['main_view']='admin/V_cetak_data_desa';
        $this->load->view('admin/index', $data);
    }

    // public function getDataAparatur()
    // {

    //     $id_kab=$this->input->post('id_kab');
    //     $id_kec=$this->input->post('id_kec');
    //     $id_desa=$this->input->post('id_desa');
    //     $query=$this->db->query("SELECT * FROM desa  INNER JOIN kabupaten ON desa.id_kab=kabupaten.id_kab INNER JOIN kecamatan ON desa.id_kec=kecamatan.id_kec  WHERE id_desa='$id_desa'")->row_array();
    //     $pdf = new FPDF("L", "cm", array('21','30'));
    //     $pdf->SetMargins(1, 1, 1);
    //     $pdf->AliasNbPages();
    //     $pdf->AddPage();
    //     $pdf->SetFont('Times', 'B', 14);
    //     // $pdf->Image('assets/img/comp.jpg',1.5,0.7,2,2);
    //     $pdf->SetX(8);
    //     $pdf->MultiCell(14,0.5,'PEMERINTAH PROVINSI RIAU',0,'C');
    //      $pdf->SetFont('Times', 'B', 12);
    //     $pdf->SetX(8);
    //     $pdf->MultiCell(14,0.5,'DINAS PERMBERDAYAAN MASYARAKAT DAN DESA ',0,'C');
    //     $pdf->SetFont('Arial', 'B', 10);
    //     $pdf->SetX(8);
    //     $pdf->MultiCell(14,0.5,'Jalan H.R Soebrantas Km. 10 Tel.0761-62705 fax. 65839' ,0,'C');
    //     $pdf->SetFont('Arial', 'B', 10);
    //     $pdf->SetX(8);
    //     $pdf->MultiCell(14,0.5,'Website: dpmd.riau.go.id Email: sekretariatdpmd.riau.go.id' ,0,'C');
        
    //     $pdf->Line(1, 3.1, 29, 3.1);
    //     $pdf->SetLineWidth(0.1,1);
    //     $pdf->Line(1, 3.2, 29, 3.2);
    //     $pdf->SetLineWidth(0);
    //     $pdf->ln(1);
    //     $pdf->SetFont('Arial', 'B', 14);
    //     $pdf->SetX(8);
    //     $pdf->MultiCell(14, 0.5, "Data Aparatur Kel / Desa ".$query['nama_desa'], 0, 'C');
    //     $pdf->SetFont('Arial', 'B', 12);
    //     $pdf->ln(1);
    //     $pdf->MultiCell(14, 0.5, "Kabupaten : ".$query['nama_kab'], 0, 'L');
    //     $pdf->MultiCell(14, 0.5, "Kecamatan : ".$query['nama_kec'], 0, 'L');
    //     $pdf->MultiCell(14, 0.5, "Kel/Desa     : ".$query['nama_desa'], 0, 'L');
        
    //     $pdf->SetFont('Arial', 'B', 10);
    //     $pdf->ln(1);
    //     $pdf->SetFont('Arial', 'B', 10);
        
    //     $pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
    //     $pdf->Cell(5, 0.8, 'Nama', 1, 0, 'C');
    //     $pdf->Cell(3, 0.8, 'NIP', 1, 0, 'C');
    //     $pdf->Cell(3, 0.8, 'Jabatan', 1, 0, 'C');
    //     $pdf->Cell(1, 0.8, 'JK', 1, 0, 'C');
    //     $pdf->Cell(3, 0.8, 'Pendidikan', 1, 0, 'C');
    //     $pdf->Cell(4, 0.8, 'TTL', 1, 0, 'C');
    //     $pdf->Cell(5, 0.8, 'Masa Jabatan', 1, 0, 'C');
    //     $pdf->Cell(3, 0.8, 'NO HP', 1, 1, 'C');
    //     $pdf->SetFont('Arial', '', 9);
    //     $no = 1;
      
    //     //$data['desa']=$this->M_admin->getDesa()->result();
    //     $data=$this->db->query("SELECT * from perangkat_desa  WHERE id_desa='$id_desa'")->result();
    //     foreach ($data as $j) {

    //         $pdf->Cell(1, 0.8, $no, 1, 0, 'C');
    //         $pdf->Cell(5, 0.8, $j->nama, 1, 0, 'C');
    //         $pdf->Cell(3, 0.8, $j->nip, 1, 0, 'C');
    //         $pdf->Cell(3, 0.8, $j->jabatan, 1, 0, 'C');
    //         $pdf->Cell(1, 0.8, $j->jk, 1, 0, 'C');
    //         $pdf->Cell(3, 0.8, $j->pendidikan, 1, 0, 'C');
    //         $pdf->Cell(4, 0.8, $j->tempat_lahir.', '.$j->tanggal_lahir, 1, 0, 'C');
    //         $pdf->Cell(5, 0.8, $j->tanggal_pelantikan.' s/d '.$j->masa_akhir_jabatan, 1, 0, 'C');
    //         $pdf->Cell(3, 0.8,$j->no_hp,  1, 1, 'C');
            
    //         $no++;
    //     }
    //     $name= $this->db->get_where('user')->row_Array();

    //     $pdf->ln(1);
    //     $pdf->Cell(25, 0.8, 'Mengetahui', 0, 0, 'R');
    //     $pdf->Cell(1, 0.8, '', 0, 0, 'C');
 
    //      $pdf->ln(1.5);
    //      $pdf->Cell(25, 0.8,$this->session->userdata('username'), 0, 1, 'R');
      
    //      $pdf->Cell(1, 0.8, '', 0, 0, 'C');

    //     $pdf->Output("Data Aparatur.pdf","I");


    // }

}

/* End of file C_Cetak.php */
/* Location: ./application/controllers/C_Cetak.php */