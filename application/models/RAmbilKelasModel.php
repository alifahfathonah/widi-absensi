<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class RAmbilKelasModel extends CI_Model {

	public $table = 'r_ambil_kelas';

	public function show($limit, $offset, $tipe)
	{
		if ($limit >= 0)
			$this->db->limit($limit);
		if ($offset >= 0)
			$this->db->offset($offset);

		$data = $this->db->get($this->table);
		switch (strtolower($tipe)) {
			case 'array':
				return $data->result_array();
				break;
			case 'object':
				return $data->result();
				break;
			case 'count':
				return $data->num_rows();
				break;
		}
	}

	public function single($field, $value, $tipe)
	{
		$data = $this->db->get_where($this->table, array($field => $value));
		switch (strtolower($tipe)) {
			case 'array':
				return $data->row_array();
				break;
			case 'object':
				return $data->row();
				break;
			case 'count':
				return $data->num_rows();
				break;
		}
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($data, $id)
	{
		return $this->db->update($this->table, $data, array('id' => $id));
	}


	public function delete($id)
	{
		return $this->db->delete($this->table, array('id' => $id));
	}


	public function join_mahasiswa($limit, $offset, $tipe)
	{
		if ($limit >= 0)
			$this->db->limit($limit);
		if ($offset >= 0)
			$this->db->offset($offset);

		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('mahasiswa', 'r_ambil_kelas.mahasiswa_nim = mahasiswa.nim');
		$data = $this->db->get();
		switch (strtolower($tipe)) {
			case 'array':
				return $data->result_array();
				break;
			case 'object':
				return $data->result();
				break;
			case 'count':
				return $data->num_rows();
				break;
		}
	}
	

}

/* End of file RAmbilKelasModel.php */
/* Location: ./application/models/RAmbilKelasModel.php */
?>