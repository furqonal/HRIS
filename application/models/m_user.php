<?php 

class M_user extends CI_Model{

	public function cek_login($username,$password){
		$this->db->select('*');
		$this->db->from('user a');
		$this->db->join('sys_jabatan b', 'a.id_tipe_user = b.id_jabatan');
		$this->db->join('ms_data_karyawan c', 'a.id_user = c.user_id');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get()->result();
	}

	public function getData($table){
		$this->db->select('*');
		$this->db->from($table);

		return $this->db->get()->result();
	}

	public function getDataById($table, $where){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->get()->result();
	}

	public function getDataPersonal($id){
		$this->db->select('*');
		$this->db->from('user a');
		$this->db->join('ms_data_karyawan b', 'a.id_user = b.user_id');
		$this->db->join('sys_jabatan c', ' b.sys_jabatan_id = c.id_jabatan');
		$this->db->where('id_user', $id);

		return $this->db->get()->result();
	}

	public function getPengajuanDataPersonal(){
		$this->db->select('*');
		$this->db->from('ms_data_update_karyawan a');
		$this->db->join('sys_jabatan b', 'a.sys_jabatan_id = b.id_jabatan');

		return $this->db->get()->result();
	}

	public function getJobProfile(){
		$this->db->select('*');
		$this->db->from('ms_job_profile');
		return $this->db->get()->result();
	}

	public function getJobProfileByid($id){
		$this->db->select('*');
		$this->db->from('ms_job_profile');
		$this->db->where('id_job_profile', $id);
		return $this->db->get()->result();
	}

	public function getTugasPokok($id){
		$this->db->select('*');
		$this->db->from('rel_tugas_pokok');
		$this->db->where('id_job_profile', $id);
		return $this->db->get()->result();
	}

	public function getIndikatorKeberhasilan($id){
		$this->db->select('*');
		$this->db->from('rel_indikator_keberhasilan');
		$this->db->where('id_job_profile', $id);
		return $this->db->get()->result();
	}

	public function getKompetensiInti($id){
		$this->db->select('*');
		$this->db->from('rel_kompetensi_inti');
		$this->db->where('id_job_profile', $id);
		return $this->db->get()->result();
	}

	public function getKualitasPersonal($id){
		$this->db->select('*');
		$this->db->from('rel_kualitas_personal');
		$this->db->where('id_job_profile', $id);
		return $this->db->get()->result();
	}

	public function getKeahlianPengetahuan($id){
		$this->db->select('*');
		$this->db->from('rel_keahlian_pengetahuan');
		$this->db->where('id_job_profile', $id);
		return $this->db->get()->result();
	}

	public function getPengajuanDataPersonalById($id){
		$this->db->select('*');
		$this->db->from('ms_data_update_karyawan a');
		$this->db->join('sys_jabatan b', 'a.sys_jabatan_id = b.id_jabatan');
		$this->db->where('id_pengajuan', $id);

		return $this->db->get()->result();
	}

	public function getDataPengalmanKerja(){
		$this->db->select('*');
		$this->db->from('rel_pengalaman_kerja a');
		$this->db->join('ms_data_karyawan b', 'a.ms_karyawan_id = b.nip');
		$this->db->join('sys_jabatan c', 'b.sys_jabatan_id = c.id_jabatan');
	
		return $this->db->get()->result();
	}

	public function getDataPelatihan(){
		$this->db->select('*');
		$this->db->from('rel_pelatihan a');
		$this->db->join('ms_data_karyawan b', 'a.ms_karyawan_id = b.nip');
		$this->db->join('sys_jabatan c', 'b.sys_jabatan_id = c.id_jabatan');
	
		return $this->db->get()->result();
	}

	public function getDataCutiAtasan1($status){
		$this->db->select('*');
		$this->db->from('rel_manajemen_cuti a');
		$this->db->join('ms_cuti b', 'a.ms_cuti_id = b.id_cuti');
		$this->db->join('ms_data_karyawan c', 'a.ms_karyawan_id = c.nip');
		$this->db->where('p_ataasan1', $status);

		return $this->db->get()->result();
	}

	public function getDataCutiAtasan2($status){
		$this->db->select('*');
		$this->db->from('rel_manajemen_cuti a');
		$this->db->join('ms_cuti b', 'a.ms_cuti_id = b.id_cuti');
		$this->db->join('ms_data_karyawan c', 'a.ms_karyawan_id = c.nip');
		$this->db->where('p_ataasan2', $status);

		return $this->db->get()->result();
	}

	public function getDataCuti($atasan1, $atasan2){
		$this->db->select('*');
		$this->db->from('rel_manajemen_cuti a');
		$this->db->join('ms_cuti b', 'a.ms_cuti_id = b.id_cuti');
		$this->db->join('ms_data_karyawan c', 'a.ms_karyawan_id = c.nip');
		$this->db->where('p_ataasan1', $atasan1);
		$this->db->where('p_ataasan2', $atasan2);

		return $this->db->get()->result();
	}

	public function getDataPPD($atasan1, $atasan2){
		$this->db->select('*');
		$this->db->from('rel_manajemen_perjalanan_dinas a');
		$this->db->join('ms_data_karyawan b', 'a.ms_karyawan_id = b.nip');
		$this->db->where('p_atasan1', $atasan1);
		$this->db->where('p_atasan2', $atasan2);

		return $this->db->get()->result();
	}

	public function getDataPerjalananDinas($atasan, $persetujuan){
		$this->db->select('*');
		$this->db->from('rel_manajemen_perjalanan_dinas a');
		$this->db->join('ms_data_karyawan b', 'a.ms_karyawan_id = b.nip');
		$this->db->where($atasan,$persetujuan);

		return $this->db->get()->result();
	}

	public function getPengajuanDataCuti($nip){
		$this->db->select('*');
		$this->db->from('rel_manajemen_cuti a');
		$this->db->join('ms_data_karyawan b','b.nip = a.ms_karyawan_id');
		$this->db->join('sys_jabatan c','b.sys_jabatan_id = c.id_jabatan');
		$this->db->join('ms_cuti d', 'a.ms_cuti_id = d.id_cuti');
		$this->db->where('b.nip',$nip);

		return $this->db->get()->result();
	}

	public function update($where,$data,$table){
		 $this->db->where($where);
    	 $this->db->update($table,$data);

    	 return TRUE;
	}

	public function insert($table,$data){
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function fetch(){
		$this->db->select('*');
		$this->db->from('rel_pengalaman_kerja');
		$this->db->order_by('id_pengalamankerja', 'DESC');
		$this->db->limit('id_pengalamankerja', 4);

		return $this->db->get();

	}

	public function getNewData($table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by('id_user','DESC');
		$this->db->LIMIT('1');

		return $this->db->get()->result();
	}

	public function cekStatusCuti($where){
		$this->db->select('*');
		$this->db->from('rel_manajemen_cuti');
		$this->db->where($where);
		$this->db->order_by('id_pengajuan_cuti', 'DESC');
		$this->db->LIMIT('1');

		return $this->db->get()->result();

	}

	public function getNewPPD(){
		$this->db->select('*');
		$this->db->from('rel_manajemen_perjalanan_dinas');
		$this->db->order_by('id_perjalanan_dinas', 'DESC');
		$this->db->LIMIT('1');

		return $this->db->get()->result();

	}

	public function getDataAnggotaPPD($where){
		$this->db->select('*');
		$this->db->from('rel_anggota_perjalanandinas a');
		$this->db->join('ms_data_karyawan b','a.nip = b.nip');
		$this->db->where($where);

		return $this->db->get()->result();
	}

	public function getDetailCuti($where){
		$this->db->select('*');
		$this->db->from('rel_manajemen_cuti a');
		$this->db->join('ms_data_karyawan b','b.nip = a.ms_karyawan_id');
		$this->db->join('sys_jabatan c','b.sys_jabatan_id = c.id_jabatan');
		$this->db->join('ms_cuti d', 'a.ms_cuti_id = d.id_cuti');
		$this->db->where('a.id_pengajuan_cuti',$where);

		return $this->db->get()->result();

	}

	public function getDetailPPD($where){
		$this->db->select('*');
		$this->db->from('rel_manajemen_perjalanan_dinas a');
		$this->db->join('ms_data_karyawan b', 'a.ms_karyawan_id = b.nip');
		$this->db->join('sys_jabatan c', 'b.sys_jabatan_id = c.id_jabatan');
		$this->db->where('id_perjalanan_dinas', $where);

		return $this->db->get()->result();

	}

	public function getNewPPDAnggota($where){
		$this->db->select('*');
		$this->db->from('rel_manajemen_perjalanan_dinas');
		$this->db->where('ms_karyawan_id', $where);
		$this->db->order_by('id_perjalanan_dinas', 'ASC');
		$this->db->LIMIT('1');
		return $this->db->get()->result();
	}

	public function getJobProfileId($where){
		$this->db->select('id_job_profile');
		$this->db->from('ms_job_profile');
		$this->db->where('nama_jabatan', $where);
		return $this->db->get()->result();
	}

	public function getDataJobProfile(){
		$this->db->select('*');
		$this->db->from('ms_job_profile');
		$this->db->where('status', 0);
		return $this->db->get()->result();
	}

	public function acc_job_profile($id,$data){
		$this->db->where('id_job_profile', $id);
	    $this->db->update('ms_job_profile' ,$data);
	    return $this->db->affected_rows();
	}

	public function list_comp(){

		$this->db->select('*');
		$this->db->from('competency');
		$this->db->where('status',1);
		return $this->db->get()->result();
	}

	//DATABESE FURQON
	public function get($tabel){
		return $this->db->get_where($tabel);
	}

	public function input_nilai_komp($data){
		$this->db->insert('penilaian_kompetensi', $data);
	}

	//tdk dipakai?
	public function get_nilai_komp(){
		$this->db->select('nilai_komp');
		$this->db->from('penilaian_kompetensi');
		return $this->db->get()->result();		
	}

	public function get_all_nilai_komp(){
		$this->db->select('*');
		$this->db->from('penilaian_kompetensi');
		return $this->db->get()->result();		
	}

	public function performa(){
		
	$data = array(
    		'real' => $this->input->post('n_real'),
    			);
    
		$this->db->insert('performa_appraisal',$data);

	}

	//atasan
	public function get_all_nilai_app(){
		$this->db->select('*');
		$this->db->from('user a');
		$this->db->join('sys_jabatan b', 'a.id_tipe_user = b.id_jabatan');
		$this->db->join('ms_data_karyawan c', 'a.id_user = c.user_id');
		$this->db->join('performa_appraisal', 'a.id_user=performa_appraisal.id_user');	
		return $this->db->get()->result();		
	}

	public function get_selected_app($where){
		$this->db->from('real');
		$this->db->join('indikator', 'id_indikator');
		$this->db->where($where);
		// $this->db->limit(1);
		return $this->db->get()->result();
		//return $this->db->get_where('real', $where)->result();
	}

	public function get_selected_evidence($where){
		$this->db->from('user');
		$this->db->join('real', 'user.id_user=real.id_user');
		$this->db->where($where);
		return $this->db->get()->result();
		//return $this->db->get_where('real', $where)->result();
	}

	public function get_indikator(){
		$this->db->select('*');
		$this->db->from('indikator');
		return $this->db->get()->result();			
	}

	//karyawan
	public function get_indikator_real($where){
		$this->db->select('*');
		$this->db->from('indikator');
		$this->db->join('user', 'user.id_user=indikator.id_user');
		$this->db->where('username', $where);
		return $this->db->get();			
	}

	public function get_indikator_join($where){
		//$this->db->distinct();		
		$this->db->from('performa_appraisal');
		$this->db->join('indikator', 'performa_appraisal.id_user=indikator.id_user');
		$this->db->where($where);
		$this->db->group_by('id_indikator');

		return $this->db->get()->result();			
	}

	
	public function get_tipe(){
		$this->db->select('*');
		$this->db->from('tipe');
		return $this->db->get()->result();			
	}

	public function get_tipe_join($where){		
		$this->db->from('performa_appraisal');
		$this->db->join('tipe', 'performa_appraisal.id_user=tipe.id_user');
		$this->db->where($where);
		$this->db->group_by('id_tipe');
		return $this->db->get()->result();			
	}

	public function get_satuan(){
		$this->db->select('*');
		$this->db->from('satuan');
		return $this->db->get()->result();			
	}

	public function get_satuan_join($where){		
		$this->db->from('performa_appraisal');
		$this->db->join('satuan', 'performa_appraisal.id_user=satuan.id_user');
		$this->db->where($where);
		$this->db->group_by('id_satuan');
		return $this->db->get()->result();			
	}
	

	public function get_bobot(){
		$this->db->select('*');
		$this->db->from('bobot');
		return $this->db->get()->result();			
	}

	public function get_bobot_join($where){		
		$this->db->from('performa_appraisal');
		$this->db->join('bobot', 'performa_appraisal.id_user=bobot.id_user');
		$this->db->where($where);
		$this->db->group_by('id_bobot');
		return $this->db->get()->result();			
	}

	public function get_waktu(){
		$this->db->select('*');
		$this->db->from('waktu');
		return $this->db->get()->result();			
	}
	public function get_waktu_join($where){		
		$this->db->from('performa_appraisal');
		$this->db->join('waktu', 'performa_appraisal.id_user=waktu.id_user');
		$this->db->where($where);
		$this->db->group_by('id_waktu');
		return $this->db->get()->result();			
	}

	public function get_target(){
		$this->db->select('*');
		$this->db->from('target');
		return $this->db->get()->result();			
	}
	
	public function get_target_join($where){		
		$this->db->from('performa_appraisal');
		$this->db->join('target', 'performa_appraisal.id_user=target.id_user');
		$this->db->where($where);
		$this->db->group_by('id_target');
		return $this->db->get()->result();			
	}

	public function get_real(){
		$this->db->select('*');
		$this->db->from('real');
		return $this->db->get()->result();			
	}

	public function get_real_where($where){
		$this->db->select('*');
		$this->db->from('real');
		$this->db->join('user', 'id_user');
		$this->db->where($where);
		return $this->db->get()->result();			
	}

	public function get_update_real(){
		$this->db->select('*');
		$this->db->from('real');
		$where = array(
			'status' => 0
		);
		$this->db->where($where);
		return $this->db->get()->result();			
	}

	public function get_real_join($where){		
		$this->db->select('indikator.id_user, indikator.id_indikator, real, status, id_real');
		$this->db->from('performa_appraisal');
		$this->db->join('real', 'performa_appraisal.id_user=real.id_user');
		$this->db->join('indikator', 'id_indikator');
		$this->db->where($where);
		return $this->db->get()->result();			
	}

	/*public function get_evidence($where){	
		$this->db->select('evidence')	;
		$this->db->from('real');
		
		return $this->db->get()->result();			
	}*/


	//hrd
	public function input_performa_app($data){
		$this->db->insert('performa_appraisal', $data);
	}

	public function input_indikator($data){
		$this->db->insert('indikator', $data);
		return $this->db->insert_id();
	}

	public function input_tipe($data){
		$this->db->insert('tipe', $data);
	}
	public function input_satuan($data){
		$this->db->insert('satuan', $data);
	}

	public function input_bobot($data){
		$this->db->insert('bobot', $data);
	}

	public function input_waktu($data){
		$this->db->insert('waktu', $data);
	}

	public function input_target($data){
		$this->db->insert('target', $data);
	}

	
	public function input_real($data){
		$this->db->insert('real', $data);
	}

	//atasan
	public function update_nilai_real($where, $data){
		$this->db->where($where);
		return $this->db->update('real',$data);
	}

	//rumus nilai performa atasan
	public function cari_nilai($where){
		$this->db->select('*');
		$this->db->from('indikator');
		$this->db->join('tipe', 'indikator.id_indikator=tipe.id_indikator');
		$this->db->join('target', 'tipe.id_indikator=target.id_indikator');
		$this->db->join('real', 'target.id_indikator=real.id_indikator');
		$this->db->where($where);
		return $this->db->get()->result();
	}

	//harusnya ngambil ms data karyawan aja
	public function data_karyawan($where){		
		$this->db->from('ms_job_profile');
		$this->db->join('ms_data_karyawan', 
			'ms_job_profile.id_job_profile = ms_data_karyawan.id_job_profile');
		$this->db->where($where);
		return $this->db->get()->result();
	}

	public function komdev_karyawan($where){
		
		$this->db->select('pk.nip,c.nama_competency, mdk.nama, pk.nilai_komp,sum(nilai_komp) as total, pk.id_kompetensi,pk.tanggal, pk.status');
		$this->db->from('competency c');
		$this->db->join('penilaian_kompetensi pk','c.id_kompetensi = pk.id_kompetensi');
		$this->db->join('ms_data_karyawan mdk','pk.nip = mdk.nip');
		$this->db->where($where);
		$this->db->group_by("pk.id_kompetensi");
		$this->db->group_by("pk.tanggal", "desc");
		$this->db->order_by("tanggal");
		return $this->db->get()->result();

	}

		//oengembangan kompetensi hrd
	public function pengelompokan_kompetensi($where){		
		$this->db->distinct();	
		$this->db->select('pk.nip,c.nama_competency, mdk.nama, pk.nilai_komp,sum(nilai_komp) as total, pk.id_kompetensi,pk.tanggal,pk.status');
		// $this->db->from('kompetensi_karyawan kk');
		// $this->db->join('competency c','kk.id_kompetensi = c.id_kompetensi','left');
		// $this->db->join('ms_data_karyawan mdk','kk.nip = mdk.nip');
		// $this->db->join('penilaian_kompetensi pk','kk.id_kompetensi = pk.id_kompetensi');

		$this->db->from('competency c');
		$this->db->join('penilaian_kompetensi pk','c.id_kompetensi = pk.id_kompetensi');
		$this->db->join('ms_data_karyawan mdk','pk.nip = mdk.nip');
		/*$this->db->join('kompetensi_karyawan kk','pk.id_kompetensi = kk.id_kompetensi');*/
		$this->db->where($where);
		$this->db->group_by("pk.nip",  "desc");
		$this->db->group_by("pk.tanggal",  "desc");
		return $this->db->get()->result();
	}

	public function nilai_total ($where){		
		
		$this->db->select('pk.nilai_komp, sum(nilai_komp) as total');
		$this->db->from('penilaian_kompetensi pk');
		$this->db->where($where);
		$this->db->group_by("nip","id_kompetensi");
		return $this->db->get()->result();
	}

	//atasan modal nip
	public function data_komp_karyawan(){
		$this->db->distinct();
		$this->db->select('nama,ms_data_karyawan.nip as nip_karyawan,nilai_komp,max(tanggal) as tanggal');
		$this->db->from('ms_data_karyawan');
		$this->db->join('penilaian_kompetensi', 
			'penilaian_kompetensi.nip=ms_data_karyawan.nip',
			'left');
		$this->db->where('sys_jabatan_id', 4);
		$this->db->group_by('nama');
		return $this->db->get()->result();
	}

	/*public function data_kar_selected($where){
		return $this->db->get_where('ms_job_profile', $where);
	}*/

	//hrd
	public function data_kompetensi(){
		
		return $this->db->get('competency')->result();
	}

		//atasan
	public function data_kompetensi_where($where){
		$this->db->select('*');
		$this->db->from('ms_data_karyawan dk');
		$this->db->join('kompetensi_karyawan kk', 'dk.nip = kk.nip');
		$this->db->join('competency c', 'kk.id_kompetensi = c.id_kompetensi','left');
		$this->db->join('detail_kompetensi dek', 'c.id_kompetensi = dek.id_kompetensi');
		$this->db->where($where);
		return $this->db->get()->result();
	}

	//karyawan
	public function komp_dev(){
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('ms_data_karyawan dk');
		$this->db->join('penilaian_kompetensi pk', 'dk.nip=pk.nip');
		$this->db->join('competency c', 'pk.id_kompetensi=pk.id_kompetensi');
		$this->db->order_by("nilai_komp", "desc");
		return $this->db->get()->result();
	}

	//gakepake?

	// 

	// public function komp_dev_where($where){
	// 	$this->db->select('*');
	// 	$this->db->from('ms_job_profile');
	// 	$this->db->join('penilaian_kompetensi', 'ms_job_profile.nip=penilaian_kompetensi.nip');
	// 	$this->db->join('competency', 'penilaian_kompetensi.id_kompetensi=competency.id_kompetensi');
	// 	$this->db->where($where);
	// 	$this->db->order_by("nilai_komp", "desc");
	// 	return $this->db->get()->result();
	// }

		//fixgakepake
	// public function pengelompokan_komp_dev($id){
	// 	$this->db->select('*');
	// 	$this->db->from('ms_job_profile');
	// 	$this->db->join('penilaian_kompetensi', 'ms_job_profile.nip=penilaian_kompetensi.nip');
	// 	$this->db->join('competency', 'penilaian_kompetensi.id_kompetensi=competency.id_kompetensi');
	// 	$this->db->where('penilaian_kompetensi.id_kompetensi',$id);
	// 	return $this->db->get()->result();	
	// }

	public function pengelompokan_nilai($id){
		
		$this->db->select('*');
		$this->db->from('kompetensi_karyawan kk');
		$this->db->join('competency c', 'c.id_kompetensi=kk.id_kompetensi');
		$this->db->where('kk.id_kompetensi = '.$id);
		$this->db->join('penilaian_kompetensi pk', 'pk.nip=kk.nip');
		return $this->db->get()->result();
	}

	public function pengelompokan_karyawan(){
		
		$this->db->select('*');
		$this->db->from('kompetensi_karyawan kk');
		$this->db->join('penilaian_kompetensi pk','kk.id_kompetensi = pk.id_kompetensi','left');
		$this->db->join('competency c','c.id_kompetensi = pk.id_kompetensi');
		return $this->db->get()->result();	

	}

	//hrd
	public function get_user_karyawan(){
		
		$this->db->select('*');
		$this->db->from('ms_data_karyawan dk');
		$this->db->join('ms_job_profile jb','dk.id_job_profile=jb.id_job_profile');
		$this->db->where('sys_jabatan_id', 4);
		return $this->db->get()->result();
	}

	//karyawan
	//join with ms_data karyawan
	public function get_nilai_app_login($where){
		$this->db->select('*');
		$this->db->from('user a');
		$this->db->join('sys_jabatan b', 'a.id_tipe_user = b.id_jabatan');
		$this->db->join('ms_data_karyawan c', 'a.id_user = c.user_id');
		$this->db->join('performa_appraisal', 'a.id_user=performa_appraisal.id_user');
		$this->db->where('username',$where);
		$this->db->order_by("id_performa");
		return $this->db->get()->result();	
	}

	//gakepake?
	public function tipe_user($where){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($where);
		return $this->db->get()->result();
	}

	public function tipe_user_join($where){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('sys_jabatan', 'user.id_tipe_user = sys_jabatan.id_jabatan');
		$this->db->where($where);
		return $this->db->get()->result();	
	}

	public function update_status($where, $data){
		$this->db->where($where);
		return $this->db->update('penilaian_kompetensi', $data);
	}

	function get_rekomendasi_training($id,$total){
		$hasil=$this->db->query("SELECT DISTINCT c.nama_competency, mdk.nama, pk.nilai_komp, sum(nilai_komp) as total, mdk.nip FROM competency c JOIN penilaian_kompetensi pk ON c.id_kompetensi = pk.id_kompetensi JOIN ms_data_karyawan mdk ON pk.nip = mdk.nip WHERE pk.id_kompetensi = '$id' GROUP BY pk.nip, pk.tanggal having sum(nilai_komp) <= 6 order by tanggal limit 1");
		return $hasil->result_array();/*$hsl=$this->db->query("SELECT  FROM ms_data_karyawan JOIN penilaian_kompetensi using(nip) JOIN competency using(id_kompetensi) GROUP BY nip");
		return $hsl;*/
	}

	public function grafik(){
		$this->db->distinct();
		$this->db->select('nama,ms_data_karyawan.nip as nip_karyawan,nilai_komp,tanggal');
		$this->db->from('ms_data_karyawan');
		$this->db->join('penilaian_kompetensi', 
			'penilaian_kompetensi.nip=ms_data_karyawan.nip',
			'left');
		$this->db->where('sys_jabatan_id', 4);
		$this->db->group_by('nama');
		return $this->db->get()->result();
	}

	function report($where){

        $this->db->distinct();	
		$this->db->select('mdk.nama, pk.tanggal,c.nama_competency, sum(nilai_komp) as total');
		$this->db->from('competency c');
		$this->db->join('penilaian_kompetensi pk','c.id_kompetensi = pk.id_kompetensi');
		$this->db->join('ms_data_karyawan mdk','pk.nip = mdk.nip');


		$this->db->where($where);
		$this->db->group_by("pk.nip",  "desc");
		$this->db->group_by("pk.tanggal",  "desc");
		return $this->db->get()->result(); 
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    public function lihat_nilai($where){
		$this->db->select('pk.nip,c.nama_competency, mdk.nama, pk.nilai_komp,sum(nilai_komp) as total, pk.id_kompetensi,pk.tanggal, pk.status');
		$this->db->from('competency c');
		$this->db->join('penilaian_kompetensi pk','c.id_kompetensi = pk.id_kompetensi');
		$this->db->join('ms_data_karyawan mdk','pk.nip = mdk.nip');
		$this->db->where($where);
		$this->db->group_by("pk.id_kompetensi");
		$this->db->group_by("pk.tanggal", "desc");
		$this->db->order_by("tanggal");
		return $this->db->get()->result();


	}

}

?>