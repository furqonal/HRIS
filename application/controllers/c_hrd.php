<?php

class C_hrd extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function index()
	{
		$data = $this->session->all_userdata();
		if (count($data) <= 1) {
			$this->load->view('v_login');
			// print_r($data);
		}else{
			$data['link'] = 'Dashboard';
			$data['dashboard'] = 'active';
			$data['data_personal'] = '';
			$data['pengalaman_kerja'] = '';
			$data['manajemencuti'] = '';
			$data['manajemenperjalanandinas'] = '';
			$data['jobprofile'] = '';
			$data['info_user'] = $this->session->all_userdata();
			$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
			$data['dataUpdatePersonal'] = $this->m_user->getPengajuanDataPersonal();
			$data['jabatan'] = $this->m_user->getData('sys_jabatan');
			$data['info_user'] = $this->session->all_userdata();
			$this->load->view('template/header',$data);
			$this->load->view('hrd/v_dashboard_hrd',$data);
			$this->load->view('template/footer');
		}
		
	}

	public function v_pengajuan_dataPersonal(){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['data_personal'] = 'active';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenperjalanandinas'] = '';
		$data['jobprofile'] = '';
		$data['sppd_online'] = '';
		$data['komp_dev'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['dataUpdatePersonal'] = $this->m_user->getPengajuanDataPersonal();
		$data['jabatan'] = $this->m_user->getData('sys_jabatan');
		$this->load->view('template/header',$data);
		$this->load->view('hrd/v_pengajuan_dataPersonal',$data);
		$this->load->view('template/footer');
		
	}

	public function tambah_karyawan(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama = $this->input->post('nama');
		$nip = $this->input->post('nip');
		$jabatan = $this->input->post('jabatan');

		$checkDataUser = $this->m_user->getData('user');
		$checkDataKaryawan = $this->m_user->getData('ms_data_karyawan');

		foreach ($checkDataUser as $row ) {
			if ($row->username == $username) {
				$this->session->set_flashdata('failed', 'Username sudah terpakai');
				redirect('c_hrd/v_pengajuan_dataPersonal');
			} else {
				foreach ($checkDataKaryawan as $x) {
					if ($x->nip == $nip) {
						$this->session->set_flashdata('failed', 'NIP sudah terpakai');
						redirect('c_hrd/v_pengajuan_dataPersonal');
					}
				}
			}
		}


		$dataUser = array(
				'username' => $username,
				'password' => $password,
				'id_tipe_user' => $jabatan
			);

		$this->m_user->insert('user', $dataUser);

		$newdata = $this->m_user->getNewData('user');

		foreach ($newdata as $key) {
		}

		$dataPersonal = array(
				'nip' => $nip,
				'nama' => $nama,
				'user_id' => $key->id_user,
				'sys_jabatan_id' => $jabatan
			);

		$this->m_user->insert('ms_data_karyawan', $dataPersonal);

		$dataCuti = array(
				'nip' => $nip,
				'tahunan' => 12,
				'alasan_penting' => 7,
				'sakit' => 3,
				'melahirkan' => 90,
				'besar' => 45,
				'keguguran' => 45,
				'diluar_tanggungan_yayasan' => 90
			);

		$result = $this->m_user->insert('ms_jatah_cuti', $dataCuti);


		if ($result == TRUE) {
			$this->session->set_flashdata('success', 'Tambah karyawan berhasil');
			redirect('c_hrd/v_pengajuan_dataPersonal');
		} else {
			$this->session->set_flashdata('failed', 'Tambah karyawan gagal');			
		}
	}

	public function v_pengajuan_cuti(){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = 'active';
		$data['manajemenperjalanandinas'] = '';
		$data['jobprofile'] = '';
		$data['sppd_online'] = '';
		$data['komp_dev'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['dataUpdatePersonal'] = $this->m_user->getPengajuanDataPersonal();
		$data['dataCuti'] = $this->m_user->getDataCuti('Sudah disetujui','Sudah disetujui');
		$this->load->view('template/header',$data);
		$this->load->view('hrd/v_pengajuan_cuti',$data);
		$this->load->view('template/footer');
	}

	public function v_pengajuan_perjalanan_dinas(){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenperjalanandinas'] = 'active';
		$data['jobprofile'] = '';
		$data['sppd_online'] = '';
		$data['komp_dev'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['dataUpdatePersonal'] = $this->m_user->getPengajuanDataPersonal();
		$data['dataPPD'] = $this->m_user->getDataPPD('Sudah disetujui','Sudah disetujui');
		$this->load->view('template/header',$data);
		$this->load->view('hrd/v_pengajuan_perjalanan_dinas',$data);
		$this->load->view('template/footer');
	}

	public function cetak_suratPPD($id_pengajuan){

		$data['dataPPD'] = $this->m_user->getDetailPPD($id_pengajuan);

		$where = array(
				'id_perjalanandinas' => $id_pengajuan
			);

		$whereStatus = array(
				'id_perjalanan_dinas' => $id_pengajuan
			);

		$dataStatus = array(
				'status' => "Expired"
			);

		$this->m_user->update($whereStatus, $dataStatus, 'rel_manajemen_perjalanan_dinas');


		$data['anggotaPPD'] = $this->m_user->getDataAnggotaPPD($where);

		$this->load->view('hrd/cetak_suratPPD',$data);

	}

	public function cetak_suratCuti($nip,$id_cuti){

		$where = array(
				'nip' => $nip
			);

		$whereStatus = array(
				'id_pengajuan_cuti' => $id_cuti
			);

		$dataStatus = array(
				'status' => "Expired"
			);

		$this->m_user->update($whereStatus, $dataStatus, 'rel_manajemen_cuti');

		$data['pengajuanCuti'] = $this->m_user->getPengajuanDataCuti($nip);
		$data['jatahCuti'] = $this->m_user->getDataById('ms_jatah_cuti', $where);

		$this->load->view('hrd/cetak_suratPengajuanCuti', $data);

		//print($data['pengajuanCuti']);
	}

	public function a_persetujuanDataPersonal(){
		$id = $this->input->post('id');
		$nip = $this->input->post('nip');
		$persetujuan = $this->input->post('persetujuan');

		if ($persetujuan == "Tidak disetujui") {

			$where = array(
					'id_pengajuan' => $id
				);

			$status = array(
					'status' => $persetujuan
				);

			$statusPengajuan = $this->m_user->update($where, $status, 'ms_data_update_karyawan');


		} elseif ($persetujuan == "Sudah disetujui") {

			$dataBaru = $this->m_user->getPengajuanDataPersonalById($id);

			foreach ($dataBaru as $key) {
				$dataPersonal=array(
	    			'nip' => $key->nip,
					'nama' => $key->nama,
					'nik' => $key->nik,
					'unit' => $key->unit,
					'status_karyawan' => $key->status_karyawan,
					'tempat_lahir' => $key->tempat_lahir,
					'tgl_lahir' => $key->tgl_lahir,
					'nama_anak1' => $key->nama_anak1,
					'nama_anak2' => $key->nama_anak2,
					'nama_anak3' => $key->nama_anak3,
					'alamat_rumah' => $key->alamat_rumah,
					'notlp_rumah' => $key->notlp_rumah,
					'sys_jabatan_id' => $key->sys_jabatan_id,
					'nohp' => $key->nohp,
					'email' => $key->email,
					'alamat_ortu' => $key->alamat_ortu,
					'perguruan_tinggi' => $key->perguruan_tinggi,
					'level' => $key->level,
					'jurusan' => $key->jurusan,
					'nama_ibu_kandung' => $key->nama_ibu_kandung,
					'nama_bapak_kandung' => $key->nama_bapak_kandung,
					'norek_gaji' => $key->norek_gaji,
					'bank_gaji' => $key->bank_gaji,
					'tgl_mulai_kerja' => $key->tgl_mulai_kerja,
					'tgl_capeg' => $key->tgl_capeg,
					'tgl_penglap' => $key->tgl_penglap,
	    			'foto' => $key->foto
	    		);

	    		$datacoba = array(
					'nama' => "coba"
					);
				}

				$where = array(
				 'nip' => $nip
				);

				$whereStatus = array(
					'id_pengajuan' => $id
				);

				$status = array(
					'status' => $persetujuan
				);

				$result = $this->m_user->update($where,$dataPersonal,'ms_data_karyawan');
				$statusPengajuan = $this->m_user->update($whereStatus, $status, 'ms_data_update_karyawan');

		}

		
	 	redirect('c_hrd');
		//print_r($persetujuan);
	}

	public function v_pengajuan_pengalamanKerja(){

		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = 'active';
		$data['manajemencuti'] = '';
		$data['manajemenperjalanandinas'] = '';
		$data['jobprofile'] = '';
		$data['sppd_online'] = '';
		$data['komp_dev'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['dataPengalamanKerja'] = $this->m_user->getDataPengalmanKerja();
		$data['dataPelatihan'] = $this->m_user->getDataPelatihan();
		$data['jabatan'] = $this->m_user->getData('sys_jabatan');
		$this->load->view('template/header',$data);
		$this->load->view('hrd/v_pengalaman_kerja',$data);
		$this->load->view('template/footer');


	}

	public function a_persetujuanPengalamanKerja(){

		$persetujuan = $this->input->post('persetujuan');

		$id_penglamankerja = $this->input->post('idpengalamankerja');

		$where = array(
				'id_pengalamankerja' => $id_penglamankerja
			);

		$dataStatus = array(
				'status' => $persetujuan
			);

		$result = $this->m_user->update($where, $dataStatus, 'rel_pengalaman_kerja');

		redirect('c_hrd');
		
	}

	public function a_persetujuanPelatihan(){

		$persetujuan = $this->input->post('persetujuan');

		$id_pelatihan = $this->input->post('idpelatihan');

		$where = array(
				'id_pelatihan' => $id_pelatihan
			);

		$dataStatus = array(
				'status' => $persetujuan
			);

		$result = $this->m_user->update($where, $dataStatus, 'rel_pelatihan');

		redirect('c_hrd');

	}

	public function fetch(){

		$result = $this->m_user->fetch()->result();
		$count = $this->m_user->fetch()->num_rows();
		$output = '';

		if($count > 0){
			$output .='
				<li>
					<a href="#">
					<strong>"test"</strong>
					<small><em>"test"</em></small>
					</a>
				</li>
			';
		}else{
			$output .='
				<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>
			';
		}

		$where = array(
				'status_seen' => 0
			);
		$result_1 = $this->m_user->getDataById('rel_pengalaman_kerja', $where);
		$count_1 = count($result_1);
		$data = array(
				'notifiication' => $output,
				'unseen_notification' => $count_1
			);
		print_r($count);
		echo json_encode($data);
	}

	// tambahan kodingan TM
	public function tambah_job_profile(){

		$data['link'] = 'Dashboard';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenperjalanandinas'] = '';
		$data['jobprofile'] = 'active';
		$data['info_user'] = $this->session->all_userdata();
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['dataJobProfile'] = $this->m_user->getJobProfile();
		$data['jabatan'] = $this->m_user->getData('sys_jabatan');
		$data['info_user'] = $this->session->all_userdata();
		$this->load->view('template/header',$data);
		$this->load->view('hrd/v_job_profile',$data);
		$this->load->view('template/footer');
		// print_r($data['dataJobProfile']);
	}

	public function detail_job_profile($id){
		$data['link'] = 'Dashboard';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenperjalanandinas'] = '';
		$data['jobprofile'] = 'active';
		$data['info_user'] = $this->session->all_userdata();
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['dataJobProfileByid'] = $this->m_user->getJobProfileById($id);
		$data['dataTugaspokok'] = $this->m_user->getTugasPokok($id);
		$data['dataIndikatorKeberhasilan'] = $this->m_user->getIndikatorKeberhasilan($id);
		$data['dataKompetensiInti'] = $this->m_user->getkompetensiInti($id);
		$data['dataKualitasPersonal'] = $this->m_user->getKualitasPersonal($id);
		$data['dataKeahlianPengetahuan'] = $this->m_user->getKeahlianPengetahuan($id);
		$data['jabatan'] = $this->m_user->getData('sys_jabatan');
		$data['info_user'] = $this->session->all_userdata();
		$this->load->view('template/header',$data);
		$this->load->view('hrd/v_detail_job_profile',$data);
		$this->load->view('template/footer');
		// print_r($data['dataJobProfileByid']);
		// print_r($data['dataJobProfileByid']);
		// print_r($data['dataTugaspokok']);		
	}

	public function tambah_data_job_profile(){
		$data['link'] = 'Dashboard';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenperjalanandinas'] = '';
		$data['jobprofile'] = 'active';
		$data['info_user'] = $this->session->all_userdata();
		$data['list_komp'] = $this->m_user->list_comp();
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['jabatan'] = $this->m_user->getData('sys_jabatan');
		$data['info_user'] = $this->session->all_userdata();
		$this->load->view('template/header',$data);
		$this->load->view('hrd/v_tambah_job_profile',$data);
		$this->load->view('template/footer');
		// echo "tambah data";
	}

	//FURQON
	//FURQON
	public function v_hrd_performa(){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['job_profile'] = 'active';
		$data['komp_appraisal'] = '';
		$data['komp_dev'] = '';
		$data['hrd_performa'] = 'active';
		$data['performa_target'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$data['data_user'] = $this->m_user->get_user_karyawan();
		$where = array('username'=>$this->session->userdata('username'));
		$data['tipe_user'] = $this->m_user->tipe_user_join($where);
	
		$this->load->view('template/header',$data);
		$this->load->view('v_hrd_performa_atasan');
		$this->load->view('template/footer');
	}

	public function simpan(){
		$nama_karyawan=$this->input->post('nm_karyawan');
		$posisi=$this->input->post('posisi_kar');
		$sku=$this->input->post('inp_sku');		
		$tipe=$this->input->post('inp_tipe');
		$satuan=$this->input->post('inp_satuan');
		$bobot=$this->input->post('inp_bobot');
		$waktu=$this->input->post('inp_waktu');
		$target=$this->input->post('inp_target');
		$data=array(
			'id_user'=>$nama_karyawan,
			'posisi'=>$posisi,
			'sku'=>$sku,			
			
			
		);
		//nyimpan ke performa appraisal
		$this->m_user->input_performa_app($data);
			
			function proses_indikator($id_user)
			{
				$ci = & get_instance();
				$indikator=$ci->input->post('inp_indk');	
				$tipe=$ci->input->post('inp_tipe');	
				$satuan=$ci->input->post('inp_satuan');	
				$bobot=$ci->input->post('inp_bobot');	
				$waktu=$ci->input->post('inp_waktu');	
				$target=$ci->input->post('inp_target');	

				reset($indikator);
				while (list($key, $value) = each($indikator)) 
				{
					$nm_indikator	=$ci->input->post('inp_indk')[$key];								
					$data=array(
							'id_user'=>$id_user,
							'indikator'=>$nm_indikator
					);
					$id_indikator = $ci->m_user->input_indikator($data);		
					$nm_tipe	=$ci->input->post('inp_tipe')[$key];								
					$data=array(
							'id_indikator' =>$id_indikator,
							'id_user'=>$id_user,
							'tipe'=>$nm_tipe
					);
					$ci->m_user->input_tipe($data);
					$nm_target	=$ci->input->post('inp_target')[$key];								
								$data=array(
									'id_indikator' =>$id_indikator,
									'id_user'=>$id_user,
									'target'=>$nm_target
								);
								$ci->m_user->input_target($data);
				}
				
				reset($satuan);
				while (list($key, $value) = each($satuan)) 
					{
						$nm_satuan	=$ci->input->post('inp_satuan')[$key];								
						$data=array(
							'id_user'=>$id_user,
							'satuan'=>$nm_satuan
						);
						$ci->m_user->input_satuan($data);
					}


				reset($bobot);
				while (list($key, $value) = each($bobot)) 
					{
						$nm_bobot	=$ci->input->post('inp_bobot')[$key];								
						$data=array(
							'id_user'=>$id_user,
							'bobot'=>$nm_bobot
						);
						$ci->m_user->input_bobot($data);
					}

				reset($waktu);
				while (list($key, $value) = each($waktu)) 
					{
						$nm_waktu	=$ci->input->post('inp_waktu')[$key];								
						$data=array(
							'id_user'=>$id_user,
							'waktu'=>$nm_waktu
						);
						$ci->m_user->input_waktu($data);
					}

			}
			proses_indikator($nama_karyawan);		
			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Sudah Disimpan');
		    window.location.href='index';
		    </script>");	
	}	

	public function komp_dev(){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['job_profile'] = '';
		$data['komp_appraisal'] = '';
		$data['komp_dev'] = 'active';
		$data['hrd_performa']='';
		$data['performa_target'] = '';
		$where = array('username'=>$this->session->userdata('username'));
		$data['tipe_user'] = $this->m_user->_join($where);
		$data['info_user'] = $this->session->all_userdata();
		$data['nilai_komp'] = $this->m_user->get_all_nilai_komp();
		$data['data_karyawan'] = $this->m_user->data_kar()->result();
		$data['kompetensi'] = $this->m_user->data_kompetensi()->result();
		$data['komp'] = $this->m_user->komp_dev();
		$this->load->view('template/header',$data);
		$this->load->view('v_komp_dev', $data);
		$this->load->view('template/footer');

		


	}
}
?>
