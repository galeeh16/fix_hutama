<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_rules extends CI_Model {

	private $table = 'rules';

	function get_data_count($search = NULL)
	{
		if($search != '' && $search != NULL) {
			$this->db->like('nama_penyakit', $search, 'both');
			$this->db->or_like('nama_gejala', $search, 'both');
			$this->db->or_like('cf', $search, 'both');
		}

		$this->db->join('gejala', 'gejala.id_gejala = rules.id_gejala');
		$this->db->join('penyakit', 'penyakit.id_penyakit = rules.id_penyakit');
		$query = $this->db->get($this->table);
    return $query->num_rows();
	}

	function get_data($limit, $offset, $search = NULL, $bobot = NULL)
  {
		if($search != '' OR $search != NULL) {
			$this->db->like('nama_gejala', $search, 'both');
			$this->db->or_like('nama_penyakit', $search, 'both');
		}

		if($bobot != '' OR $bobot != NULL) {
			if($bobot == 1) {
				$this->db->order_by('cf', 'DESC');
			} else if($bobot == 2) {
				$this->db->order_by('cf', 'ASC');
			} else {
				$this->db->order_by('id_rules', 'ASC');
			}
		}

    $this->db->limit($offset, $limit);
		$this->db->join('gejala', 'gejala.id_gejala = rules.id_gejala');
		$this->db->join('penyakit', 'penyakit.id_penyakit = rules.id_penyakit');
    $query = $this->db->get($this->table);

    return $query->result();
  }

	function delete_rules_gejala($id_gejala)
	{
		$this->db->where('id_gejala', $id_gejala);
		$this->db->delete($this->table);

		if($this->db->affected_rows() > 0 ) {
			return true;
		} else {
			return false;
		}
	}

	function delete_rules_penyakit($id) {
		$this->db->where('id_penyakit', $id);
		$this->db->delete($this->table);

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	function get_total_rules() {
    $this->db->select('COUNT(*) AS jumlah');
    $this->db->from($this->table);
    return $this->db->get()->row();
  }


}

/* End of file Model_rules.php */
/* Location: ./application/models/Model_rules.php */
