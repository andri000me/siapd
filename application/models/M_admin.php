<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin extends CI_Model {

	

	function getKab()
	{
		$this->db->order_by('nama_kab', 'asc');
		// $this->db->join('kecamatan', 'kabupaten.id_kab = kecamatan.id_kab');
		// $this->db->join('desa', 'kabupaten.id_kab = desa.id_kab');
		return $this->db->get('kabupaten');
	}

	function getKec()
	{
		$this->db->order_by('nama_kec', 'asc');
		$this->db->join('kabupaten', 'kecamatan.id_kab = kabupaten.id_kab');
        return $this->db->get('kecamatan');
		// return $this->db->get('kecamatan');
	}

	function getDesa()
	{
		$this->db->order_by('nama_desa', 'asc');
		$this->db->join('kabupaten', 'desa.id_kab = kabupaten.id_kab');
		$this->db->join('kecamatan', 'desa.id_kec = kecamatan.id_kec');
		return $this->db->get('desa');
	}

	function getKelurahan()
	{
		$this->db->order_by('nama_kelurahan', 'asc');
		$this->db->join('kabupaten', 'kelurahan.id_kab = kabupaten.id_kab');
		$this->db->join('kecamatan', 'kelurahan.id_kec = kecamatan.id_kec');
		return $this->db->get('kelurahan');
	}
	function getDataKec($id)
	{
		$this->db->order_by('nama_kec', 'asc');
		$this->db->where('id_kab', $id);
        return $this->db->get('kecamatan');
		
	}

	function getDataDesa($id)
	{
		$this->db->order_by('nama_desa', 'asc');
		$this->db->where('id_kec', $id);
        return $this->db->get('desa');
	}

	function getDataKelurahan($id)
	{
		$this->db->order_by('nama_kelurahan', 'asc');
		$this->db->where('id_kec', $id);
        return $this->db->get('kelurahan');
	}

	function getDataDetailDesa($id)
	{
		$this->db->order_by('id', 'asc');
		$this->db->where('id_desa', $id);
        return $this->db->get('perangkat_desa');
	}

	function getDataDetailKelurahan($id)
	{
		$this->db->order_by('id', 'asc');
		$this->db->where('id_desa', $id);
        return $this->db->get('perangkat_desa');
	}

	function getJumDesa($id)
	{
		$query =$this->db->query("SELECT nama_desa FROM desa WHERE id_kec='$id'");
		if ($query->num_rows()>0) {
			return $query->num_rows();
		}else{
			return 0;
		}
	}

	function getJumKelurahan($id)
	{
		$query =$this->db->query("SELECT nama_kelurahan FROM kelurahan WHERE id_kec='$id'");
		if ($query->num_rows()>0) {
			return $query->num_rows();
		}else{
			return 0;
		}
	}

	function getJumKec($kab)
	{
		$query =$this->db->query("SELECT * FROM kecamatan WHERE id_kab='$kab'");
		if ($query->num_rows()>0) {
			return $query->num_rows();
		}else{
			return 0;
		}
	}

	public function getPesan()
	{
		// $this->db->order_by('tanggal', 'asc');
		//$this->db->join('kelurahan', 'kelurahan.id_kel = kelurahan.id_kel');
		return $this->db->get('pesan');
	}

	public function konfirmasi($id)
	{
		//data yang mau di edit
		$data = [
			'status' => '1'
		];
		//sintaks edit data
		$this->db->where('id',$id);
		$this->db->update('pesan',$data);
		return true;
	}

}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */