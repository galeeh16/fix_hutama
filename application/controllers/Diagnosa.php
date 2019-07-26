<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosa extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		// $this->_cek_session();
		$this->load->model('Model_gejala');
		$this->load->model('Model_rules');
		$this->load->model('Model_user');
		$this->load->helper('tampil_helper');
	}

	// function _cek_session() 
	// {
	// 	if($this->session->userdata('level') !== 'Member') {
	// 		$this->session->set_flashdata('err', '<div class="alert alert-danger"><center><b>Anda bukan member, silahkan login terlebih dahulu.</b></center></div>');
	// 		return redirect('welcome','refresh');
	// 	}
	// }

	function hitung() 
	{
		if ($this->input->post('proses')) {
			$datapilihgejala = $this->input->post('id_gejala');		

			// if (count($datapilihgejala) < 2) {
			// 	$lokasi = base_url("Member/index");

			// 	$this->session->set_flashdata('kurang', '<div class="alert alert-danger" role="alert"><strong>Pilih Minimal 2 Gejala!</strong></center></div>');
				
			// 	echo "<script>location='".$lokasi."';</script>";	
			// } else {
				foreach ($this->input->post('id_gejala') as $id_gejala => $value) {
					$idg[] = $id_gejala;
					$data['gejala_dipilih'][] = $id_gejala;	
				}
				$this->proses_hitung($idg);
			// }
		} 
		$where = $this->session->userdata('id');
		$data['user'] = $this->Model_user->get_where($where);
		$data['title'] = "Hasil Diagnosa";
		// $this->session->set_flashdata('kurang', '<div class="alert alert-danger" role="alert"><strong>Pilih Minimal 2 Gejala!</strong></center></div>');

		$data['title'] = 'Zoonosis | Home';
		$this->load->view('member/v_header_member', $data);
		$this->load->view('member/v_hasil_diagnosa', $data);
		// $this->load->view('layout/v_footer');
	
	}

	function proses_hitung($data_gejala) 
	{
		if(count($data_gejala) > 1)
		{
			$_SESSION['total'] = 2;
			//MENGAMBIL PENYAKIT GEJALA
			foreach ($data_gejala as $k => $v) {
				$trg = $this->Model_rules->ambil_rules_gejala($v);
				foreach ($trg as $key_trg => $value_trg) {
					$penyakit_gejala[$value_trg['id_gejala']]['penyakit'][] = $value_trg['kode_penyakit'];
					$penyakit_gejala[$value_trg['id_gejala']]['cf'] = $value_trg['cf'];	
				}
			}	

			//MENGUBAH ID_GEJALA MENJADI KEY BIASA
			foreach ($penyakit_gejala as $id_gejala => $value) {
				$dataawal[] = $value;
			}

			$jumlahgejala = count($dataawal);

			//MENGUBAH DATAWAL MENJADI DATA UNTUK PERHITUNGAN
			foreach ($dataawal as $key => $value) {
				$keyubah = implode($value['penyakit'], ", ");
				$datahitung[$key][$keyubah] = $value['cf'];
				$datahitung[$key]['teta'] = 1 - $value['cf'];

				$datax[] = $datahitung; 		
			}

			unset($_SESSION['kombinasi']);

			for ($i = 0; $i < $jumlahgejala-1; $i++) {
				if (empty($_SESSION['kombinasi']) OR !isset($_SESSION['kombinasi'])) {
					$datala[0] = $datahitung[0];
					$datala[1] = $datahitung[1];
					$_SESSION['kombinasi'][0]['dataawal'] = $datala;	

					$this->perhitungankombinasi($_SESSION['kombinasi'], 0);
				} else {
					$datala[0] = $_SESSION['kombinasi'][$i-1]['jumlahakhir'];
					$datala[1] = $datahitung[$i+1];
					$_SESSION['kombinasi'][$i]['dataawal'] = $datala;
					
					$this->perhitungankombinasi($_SESSION['kombinasi'], $i);
				}
			}
		}	
		else 
		{
			unset($_SESSION['kombinasi']);
			$_SESSION['total'] = 1;

			$get_gejala = $this->Model_gejala->get_where($data_gejala[0]);
			$get_rules = $this->Model_rules->ambil_rules_gejala($data_gejala[0]);

			$_SESSION['satu_gejala']['nama_gejala'] = $get_gejala->nama_gejala;

			$_SESSION['penyakit'] = array();

			foreach ($get_rules as $key => $row) {
				array_push($_SESSION['penyakit'], $row);
			}

			// echo '<pre>';
			// print_r($_SESSION['penyakit']);
			// echo '</pre>';

		}
	}

	function perhitungankombinasi($dataxxx, $i)	
	{
		//MENENTUKAN DENSITAS AWAL (M)
		foreach ($dataxxx[$i]['dataawal']['0'] as $kolom_baris => $value_baris) {
			foreach ($dataxxx[$i]['dataawal']['1'] as $kolom_key => $value_kolom) {
				$data2a[$kolom_key][$kolom_baris] = $value_baris*$value_kolom;
			}
		}

		//MENGUBAH KEY PERKALIAN
		foreach ($data2a as $key_1 => $value_1) {
			foreach ($value_1 as $key_2 => $value_2) {
				if($key_1!=="teta" AND $key_2!=="teta") {
					$array_1 = explode(", ", $key_1);
					$array_2 = explode(", ", $key_2);
					$array_sama = array_intersect($array_1, $array_2);

					if (!empty($array_sama)) {
						$key_3 = implode($array_sama, ", ");

						$data3a[][$key_3] = $value_2;
						$data2a1[$key_1][$key_2] = $key_3;
					} else {
						$data3a[]['konflik'] = $value_2;
						$data2a1[$key_1][$key_2] = 'konflik';
					}
				} elseif ($key_1!=="teta" AND $key_2=="teta") {
					$data3a[][$key_1] = $value_2;
					$data2a1[$key_1][$key_2] = $key_1;
				} elseif($key_1=="teta" AND $key_2!=="teta") {
					$data3a[][$key_2] = $value_2;
					$data2a1[$key_1][$key_2] = $key_2;
				} else {
					$data3a[]['teta'] = $value_2;
					$data2a1[$key_1][$key_2] = "teta";
				}
			}	
		}	

		//MENGUBAH KEY PERKALIAN 2
		foreach ($data3a as $key_1 => $value_1) {
			foreach ($value_1 as $key_2 => $value_2) {
				$data4a[$key_2][$key_1] = $value_2;
			}	
		}

		//MENJUMLAHKAN BERDASARKAN KEY
		foreach ($data4a as $key_1=>$value_1) {
			$data5a[$key_1] = 0;
			foreach ($value_1 as $key_2 => $value_2) {
				$data5a[$key_1] += $value_2;
			}	
		}

		//MENGURANGI DATA PENYAKIT DENGAN KONFLIK DAN MENGHILANGKAN KONFLIK
		foreach ($data5a as $key_1 => $value_1) {
			if(!empty($data5a['konflik'])) {
				$jumlahkonflik = $data5a['konflik'];
			} else {
				$jumlahkonflik = 0;
			}

			if($key_1!=='konflik') {
				$data6a[$key_1] = $value_1/(1-$jumlahkonflik);
			}
		}

		//MEMBUAT RUMUS DEMPSTER
		foreach ($data4a as $key_1 => $value_1) {
			foreach ($value_1 as $key_2 => $value_2) {
				$datapembulatan[$key_1][$key_2] = round($value_2, 3);		
			}	
		}

		foreach ($datapembulatan as $key_1 => $value_1) {
			if(!empty($data5a['konflik'])){
				$jumlahkonflik = round($data5a['konflik'], 3);
			} else {
				$jumlahkonflik = 0;
			}

			if($key_1!=='konflik') {
				$rumusjumlah = implode($value_1, " + ");
				$data7a[$key_1][0] = "(".$rumusjumlah.") / (1 - ".$jumlahkonflik.")";
				$data7a[$key_1][1] = round($data5a[$key_1], 3)." / ".(1-$jumlahkonflik);
			}
		}

		//MENYIMPAN DATA KEDALAM SESSION
		$_SESSION['kombinasi'][$i]['perkalian'] 		= $data2a;
		$_SESSION['kombinasi'][$i]['irisan'] 				= $data2a1;
		$_SESSION['kombinasi'][$i]['ubahkey1'] 			= $data3a;
		$_SESSION['kombinasi'][$i]['ubahkey2'] 			= $data4a;
		$_SESSION['kombinasi'][$i]['penjumlahan'] 	= $data5a;
		$_SESSION['kombinasi'][$i]['jumlahakhir'] 	= $data6a;
		$_SESSION['kombinasi'][$i]['rumus'] 				= $data7a;

		

	}	


}

/* End of file Dempster.php */
/* Location: ./application/controllers/Dempster.php */