<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_gejala extends CI_Model {

	private $table = 'gejala';

	function get_data_count($search = NULL)
	{
		if($search != '' && $search != NULL) {
			$this->db->like('kode_gejala', $search, 'both');
			$this->db->or_like('nama_gejala', $search, 'both');
		}

		$query = $this->db->get($this->table);
    return $query->num_rows();
	}

	function get_data($limit, $offset, $search = NULL)
  {
		if($search != '' OR $search != NULL) {
			$this->db->like('kode_gejala', $search, 'both');
			$this->db->or_like('nama_gejala', $search, 'both');
		}

    $this->db->order_by('kode_gejala', 'ASC');
    $this->db->limit($offset, $limit);
    $query = $this->db->get($this->table);
    return $query->result();
  }

  function get_all() {
    return $this->db->get($this->table)->result();
  }

  function get_all_array() {
    return $this->db->get($this->table)->result_array();
  }

  function get_id($id)
  {
  	$this->db->where('id_gejala', $id);
  	$query = $this->db->get($this->table);

  	if($query->num_rows() > 0) {
  		return $query->row();
  	} else {
  		return false;
  	}
  }

  function insert_data($data)
  {
  	$this->db->insert($this->table, $data);

  	if($this->db->affected_rows() > 0) {
  		return true;
  	} else {
  		return false;
  	}
  }

  function update_data($id, $data)
  {
  	$this->db->where('id_gejala', $id);
  	$query = $this->db->update($this->table, $data);

  	if($this->db->affected_rows() > 0) {
  		return true;
  	} else {
  		return false;
  	}
  }

  function delete_data($id)
	{
		$this->db->where('id_gejala', $id);
		$this->db->delete($this->table);

		if($this->db->affected_rows() > 0 ) {
			return true;
		} else {
			return false;
		}
	}

  function get_total_gejala()
  {
    $this->db->select('COUNT(*) AS jumlah');
    $this->db->from($this->table);
    return $this->db->get()->row();
  }

  function get_where($where) {
		$this->db->where('id_gejala', $where);
		$query = $this->db->get($this->table);

		if($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
	}


}

/* End of file Model_gejala.php */
/* Location: ./application/models/Model_gejala.php */
