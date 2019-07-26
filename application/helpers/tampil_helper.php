<?php

function gejala($id) {
	// memanggil semua function milik ci
	$ci =&get_instance();

	$ci->db->where('id_gejala',$id);
	$ambil = $ci->db->get('gejala');
	$data = $ambil->row_array();
	return $data;
}

function penyakit($kode) {
	// memanggil semua function milik ci
	$ci =&get_instance();

	$ci->db->where('kode_penyakit',$kode);
	$ci->db->join('solusi','penyakit.id_solusi=solusi.id_solusi');
	$ambil = $ci->db->get('penyakit');
	$data = $ambil->row_array();
	return $data;	
}

// function history($kode) {
// 	$ci =& get_instance();

// 	$data = array(
// 		'kode_penyakit' => $kode,
// 		'tanggal' => date('Y-m-d'),
// 		'jam' => date('H:i:s')
// 	);

// 	$ci->M_history->insert($data);
// }

?>