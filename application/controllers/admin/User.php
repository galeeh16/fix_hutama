<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cek_session();
		$this->load->model('Model_user');
	}

	public function index()
	{
		$title['title'] = 'Zoonosis | Admin User';
		$title['user'] = $this->Model_user->get_where($this->session->userdata('id'));

		$this->load->view('admin/v_header_admin', $title);
		$this->load->view('admin/v_user');
	}

	public function cek_session()
	{
		if($this->session->userdata('level') !== 'Admin') {
			$this->session->set_flashdata('err', '<div class="alert alert-danger" role="alert"><center><i class="fa fa-exclamation-triangle"></i> Anda bukan Admin, silahkan login terlebih dahulu!</center></div>');

			setcookie("username", "", time()+(10*365*24*60), "/");
			setcookie("password", "", time()+(10*365*24*60), "/");
			setcookie("remember", "", time()+(10*365*24*60), "/");

			return redirect(base_url('sign-in'),'refresh');
		}
	}

	public function get_data()
	{
		$page = $this->input->get('p');
		if($page == 0 OR $tpage == '') {
			$page = 1;
		}

		$rowsperpage = $this->input->get('rowsperpage');
		if($rowsperpage == '' OR $rowsperpage == 0) {
			$rowsperpage = 10;
		}

		$level = $this->input->get('level');
		$search = $this->input->get('search');

		$count = $this->Model_user->get_data_count($level, $search);

		$pages = $page - 1;
		$p = $pages * $rowsperpage;
		$limit = ceil($count / $rowsperpage);

		$data_user = $this->Model_user->get_data($p, $rowsperpage, $level, $search);

		$html = '';

		$html .= '<table class="table table-bordered table-condensed table-hover table-striped">
								<thead>
								<tr >
									<th width="2%">No</th>
									<th>Name</th>
									<th>Username</th>
									<th>Address</th>
									<th>Handphone</th>
									<th>Level</th>
									<th>Photo</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>';

		$no = $p + 1;
		if($count > 0) {
			foreach($data_user as $key => $row) {
				if($row->photo !== NULL OR $row->photo !== '') {
					$photo = '<img src="'.base_url().'assets/img/user/'.$row->photo.'" class="img-thumbnail" width="70" height="70" />';
				} else {
					$photo = '<img src="'.base_url().'assets/img/user-default.jpg" class="img-thumbnail" width="70" height="70" />';
				}

				$html .= '<tr>';
				$html .= '<td>' . $no . '</td>';
				$html .= '<td>' . $row->name . '</td>';
				$html .= '<td>' . $row->username . '</td>';
				$html .= '<td>' . $row->address . '</td>';
				$html .= '<td>' . $row->handphone . '</td>';
				$html .= '<td>' . $row->level . '</td>';
				$html .= '<td>' . $photo . '</td>';
				$html .= '<td>' . '<button type="button" title="Ubah User" onclick="submit('."'$row->id_user'". ')" class="btn btn-warning btn-xs"><i class="lnr lnr-pencil"></i></button>' .'</td>';
				$html .= '<td>' . '<button type="button"onclick="hapus('."'$row->id_user'".')" title="Hapus User" class="btn btn-danger btn-xs"><i class="lnr lnr-trash"></i></button>' . '</td>';
				$html .= '</tr>';

				$no++;
			}

		$html .= '</tbody></table>';
		$html .= '<center>';
		$html .= '<ul class="pagination">';

		if($page > 1) {
			$prev = $page - 1;
			$html .= '<li><span onclick="getData('.$prev.')">Prev</span></li>';
		} else {
			$html .= '<li class="disabled"><span style="cursor:pointer;">Prev</span><li>';
		}

		for($i = 1; $i <= $limit; $i++) {
			if($i == $page) {
				$html .= '<li class="active"><span>'.$i.'</span></li>';
			} else {
				$html .= '<li><span onclick="getData('.$i.')">'.$i.'</span></li>';
			}
		}

		$check = $p + $rowsperpage;
		if($count > $check) {
			$next = $page + 1;
			$html .= '<li><span onclick="getData('.$next.')">Next</span></li>';
		} else {
			$html .= '<li class="disabled"><span style="cursor:pointer;">Next</span><li>';
		}

		$html .= '</ul>';
		$html .= '</center>';

	} else {
		$html .= '<tr>';
		$html .= '<td colspan="9" align="center" style="padding: 2em;"><div class="alert alert-info"><i class="fa fa-info-circle"></i> Data tidak ditemukan</div></td>';
		$html .= '</tr>';
		$html .= '</tbody></table>';
	}
		echo $html;
		die;
	}

	public function tambah()
	{
		$result = ['success' => false, 'messages' => []];
		$msg = [
			'required' => 'Harap isi %s',
			'min_length' => '%s terlalu singkat',
			'max_length' => '%s terlalu panjang',
			'is_unique' => '%s sudah digunakan',
			'numeric' => '%s harus berupa nomor'
		];

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[15]|is_unique[users.username]', $msg);

		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]', $msg);

		$this->form_validation->set_rules('name', 'Nama', 'trim|required|min_length[3]|max_length[40]', $msg);

		$this->form_validation->set_rules('address', 'Alamat', 'trim|required|min_length[3]|max_length[100]', $msg);

		$this->form_validation->set_rules('handphone', 'Nomor Handphone', 'trim|required|numeric|min_length[10]|max_length[15]', $msg);

		$this->form_validation->set_rules('level', 'Level', 'trim|required', $msg);

		$this->form_validation->set_rules('photo', 'Foto', 'callback_photo_check');

		$this->form_validation->set_error_delimiters('<span class="help-block" style="padding-bottom: 0px; margin-bottom: 0px">', '</span>');

		if ($this->form_validation->run($this) == TRUE) {
			$data = [];
			if(!empty($_FILES['photo']['name'])) {
				$data = [
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'name' => $this->input->post('name'),
					'address' => $this->input->post('address'),
					'handphone' => $this->input->post('handphone'),
					'level' => $this->input->post('level'),
					'photo' => $this->upload_photo()
				];
			} else {
				$data = [
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'name' => $this->input->post('name'),
					'address' => $this->input->post('address'),
					'handphone' => $this->input->post('handphone'),
					'level' => $this->input->post('level')
				];
			}

			if($this->Model_user->insert_data($data)) $result['success'] = true;
		} else {
			foreach ($_POST as $key => $value) {
				$result['messages'][$key] = form_error($key);
				$result['messages']['photo'] = form_error('photo');
			}
		}
		echo json_encode($result);
	}

	public function get_id()
	{
		$id = $this->input->post('id_user');
		$get = $this->Model_user->get_where($id);

		if($get) {
			echo json_encode($get);
		}
	}

	public function photo_check($str)
	{
		if(!empty($_FILES['photo']['name'])) {
			$allowed = ['image/jpg', 'image/jpeg', 'image/png'];
			$mime = get_mime_by_extension($_FILES['photo']['name']);

			if(in_array($mime, $allowed)) {
				if($_FILES['photo']['size'] <= 1048576) {
					return true;
				} else {
					$this->form_validation->set_message(__FUNCTION__, 'Ukuran foto terlalu besar (max 1MB)');
					return false;
				}
			} else {
				$this->form_validation->set_message(__FUNCTION__, 'Ekstensi foto tidak valid (hanya jpg/jpeg/png)');
				return false;
			}
		}
	}

	public function upload_photo()
	{
		if(!empty($_FILES['photo']['name']))
		{
			$ext = explode('.', $_FILES['photo']['name']);
			$file_name = 'user_'.substr(md5(rand()), 0, 10).'.'.$ext[1];

			$config['upload_path']   = './assets/img/user/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size']      = '1024';
			$config['file_name']     = $file_name;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload('photo')) {
				$this->upload->data();
				return $file_name;
			} else {
				return false;
			}
		}
	}

	public function ubah()
	{
		$id = $this->input->post('id_user');
		$result = ['success' => false, 'messages' => []];
		$msg = [
			'required' => 'Harap isi %s',
			'min_length' => '%s terlalu singkat',
			'max_length' => '%s terlalu panjang',
			'is_unique' => '%s sudah digunakan',
			'numeric' => '%s harus berupa nomor'
		];

		if($this->input->post('username') == $this->input->post('username_2')) {
			$this->form_validation->set_rules('username', '', 'trim|required|min_length[5]|max_length[15]', $msg);
		} else {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[15]|is_unique[users.username]', $msg);
		}

		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]', $msg);

		$this->form_validation->set_rules('name', 'Nama', 'trim|required|min_length[3]|max_length[40]', $msg);

		$this->form_validation->set_rules('address', 'Alamat', 'trim|required|min_length[3]|max_length[100]', $msg);

		$this->form_validation->set_rules('handphone', 'Nomor Handphone', 'trim|required|min_length[10]|max_length[15]|numeric', $msg);

		$this->form_validation->set_rules('level', 'Level', 'trim|required', $msg);

		$this->form_validation->set_rules('photo', 'Foto', 'callback_photo_check');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run($this) == TRUE) {
			$data = [];
			if(!empty($_FILES['photo']['name'])) {
				$this->hapus_photo($id);
				$data = [
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'name' => $this->input->post('name'),
					'address' => $this->input->post('address'),
					'handphone' => $this->input->post('handphone'),
					'level' => $this->input->post('level'),
					'photo' => $this->upload_photo(),
					'update_at' => date('Y-m-d H:i:s')
				];
			} else {
				$data = [
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'name' => $this->input->post('name'),
					'address' => $this->input->post('address'),
					'handphone' => $this->input->post('handphone'),
					'level' => $this->input->post('level'),
					'update_at' => date('Y-m-d H:i:s')
				];
			}

			$update = $this->Model_user->update_data($id, $data);

			if($update) {
				$result['success'] = true;
			}
		} else {
			foreach ($_POST as $key => $value) {
				$result['messages'][$key] = form_error($key);
				$result['messages']['photo'] = form_error('photo');
			}
		}
		echo json_encode($result);
	}

	public function hapus_photo($id) {
		$cek = $this->Model_user->get_where($id);
		if($cek->photo !== '') {
			if(file_exists('assets/img/user/'.$cek->photo)) {
				return unlink('assets/img/user/'.$cek->photo);
			}
		}
	}

	public function hapus() {
		$data['success'] = false;
		$id = $this->input->post('id_user');
 		$this->hapus_photo($id);

		if($this->Model_user->delete_data($id)) {
			$data['success'] = true;
			echo json_encode($data);
		}
	}

	public function profile()
	{
		$data = [
			'title' => 'Zoonosis | Profile '.$this->session->userdata('name'),
			'user' => $this->Model_user->get_where($this->session->userdata('id'))
		];

		$this->load->view('admin/v_header_admin', $data);
		$this->load->view('admin/v_profile', $data);

	}


}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */
