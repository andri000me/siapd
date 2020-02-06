<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_perangkat extends CI_Model {

	public function getKab($id)
	{
		// $this->db->order_by('nama_kab', 'asc');
		// $this->db->where('id_kab', $id);
		$this->db->join('kabupaten', 'kabupaten.id_kab = desa.id_kab');
		$this->db->join('kecamatan', 'kecamatan.id_kec = desa.id_kec');
		$this->db->where('id_desa', $id);
		return $this->db->get('desa');
	}

	public function _upload()
	{
		$config['upload_path']		= './upload/';
		$config['allowed_types']	= 'gif|jpg|png|doc|docs|xlxs';
		$config['file_name']		= $this->session->userdata('id_desa');
		$config['overwrite']		= true;
		$config['max_size']			= 1024;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file')) {
			return  $this->upload->data('file_name');
			
		}

		return 'default.jpg';
	}

	public function getPesan($id)
	{
		//$this->db->join('desa', 'desa.id_desa = pesan.id_desa');
		$this->db->where('id_desa',$id);
		

		
		return $this->db->get('pesan');
	}

}

/* End of file M_perangkat.php */
/* Location: ./application/models/M_perangkat.php */