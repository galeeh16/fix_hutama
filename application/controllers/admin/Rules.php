<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rules extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cek_session();
		$this->load->model('Model_rules');
		$this->load->model('Model_gejala');
		$this->load->model('Model_penyakit');
		$this->load->model('Model_user');
	}

	public function index()
	{
		$title['title'] = "Zoonsis | Admin Rules";
		$title['user'] = $this->Model_user->get_where($this->session->userdata('id'));
		$data = [
			'gejala'   => $this->Model_gejala->get_all(),
			'penyakit' => $this->Model_penyakit->get_all(),
		];

		$this->load->view('admin/v_header_admin', $title);
		$this->load->view('admin/v_rules', $data);
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
		$search = $this->input->get('search');
		$rowsperpage = $this->input->get('rowsperpage');
		$bobot = $this->input->get('bobot');

		if($rowsperpage == 0 OR $rowsperpage == '') {
			$rowsperpage = 10;
		}

		$page = $this->input->get('p');
		if($page == 0 OR $page == '') {
			$page = 1;
		}

		$count = $this->Model_rules->get_data_count($search);

		$pages = $page - 1;
		$p = $pages * $rowsperpage;
		$limit = ceil($count / $rowsperpage);

		$data_rules = $this->Model_rules->get_data($p, $rowsperpage, $search, $bobot);

		$html = '';
		$html .= '<table id="table-rules" class="table table-bordered table-condensed table-hover table-striped">
								<thead>
									<tr>
										<th width="2%">No</th>
										<th width="40%">Gejala</th>
										<th width="36%">Penyakit</th>
										<th width="12%">CF (Bobot)</th>
										<th width="5%">Ubah</th>
										<th width="5%">Hapus</th>
									</tr>
								</thead>
								</tbody>';

		if($count > 0) {
			$no = $p + 1;
			foreach ($data_rules as $key => $row) {
				$html .= '<tr>';
				$html .= '<td class="text-center">' . $no . '</td>';
				$html .= '<td width="40%">' . $row->nama_gejala . '</td>';
				$html .= '<td width="36%">' . $row->nama_penyakit . '</td>';
				$html .= '<td class="text-center" width="12%">' . $row->cf . '</td>';
				$html .= '<td class="text-center" width="5%"><button type="button" title="Ubah Rules" onclick="submit('."'$row->id_rules'".')" class="btn btn-warning btn-xs"><i class="lnr lnr-pencil"></i></button></td>';
				$html .= '<td class="text-center" width="5%"><button type="button"onclick="hapus('."'$row->id_rules'".')" title="Hapus Rules" class="btn btn-danger btn-xs"><i class="lnr lnr-trash"></i></button></td>';
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
		}
		echo $html;
		die;
	}

}

/* End of file Rules.php */
/* Location: ./application/controllers/admin/Rules.php */
