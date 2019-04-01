<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cek_session();
		$this->load->model('Model_gejala');
		$this->load->model('Model_rules');
		$this->load->model('Model_user');
	}

	public function index()
	{
		$title['title'] = 'Zoonosis | Admin Gejala';
		$title['user'] = $this->Model_user->get_where($this->session->userdata('id'));
		$this->load->view('admin/v_header_admin', $title);
		$this->load->view('admin/v_gejala');
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
		$search = $this->input->get('search');
		$rowsperpage = $this->input->get('rowsperpage');

		if($page == 0 OR $page == '') {
			$page = 1;
		}

		if($rowsperpage == '' OR $rowsperpage == 0) {
			$rowsperpage = 10;
		}

		$count = $this->Model_gejala->get_data_count($search);

		$pages = $page - 1;
		$p = $pages * $rowsperpage;
		$limit = ceil($count / $rowsperpage);

		$data_gejala = $this->Model_gejala->get_data($p, $rowsperpage, $search);

		$html = '';

		$html .= '<table class="table table-bordered table-condensed table-hover table-striped">
								<thead>
								<tr >
									<th width="2%">No</th>
									<th>Kode Gejala</th>
									<th>Nama Gejala</th>
									<th width="5%">Ubah</th>
									<th width="5%">Hapus</th>
								</tr>
							</thead>
							<tbody>';

		$no = $p + 1;
		if($count > 0) {
			foreach($data_gejala as $key => $row) {
				$html .= '<tr>';
				$html .= '<td>' . $no . '</td>';
				$html .= '<td>' . $row->kode_gejala . '</td>';
				$html .= '<td>' . $row->nama_gejala . '</td>';
				$html .= '<td>' . '<button type="button" title="Ubah User" onclick="submit('."'$row->id_gejala'". ')" class="btn btn-warning btn-xs"><i class="lnr lnr-pencil"></i></button>' .'</td>';
				$html .= '<td>' . '<button type="button"onclick="hapus('."'$row->id_gejala'".')" title="Hapus User" class="btn btn-danger btn-xs"><i class="lnr lnr-trash"></i></button>' . '</td>';
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
			'is_unique' => '%s sudah digunakan'
		];

		$this->form_validation->set_rules('kode_gejala', 'Kode Gejala', 'trim|required|min_length[3]|max_length[12]|is_unique[gejala.kode_gejala]', $msg);

		$this->form_validation->set_rules('nama_gejala', 'Nama Gejala', 'trim|required|min_length[3]|max_length[50]', $msg);

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run($this) == TRUE) {
			$data = [
				'kode_gejala' => $this->input->post('kode_gejala'),
				'nama_gejala' => $this->input->post('nama_gejala')
			];

			if($this->Model_gejala->insert_data($data))  $result['success'] = true;
		} else {
			foreach ($_POST as $key => $value) {
				$result['messages'][$key] = form_error($key);
			}
		}
		echo json_encode($result);
	}

	public function get_id()
	{
		$id = $this->input->post('id_gejala');
		$get = $this->Model_gejala->get_id($id);
		if($get) {
			echo json_encode($get);
		}
	}

	public function ubah()
	{
		$id = $this->input->post('id_gejala');
		$result = ['success' => false, 'messages' => []];
		$msg = [
			'required' => 'Harap isi %s',
			'min_length' => '%s terlalu singkat',
			'max_length' => '%s terlalu panjang',
			'is_unique' => '%s sudah digunakan'
		];

		if($this->input->post('kode_gejala') == $this->input->post('kode_gejala_2')) {
			$this->form_validation->set_rules('kode_gejala', 'Kode Gejala', 'trim|required|min_length[3]|max_length[12]', $msg);
		} else {
			$this->form_validation->set_rules('kode_gejala', 'Kode Gejala', 'trim|required|min_length[3]|max_length[12]|is_unique[gejala.kode_gejala]', $msg);
		}

		$this->form_validation->set_rules('nama_gejala', 'Nama Gejala', 'trim|required|min_length[3]|max_length[50]', $msg);

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run($this) == TRUE) {
			$data = [
				'kode_gejala' => $this->input->post('kode_gejala'),
				'nama_gejala' => $this->input->post('nama_gejala')
			];

			if($this->Model_gejala->update_data($id, $data))  $result['success'] = true;
		} else {
			foreach ($_POST as $key => $value) {
				$result['messages'][$key] = form_error($key);
			}
		}
		echo json_encode($result);
	}

	public function hapus()
	{
		$result['success'] = false;
		$id = $this->input->post('id_gejala');

		$hapus_rules = $this->Model_rules->delete_rules_gejala($id);

		if($this->Model_gejala->delete_data($id)) {
			$result['success'] = true;
			echo json_encode($result);
		}
	}

}

/* End of file Gejala.php */
/* Location: ./application/controllers/admin/Gejala.php */
