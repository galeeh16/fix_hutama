<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_penyakit extends CI_Model {

	private $table = 'penyakit';

	function get_total_penyakit()
  {
    $this->db->select('COUNT(*) AS jumlah');
    $this->db->from($this->table);
    return $this->db->get()->row();
  }

	function get_data_count($search = NULL)
	{
		if($search != '' && $search != NULL) {
			$this->db->like('kode_penyakit', $search, 'both');
			$this->db->or_like('nama_penyakit', $search, 'both');
			$this->db->or_like('deskripsi_penyakit', $search, 'both');
		}

		$this->db->join('solusi', 'solusi.id_solusi = penyakit.id_solusi');
		$query = $this->db->get($this->table);
    return $query->num_rows();
	}

	function get_data($limit, $offset, $search = NULL)
  {
		if($search != '' OR $search != NULL) {
			$this->db->like('kode_penyakit', $search, 'both');
			$this->db->or_like('nama_penyakit', $search, 'both');
			$this->db->or_like('deskripsi_penyakit', $search, 'both');
		}

    $this->db->order_by('kode_penyakit', 'ASC');
    $this->db->limit($offset, $limit);
		$this->db->join('solusi', 'solusi.id_solusi = penyakit.id_solusi');
    $query = $this->db->get($this->table);
    return $query->result();
  }

  function get_all_data()
  {
  	$this->db->select("*");
  	$this->db->from($this->table);
  	return $this->db->count_all_results();
  }

  function get_all() {
		$this->db->order_by('nama_penyakit', 'ASC');
    return $this->db->get($this->table)->result();
  }

  function get_where($id) {
    $this->db->join('solusi', 'solusi.id_solusi = penyakit.id_solusi', 'left');
    $this->db->where('id_penyakit', $id);
    $query =  $this->db->get($this->table);

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
    $this->db->where('id_penyakit', $id);
    $this->db->update($this->table, $data);

    if($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  function delete_data($id)
  {
    $this->db->where('id_penyakit', $id);
    $this->db->delete($this->table);

    if($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  function get_gejala($id)
  {
    $this->db->where('id_penyakit', $id);
    $this->db->join('gejala', 'gejala.id_gejala = rules.id_gejala', 'left');
    return $this->db->get('rules')->result();
  }

}

/* End of file Model_penyakit.php */
/* Location: ./application/models/Model_penyakit.php */
