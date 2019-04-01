<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

	private $table = "users";

  function get_data_count($level = NULL, $search = NULL)
  {
		if($level != NULL && $level != '' && $search == NULL) {
			 $this->db->where('level', $level);
		}

		if($search != '' OR $search != NULL && $level == NULL) {
			$this->db->like('username', $search, 'both');
			$this->db->or_like('name', $search, 'both');
			$this->db->or_like('address', $search, 'both');
			$this->db->or_like('handphone', $search, 'both');
			$this->db->or_like('level', $search, 'both');
		}

		if($level != NULL && $search != NULL) {
	    $query = $this->db->query("SELECT * FROM users
								WHERE level = '$level'
								AND name LIKE '%$search%' OR username LIKE '%$search%' OR address LIKE '%$search%' OR handphone LIKE '%$search%' ");
			return $query->num_rows();
    }

    $query = $this->db->get($this->table);
    return $query->num_rows();
  }

  function get_data($limit, $offset, $level = NULL, $search = NULL)
  {
    if($level != '' OR $level != NULL ) {
      $this->db->where('level', $level);
    }

		if($search != '' OR $search != NULL) {
			$this->db->like('username', $search, 'both');
			$this->db->or_like('name', $search, 'both');
			$this->db->or_like('address', $search, 'both');
			$this->db->or_like('handphone', $search, 'both');
			$this->db->or_like('level', $search, 'both');
		}

		if($level != NULL && $search != NULL) {
			$query = $this->db->query("SELECT * FROM users
								WHERE level = '$level'
								AND (name LIKE '%$search%' OR username LIKE '%$search%' OR address LIKE '%$search%' OR handphone LIKE '%$search%') ORDER BY id_user DESC LIMIT $limit, $offset");
			return $query->result();
		}

    $this->db->order_by('id_user', 'DESC');
    $this->db->limit($offset, $limit);
    $query = $this->db->get($this->table);
    return $query->result();
  }

  function get_where($id)
  {
		$this->db->where('id_user', $id);
		$sql = $this->db->get($this->table);

		if($sql->num_rows() > 0) {
			return $sql->row();
		} else {
			return false;
		}
	}

  function login($username, $password) {
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $this->db->limit(1);
    $sql = $this->db->get();

    if($sql->num_rows() > 0) {
      return $sql->row();
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

  function update_data($where, $data)
  {
    $this->db->where('id_user', $where);
    $this->db->update($this->table, $data);

    if($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  function delete_data($id)
  {
    $this->db->where('id_user', $id);
    $this->db->delete($this->table);

    if($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  function get_total_user() {
    $this->db->select('COUNT(*) AS jumlah');
    $this->db->from($this->table);
    return $this->db->get()->row();
  }

}

/* End of file Model_user.php */
/* Location: ./application/models/Model_user.php */
