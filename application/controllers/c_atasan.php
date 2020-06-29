<?php 

class c_atasan extends CI_Controller
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
			$data['manajemenjobprofile'] = '';
			$data['manajemenperjalanandinas'] = '';
			$data['sppd_online'] = '';
			$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
			$data['komp_dev'] = '';
			$data['info_user'] = $this->session->all_userdata();
			$this->load->view('template/header',$data);
			$this->load->view('atasan/v_dashboard_atasan',$data);
			$this->load->view('template/footer');
		}
		
	}

	public function persetujuanCuti(){
		$data['link'] = 'Dashboard';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = 'active';
		$data['manajemenjobprofile'] = '';
		$data['manajemenperjalanandinas'] = '';
		$data['sppd_online'] = '';
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['dataCuti'] = $this->m_user->getDataCutiAtasan1("Belum disetujui");
		$data['dataCuti2'] = $this->m_user->getDataCutiAtasan2("Belum disetujui");
		$data['komp_dev'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$this->load->view('template/header',$data);
		$this->load->view('atasan/v_pengajuan_cuti',$data);
		$this->load->view('template/footer');
	}

	public function persetujuanPerjalananDinas(){
		$data['link'] = 'Dashboard';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenjobprofile'] = '';
		$data['manajemenperjalanandinas'] = 'active';
		$data['sppd_online'] = '';
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['dataPerjalananDinas'] = $this->m_user->getDataPerjalananDinas('p_atasan1', "Belum disetujui");
		$data['dataPerjalananDinas2'] = $this->m_user->getDataPerjalananDinas('p_atasan2', "Belum disetujui");
		$data['komp_dev'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$this->load->view('template/header',$data);
		$this->load->view('atasan/v_pengajuan_perjalanan_dinas',$data);
		$this->load->view('template/footer');
		//print_r($data['dataPerjalananDinas2']);
	}

	public function manajemenjobprofile(){
		$data['link'] = 'Dashboard';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenjobprofile'] = 'active';
		$data['manajemenperjalanandinas'] = '';
		$data['sppd_online'] = '';
		$data['komp_dev'] = '';
		$data['jobprofile'] = $this->m_user->getDataJobProfile();
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['info_user'] = $this->session->all_userdata();
		$this->load->view('template/header',$data);
		$this->load->view('atasan/v_jobprofile_ajuan',$data);
		$this->load->view('template/footer');
		//print_r($data['dataPerjalananDinas2']);
	}

	public function update_job_profile($id){
		$data = array('status'=>1);
		$this->m_user->acc_job_profile($id,$data);
		redirect("c_atasan/manajemenjobprofile");
	}

	public function edit_jobprofile($id){
		$data['link'] = 'Dashboard';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenjobprofile'] = 'active';
		$data['manajemenperjalanandinas'] = '';
		$data['sppd_online'] = '';
		$data['komp_dev'] = '';
		$data['list_komp'] = $this->m_user->list_comp();
		$data['jobprofile'] = $this->m_user->getJobProfileByid($id);
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['info_user'] = $this->session->all_userdata();
		$this->load->view('template/header',$data);
		$this->load->view('atasan/v_edit_jobprofile',$data);
		$this->load->view('template/footer');
	}

	public function detail_job_profile($id){
		$data['link'] = 'Dashboard';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenperjalanandinas'] = '';
		$data['manajemenjobprofile'] = 'active';
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
		$this->load->view('atasan/v_detail_job_profile',$data);
		$this->load->view('template/footer');
		// print_r($data['dataJobProfileByid']);
		// print_r($data['dataJobProfileByid']);
		// print_r($data['dataTugaspokok']);		
	}

	public function a_persetujuanCuti(){
		$id_pengajuan_cuti = $this->input->post('id_pengajuan_cuti');
		$persetujuan = $this->input->post('persetujuan');

		$where = array(
				'id_pengajuan_cuti' => $id_pengajuan_cuti
			);

		if ($this->session->userdata('jabatan') == 1) {
			$dataPersetujuan = array(
				'p_ataasan1' => $persetujuan
			);
		} elseif ($this->session->userdata('jabatan') == 2) {
			$dataPersetujuan = array(
				'p_ataasan2' => $persetujuan
			);
		}

		$result = $this->m_user->update($where, $dataPersetujuan, 'rel_manajemen_cuti');

		
		$checkPersetujuan = $this->m_user->getDataById('rel_manajemen_cuti', $where);



		foreach ($checkPersetujuan as $key) {
		}


		if ($key->p_ataasan1 == "Sudah disetujui" && $key->p_ataasan2 == "Sudah disetujui") {
			//print_r($key->p_ataasan1);
			$jeniscuti = $key->ms_cuti_id;
			$lama_cuti = $key->lama_cuti;

			$dataStatus = array(
				'status' => "Disetujui"
			);

			$this->m_user->update($where,$dataStatus,'rel_manajemen_cuti');

			$where = array(
					'nip' => $key->ms_karyawan_id
				);	

			$checkJatah = $this->m_user->getDataById('ms_jatah_cuti', $where);

			foreach ($checkJatah as $wor) {
			}

			if ($jeniscuti == 1) {
				$jatah = $wor->tahunan - $lama_cuti;

				$where = array(
						'nip' => $key->ms_karyawan_id 
					);

				$jatahBaru = array(
						'tahunan' => $jatah
					);
				$this->m_user->update($where, $jatahBaru, 'ms_jatah_cuti');
			} elseif ($jeniscuti == 2) {
				$jatah = $wor->alasan_penting - $lama_cuti;

				$where = array(
						'nip' => $key->ms_karyawan_id 
					);

				$jatahBaru = array(
						'alasan_penting' => $jatah
					);
				$this->m_user->update($where, $jatahBaru, 'ms_jatah_cuti');
			} elseif ($jeniscuti == 3) {
				$jatah = $wor->sakit - $lama_cuti;

				$where = array(
						'nip' => $key->ms_karyawan_id 
					);

				$jatahBaru = array(
						'sakit' => $jatah
					);
			} elseif ($jeniscuti == 4) {
				$jatah = $wor->melahirkan - $lama_cuti;

				$where = array(
						'nip' => $key->ms_karyawan_id  
					);

				$jatahBaru = array(
						'melahirkan' => $jatah
					);
				$this->m_user->update($where, $jatahBaru, 'ms_jatah_cuti');

			} elseif ($jeniscuti == 5) {
				$jatah = $wor->besar - $lama_cuti;

				$where = array(
						'nip' => $key->ms_karyawan_id  
					);

				$jatahBaru = array(
						'besar' => $jatah
					);
				$this->m_user->update($where, $jatahBaru, 'ms_jatah_cuti');

			} elseif ($jeniscuti == 6) {
				$jatah = $wor->keguguran - $lama_cuti;

				$where = array(
						'nip' => $key->ms_karyawan_id 
					);

				$jatahBaru = array(
						'keguguran' => $jatah
					);
				$this->m_user->update($where, $jatahBaru, 'ms_jatah_cuti');

			} elseif ($jeniscuti == 7) {
				$jatah = $wor->diluar_tanggungan_yayasan - $lama_cuti;

				$where = array(
						'nip' => $key->ms_karyawan_id  
					);

				$jatahBaru = array(
						'diluar_tanggungan_yayasan' => $jatah
					);
				$this->m_user->update($where, $jatahBaru, 'ms_jatah_cuti');

			}
		}

		
		redirect('c_atasan');
	}

	public function a_persetujuanPerjalananDinas(){
		$id_pengajuan_perjalanan_dinas = $this->input->post('id_perjalanan_dinas');
		$persetujuan = $this->input->post('persetujuan');

		$where = array(
				'id_perjalanan_dinas' => $id_pengajuan_perjalanan_dinas
			);

		if ($this->session->userdata('jabatan') == 1) {
			$dataPersetujuan = array(
				'p_atasan1' => $persetujuan
			);
		}elseif ($this->session->userdata('jabatan') == 2) {
			$dataPersetujuan = array(
				'p_atasan2' => $persetujuan
			);
		}

		$result = $this->m_user->update($where, $dataPersetujuan, 'rel_manajemen_perjalanan_dinas');

		$cekStatus = $this->m_user->getDataById('rel_manajemen_perjalanan_dinas', $where);

		foreach ($cekStatus as $key) {
			
		}

		if ($key->p_atasan1 == "Sudah disetujui" && $key->p_atasan2 == "Sudah disetujui") {

			$dataStatus = array(
				'status' => "Disetujui"
			);

			$this->m_user->update($where,$dataStatus,'rel_manajemen_perjalanan_dinas');
			redirect('c_atasan');
			
			
		} else{
			redirect('c_atasan');
		}

	}

	public function detailCuti($id_cuti){

		$dataDetail = $this->m_user->getDetailCuti($id_cuti);

		foreach ($dataDetail as $key) {
			
		}									

		echo '
			<form method="POST" action="'.base_url().'c_atasan/a_persetujuanCuti">
			<div class="modal-body">
			<div class="form-group">
				<label class="control-label col-sm-3">NIP</label>
				<div class="col-sm-9">
					<label class="control-label">'.$key->nip.'</label>
					<input type="hidden" name="id_pengajuan_cuti" value="'.$key->id_pengajuan_cuti.'"></input>
				</div>
				<label class="control-label col-sm-3">Nama</label>
				<div class="col-sm-9">
					<label class="control-label">'.$key->nama.'</label>
				</div>
				<label class="control-label col-sm-3">Jenis Cuti</label>
				<div class="col-sm-9">
					<label class="control-label">'.$key->nama_cuti.'</label>
				</div>
				<label class="control-label col-sm-3">Tanggal Pengajuan</label>
				<div class="col-sm-9">
					<label class="control-label">'.$key->tgl_pengajuan.'</label>
				</div>
				<label class="control-label col-sm-3">Sampai Tanggal</label>
				<div class="col-sm-9">
					<label class="control-label">'.$key->sampai_tgl.'</label>
				</div>
				<label class="control-label col-sm-3">Persetujuan atasan 1</label>
				<div class="col-sm-9">
					<label class="control-label">'.$key->p_ataasan1.'</label>
				</div>
				<label class="control-label col-sm-3">Persetujuan atasan 2</label>
				<div class="col-sm-9">
					<label class="control-label">'.$key->p_ataasan2.'</label>
				</div>
			</div>
			</div>
			<div class="modal-footer">
				<button name="persetujuan" value="Sudah disetujui" class="btn btn-success">Setujui</button>
				<button name="persetujuan" value="Tidak disetujui" class="btn btn-danger">Tidak disetujui</button>
				
			</div>
			</form>

		';

	}

	public function detailDinas($id_dinas){

		$dataDetail = $this->m_user->getDetailPPD($id_dinas);

		foreach ($dataDetail as $key) {
			
		}									


		echo '
		<form method="POST" action="'.base_url().'c_atasan/a_persetujuanPerjalananDinas" >
			<div class="modal-body">
				<div class="form-group">
					<label class="control-label col-sm-3">NIP Pengaju</label>
					<div class="col-sm-9">
						<label class="control-label">'.$key->nip.'</label>
						<input type="hidden" name="id_perjalanan_dinas" value="'. $key->id_perjalanan_dinas.'"></input>
						
					</div>
					<label class="control-label col-sm-3">Nama Pengaju</label>
					<div class="col-sm-9">
						<label class="control-label">'.$key->nama.'</label>
					</div>
					<label class="control-label col-sm-12"> <strong>Anggota PPD</strong></label> ';
					

						$where = array(
								'id_perjalanandinas' => $key->id_perjalanan_dinas
							);

						$dataAnggota =  $this->m_user->getDataAnggotaPPD($where);

						if (empty($dataAnggota)) {
		echo '			<label class="control-label col-sm-12">&nbsp&nbsp&nbsp Tidak ada anggota </label>';
						} else {

						foreach ($dataAnggota as $row) {
						
		echo '			<label class="control-label col-sm-3">&nbsp&nbsp&nbsp NIP Anggota </label>
						<div class="col-sm-9">
							<label class="control-label">'.$row->nip.'</label>
						</div>
						<label class="control-label col-sm-3">&nbsp&nbsp&nbsp Nama Anggota </label>
						<div class="col-sm-9">
							<label class="control-label">'.$row->nama.'</label>
						</div> ';

						}
						}

		echo '		<br>
					<br>	

					<label class="control-label col-sm-3">Deskripsi Perjalanan</label>
					<div class="col-sm-9">
						<label class="control-label">'.$key->deskripsi_perjalanan.'</label>
					</div>
					<label class="control-label col-sm-3">Jenis Perjalanan Dinas</label>
					<div class="col-sm-9">
						<label class="control-label">'.$key->jenis_perjalan.'</label>
					</div>
					<label class="control-label col-sm-3">Kota Tujuan</label>
					<div class="col-sm-9">
						<label class="control-label">'.$key->kota_tujuan.'</label>
					</div>
					<label class="control-label col-sm-3">Transportasi</label>
					<div class="col-sm-9">
						<label class="control-label">'.$key->transportasi.'</label>
					</div>
					<label class="control-label col-sm-3">Persetujuan atasan 1</label>
					<div class="col-sm-9">
						<label class="control-label">'.$key->p_atasan1.'</label>
					</div>
					<label class="control-label col-sm-3">Persetujuan atasan 2</label>
					<div class="col-sm-9">
						<label class="control-label">'.$key->p_atasan2.'</label>
					</div>
					
				</div>
			</div>

			<div class="modal-footer">
				<button name="persetujuan" value="Sudah disetujui" class="btn btn-success">Setujui</button>
				<button name="persetujuan" value="Tidak disetujui" class="btn btn-danger">Tidak disetujui</button>
				
			</div>
		</form>
		';

	}

		//FURQON
	public function data_comapp(){
		$data['link'] = 'Dashboard';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenjobprofile'] = '';
		$data['manajemenperjalanandinas'] = 'active';
		$data['sppd_online'] = '';
		$data['dashboard'] = '';
		$data['job_profile'] = '';
		$data['komp_appraisal'] = '';
		$data['komp_dev'] = '';
		$data['performa_target'] = '';
		$data['performa_atasan'] = '';
		$data['data_comapp'] = '';
		$where = array('username'=>$this->session->userdata('username'));
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['info_user'] = $this->session->all_userdata();
		
		$where=array('sys_jabatan_id' => 4);
		$data['data_karyawan'] = $this->m_user->data_karyawan($where);
		
		//$data['data_all_karyawan'] = $this->m_user->data_all_karyawan();
		$data['data_komp_karyawan'] = $this->m_user->data_komp_karyawan();
		$this->load->view('template/header',$data);
		$this->load->view('atasan/v_data_comapp');
		$this->load->view('template/footer');
	}

	public function komp_appraisal($id_karyawan){		
		$data['link'] = 'Dashboard';
		$data['dashboard'] = 'active';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenjobprofile'] = '';
		$data['manajemenperjalanandinas'] = '';
		$data['sppd_online'] = '';
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['dashboard'] = '';
		$data['job_profile'] = '';
		$data['komp_appraisal'] = 'active';
		$data['komp_dev'] = '';
		$data['performa_target'] = '';
		$data['performa_atasan'] = '';
		$data['data_comapp'] = '';
		$data['info_user'] = $this->session->all_userdata();
		
		/*$where = array('username'=>$this->session->userdata('username'));
		$data['tipe_user'] = $this->m_user->tipe_user_join($where);
		$data['nilai_komp'] = $this->m_user->get_nilai_komp();*/
		
		$where = array('ms_data_karyawan.nip'=>$id_karyawan);
		$data['data_karyawan'] = $this->m_user->data_karyawan($where);

		$where = array('dk.nip'=>$id_karyawan);
		$data['kompetensi'] = $this->m_user->data_kompetensi_where($where);		
		
		$this->load->view('template/header',$data);
		$this->load->view('atasan/v_komp_appraisal', $data);
		$this->load->view('template/footer');
		// print_r($data['kompetensi']);
	}

	public function tes(){
		
		    for ($i=1;$i<=$this->input->post('no');$i++){
		    	$nip = $this->input->post('nip');
		    	$id_kompetensi = $this->input->post('id_kompetensi'.$i);
		    	$id_detail = $this->input->post('id_detail'.$i);
		    	$nilai_komp = $this->input->post('n_kompetensi'.$i);
		    	$data = array(
		    			'nip'=>$nip,
		    			'id_kompetensi'=>$id_kompetensi,
		    			'id_detail'=>$id_detail,
			    		'nilai_komp'=>$nilai_komp
		    	);
		    	
		    	$this->m_user->input_nilai_komp($data);		
		    }
		    echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Sudah Disimpan');
		    window.location.href='data_comapp';
		    </script>");
	}

	public function performa_atasan(){
		$data['link'] = 'Dashboard';
		$data['dashboard'] = 'active';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenjobprofile'] = '';
		$data['manajemenperjalanandinas'] = '';
		$data['sppd_online'] = '';
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['dashboard'] = '';
		$data['job_profile'] = '';
		$data['komp_appraisal'] = '';
		$data['komp_dev'] = '';
		$data['kompdev_karyawan'] = '';
		$data['performa_target'] = '';
		$data['performa_atasan'] = '';
		$data['data_comapp'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$where = array('username'=>$this->session->userdata('username'));
		$data['tipe_user'] = $this->m_user->tipe_user_join($where);
		$data['nilai_app'] = $this->m_user->get_all_nilai_app();
		
		$data['indikator'] = $this->m_user->get_indikator();
		$data['tipe'] = $this->m_user->get_tipe();
		$data['satuan'] = $this->m_user->get_satuan();
		$data['bobot'] = $this->m_user->get_bobot(	);
		$data['waktu'] = $this->m_user->get_waktu();
		$data['target'] = $this->m_user->get_target();
		$data['real'] = $this->m_user->get_update_real();
				
		$this->load->view('template/header',$data);
		$this->load->view('atasan/v_performa_atasan');
		$this->load->view('template/footer');
		/*
		echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Sudah Disimpan');
		    window.location.href='index';
		    </script>");
		*/


	}

	public function EditReal($id_real){
		$data['link'] = 'Dashboard';
		$data['dashboard'] = 'active';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenjobprofile'] = '';
		$data['manajemenperjalanandinas'] = '';
		$data['sppd_online'] = '';
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		
		$data['job_profile'] = '';
		$data['komp_appraisal'] = '';
		$data['komp_dev'] = '';
		$data['performa_target'] = '';
		$data['info_user'] = $this->session->all_userdata();		
		$where = array(
			'id_real' => $id_real
		);
		$data['nilai_app']=$this->m_user->get_selected_app($where);		
		$this->load->view('template/header',$data);			
		$this->load->view('atasan/v_edit_nilai_real', $data);
		$this->load->view('template/footer',$data);
	
	}
		

	public function updateReal(){
		$real = $this->input->post('inp_real');
		$id_real = $this->input->post('id_real');
		$data = array(
			'real'=>$real);		
		$where = array(
			'id_real' => $id_real);		
		
		$this->m_user->update_nilai_real($where, $data);
		redirect('c_atasan/performa_atasan');
	}

	

	public function status($nip,$id){
		$data = array(
		    		'status'=> 1
		    	);
		$where = array(
		 	'nip'=> $nip,
		 	'id_kompetensi' => $id
		 );
		$this->m_user->update_status($where, $data);
			redirect('c_atasan/lihat_nilai/'.$nip.'/'.$id);
		
	}	

		public function Evidence($evidence){
		$data['link'] = 'Dashboard';
		$data['dashboard'] = 'active';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenjobprofile'] = '';
		$data['manajemenperjalanandinas'] = '';
		$data['sppd_online'] = '';
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		
		$data['job_profile'] = '';
		$data['komp_appraisal'] = '';
		$data['komp_dev'] = '';
		$data['performa_target'] = '';
		$data['info_user'] = $this->session->all_userdata();		
		$where = array(
			'real.evidence' =>$evidence
		);
		$data['evidence']=$this->m_user->get_selected_evidence($where);		
		$this->load->view('template/header',$data);			
		$this->load->view('atasan/v_evidence',$data);
		$this->load->view('template/footer',$data);
	
	}


	public function lihat_nilai($id){
		$data['link'] = 'Dashboard';
		$data['dashboard'] = 'active';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenperjalanandinas'] = '';
		$data['manajemenjobprofile'] = '';
		$data['jobprofile'] = '';
		$data['sppd_online'] = '';
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		
		$data['komp_appraisal'] = '';
		$data['komp_dev'] = '';
		$data['komdev_karyawan'] = 'active';
		$data['performa_target'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$data['nilai_komp'] = $this->m_user->get_all_nilai_komp();

		$where=array('pk.nip'=>$id);
		$data['lihat_nilai'] = $this->m_user->lihat_nilai($where);
		
		$where = array('username'=>$this->session->userdata('username'));
		$data['tipe_user'] = $this->m_user->tipe_user_join($where);
		$data['kompetensi'] = $this->m_user->data_kompetensi();
		// $data['komp'] = $this->m_user->komp_dev();
		// print_r($data['komdev_karyawan']);
		$this->load->view('template/header',$data);
		$this->load->view('atasan/v_lihat_nilai', $data);
		$this->load->view('template/footer');
	}

	public function ajukan(){
		
		echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Mengajukan training');
		    window.location.href='index';
		    </script>");
	}
}