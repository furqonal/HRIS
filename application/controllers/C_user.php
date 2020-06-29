<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {

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
			$data['manajemenjobprofile'] = '';
			$data['jobprofile'] = '';
			$data['sppd_online'] = '';
			$data['komp_appraisal'] = '';
			$data['komp_dev'] = '';
			$data['komdev_karyawan'] = '';
			$data['hrd_performa'] = '';
			$data['performa_atasan'] = '';
			$data['performa_target'] = '';

			
			$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
			$data['newPPD'] = $this->m_user->getNewPPDAnggota($this->session->userdata('nip'));


			$whereKaryawan = array(
					'nip' =>$this->session->userdata('nip')
				);

			$data['karyawan'] = $this->m_user->getDataById('ms_data_karyawan', $whereKaryawan);

			$where = array(
					'ms_karyawan_id' => $this->session->userdata('nip')
				);

			$data['cuti'] = $this->m_user->cekStatusCuti($where);
			$data['komp_dev'] = '';
			$data['info_user'] = $this->session->all_userdata();
			$this->load->view('template/header',$data);
			$this->load->view('v_dashboard',$data);
			$this->load->view('template/footer');
		}
		
	}

	public function data_personal(){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['data_personal'] = 'active';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenperjalanandinas'] = '';
		$data['jobprofile'] = '';
		$data['sppd_online'] = '';
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['komp_dev'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$data['datapersonal'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['jabatan'] = $this->m_user->getData('sys_jabatan');
		$data['newPPD'] = $this->m_user->getNewPPDAnggota($this->session->userdata('nip'));
		$whereKaryawan = array(
					'nip' =>$this->session->userdata('nip')
				);

			$data['karyawan'] = $this->m_user->getDataById('ms_data_karyawan', $whereKaryawan);

			$where = array(
					'ms_karyawan_id' => $this->session->userdata('nip')
				);

			$data['cuti'] = $this->m_user->cekStatusCuti($where);
		$this->load->view('template/header',$data);
		$this->load->view('v_form_data_personal',$data);
		$this->load->view('template/footer');

	}

	public function pengalaman_kerja($angka){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = 'active';
		$data['jobprofile'] = '';
		$data['manajemencuti'] = '';
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['manajemenperjalanandinas'] = '';
		$data['sppd_online'] = '';
		$data['komp_dev'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$data['newPPD'] = $this->m_user->getNewPPDAnggota($this->session->userdata('nip'));
		$data['datapersonal'] = $this->m_user->getDataPersonal($this->session->userdata('id'));

		foreach ($data['datapersonal'] as $key) {
			$nip = $key->nip;
		}


		$where = array(
				'ms_karyawan_id' => $nip
			);

		$data['pengalamankerja'] = $this->m_user->getDataById('rel_pengalaman_kerja', $where);
		$data['pelatihan'] = $this->m_user->getDataById('rel_pelatihan', $where);
		$this->load->view('template/header',$data);

		if ($angka == 0) {
			$this->load->view('v_pengalaman_kerja',$data);
		} elseif ($angka == 1) {
			$this->load->view('v_form_pengalamankerja',$data);
		} else {
			$this->load->view('v_form_pelatihan',$data);
		}

		$this->load->view('template/footer');

	}

	public function manajemen_cuti(){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = 'active';
		$data['manajemenperjalanandinas'] = '';
		$data['jobprofile'] = '';
		$data['sppd_online'] = '';
		$data['komp_dev'] = '';
		$data['datapersonal'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['newPPD'] = $this->m_user->getNewPPDAnggota($this->session->userdata('nip'));
		$whereKaryawan = array(
					'nip' =>$this->session->userdata('nip')
				);

			$data['karyawan'] = $this->m_user->getDataById('ms_data_karyawan', $whereKaryawan);

			$where = array(
					'ms_karyawan_id' => $this->session->userdata('nip')
				);

			$data['cuti'] = $this->m_user->cekStatusCuti($where);
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['jeniscuti'] = $this->m_user->getData('ms_cuti');

		$where = array(
				'ms_karyawan_id' => $this->session->userdata('nip')
			);

		$data['pengajuanCuti'] = $this->m_user->cekStatusCuti($where);
		$data['info_user'] = $this->session->all_userdata();
		$this->load->view('template/header',$data);
		$this->load->view('v_manajamen_cuti',$data);
		$this->load->view('template/footer');
	}

	public function manajemen_perjalanan_dinas(){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenperjalanandinas'] = 'active';
		$data['jobprofile'] = '';
		$data['sppd_online'] = '';
		$data['komp_dev'] = '';
		$data['datapersonal'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['newPPD'] = $this->m_user->getNewPPDAnggota($this->session->userdata('nip'));
		$data['newPPD'] = $this->m_user->getNewPPDAnggota($this->session->userdata('nip'));
		$whereKaryawan = array(
					'nip' =>$this->session->userdata('nip')
				);

			$data['karyawan'] = $this->m_user->getDataById('ms_data_karyawan', $whereKaryawan);

			$where = array(
					'ms_karyawan_id' => $this->session->userdata('nip')
				);

		$data['cuti'] = $this->m_user->cekStatusCuti($where);
		$data['info_user'] = $this->session->all_userdata();
		$this->load->view('template/header',$data);
		$this->load->view('v_manajemen_perjalanan_dinas',$data);
		$this->load->view('template/footer');
		//print_r($data['newPPD']);
	}

	public function sppdonline($tipe){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenperjalanandinas'] = '';
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['sppd_online'] = 'active';
		$data['komp_dev'] = '';
		$data['datapersonal'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['newPPD'] = $this->m_user->getNewPPDAnggota($this->session->userdata('nip'));
		$whereKaryawan = array(
					'nip' =>$this->session->userdata('nip')
				);

			$data['karyawan'] = $this->m_user->getDataById('ms_data_karyawan', $whereKaryawan);

			$where = array(
					'ms_karyawan_id' => $this->session->userdata('nip')
				);

			$data['cuti'] = $this->m_user->cekStatusCuti($where);
		$data['info_user'] = $this->session->all_userdata();
		$this->load->view('template/header',$data);

		if ($tipe == 0) {
			$this->load->view('v_sppd_online',$data);
		} else {
			$this->load->view('v_form_sppd_online',$data);
		}

		$this->load->view('template/footer');
	}

	public function getJenisCuti(){
	$id_cuti = $_GET['id_cuti'];

	$where = array(
			'id_cuti' => $id_cuti
		);

	$lamaHari = $this->m_user->getDataById('ms_cuti',$where);

	foreach ($lamaHari as $key) {
	}

	$hari = $key->hari;
	
	echo '
		<div class="form-group">
			<label class="control-label col-lg-3">Lama Cuti<span class="text-danger">*</span></label>
			<div class="col-lg-9">
				<select class="input form-control" name="lama_cuti" >';
				for ($i=1; $i <= $hari ; $i++) {
	echo '				<option value="'.$i.'">'.$i.'</option> ';
				}
	echo'		</select>
			</div>
		</div>
		
	';

	}

	//FURQON
	//FURQON
	//FURQON
	public function v_hrd_performa(){
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
			/*'posisi'=>$posisi,*/
			'sku'=>$sku,			
			/*'tipe'=>$tipe ,
			'satuan'=>$satuan,
			'bobot'=>$bobot,
			'waktu'=>$waktu,
			'target'=>$target
			*/
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

					$nm_satuan	=$ci->input->post('inp_satuan')[$key];								
					$data=array(
						'id_indikator'=>$id_indikator,
						'id_user'=>$id_user,
						'satuan'=>$nm_satuan
					);
					$ci->m_user->input_satuan($data);
					
					$nm_bobot	=$ci->input->post('inp_bobot')[$key];								
					$data=array(
						'id_indikator'=>$id_indikator,
						'id_user'=>$id_user,
						'bobot'=>$nm_bobot
					);
						$ci->m_user->input_bobot($data);
	

					$nm_waktu	=$ci->input->post('inp_waktu')[$key];								
					$data=array(
						'id_indikator'=>$id_indikator,
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
		$data['komp_dev'] = 'active';
		$data['hrd_performa']='';
		$data['performa_target'] = '';
		$where = array('username'=>$this->session->userdata('username'));
		$data['tipe_user'] = $this->m_user->tipe_user_join($where);
		$data['info_user'] = $this->session->all_userdata();
		$data['nilai_komp'] = $this->m_user->get_all_nilai_komp();
		
		//$data['data_karyawan'] = $this->m_user->data_all_karyawan();
		
		$data['kompetensi'] = $this->m_user->data_kompetensi();
		$data['komp'] = $this->m_user->pengelompokan_karyawan();

		$this->load->view('template/header',$data);
		$this->load->view('v_komp_dev', $data);
		$this->load->view('template/footer');

		


	}

	//karyawan
		//FURQON
	public function performa_target(){
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
		$data['komdev_karyawan'] = '';
		$data['performa_target'] = 'active';
		$where = array('username'=>$this->session->userdata('username'));
		$data['tipe_user'] = $this->m_user->tipe_user_join($where);
		$data['info_user'] = $this->session->all_userdata();
		$data['nilai_app'] = $this->m_user->get_nilai_app_login($this->session->userdata('username'));
		$data['tipe'] = $this->m_user->get_tipe();
		$data['satuan'] = $this->m_user->get_satuan();
		$data['bobot'] = $this->m_user->get_bobot(	);
		$data['waktu'] = $this->m_user->get_waktu();
		$data['target'] = $this->m_user->get_target();

		$this->load->view('template/header',$data);
		$this->load->view('v_performa_target');
		$this->load->view('template/footer');

			
	}

	public function tes_performa(){
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
		$data['performa_target'] = '';
		$data['komdev_karyawan'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$data['nilai_app'] = $this->m_user->get_nilai_app_login($this->session->userdata('username'));
		$data['indikator'] = $this->m_user->get_indikator();
		$data['tipe'] = $this->m_user->get_tipe();
		$data['satuan'] = $this->m_user->get_satuan();
		$data['bobot'] = $this->m_user->get_bobot(	);
		$data['waktu'] = $this->m_user->get_waktu();
		$data['target'] = $this->m_user->get_target();

		$where = array('username'=>$this->session->userdata('username'));
		$data['tipe_user_join_user'] = $this->m_user->tipe_user_join($where);


		$this->load->view('template/header',$data);
		$this->load->view('v_performa_app');
		$this->load->view('template/footer');
		
		/**/
	}

	public function tes_performa_app(){			
			$row = $this->m_user->get_indikator_real($this->session->userdata('username'))->num_rows();
			
			for ($i=1; $i<=$row; $i++) { 
					$b='n_real'.$i;
					$c='indikator'.$i;
					$d='nama_karyawan'.$i;
					$e='id_indikator'.$i;
					$f='berkas'.$i;
					$performa_real=$this->input->post($b);										
					$indikator=$this->input->post($c);									
					$id_indikator=$this->input->post($e);
					$nama_karyawan=$this->input->post($d);
					$config = array(
						'upload_path' => './assets/evidence/',
						'allowed_types' => 'pdf',
						);
						 
						$this->load->library('upload',$config);
								if (!$this->upload->do_upload($f)) {
									print_r($this->upload->display_errors());
									// $this->session->set_flashdata('message', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
								
								} else {
									$file = $this->upload->data();
									$evidence = $file['file_name']; 
									$data=array(
										'id_user'=>$nama_karyawan,
										'real'=>$performa_real,
										'indikator'=>$indikator,
										'id_indikator'=>$id_indikator,
										'evidence'=> $evidence
									);			
									$this->m_user->input_real($data);
								}					
			}	

			
			/*
			$where=array(
				'id'=>$id
			);
			$data=array(
					'real'=>$performa_real				
			);
			$this->m_user->update_nilai_real($where, $data);		
			*/

			 echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Meminta approval');
		    window.location.href='index';
		    </script>");
		    		
	}

	public function komdev_karyawan($id){
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

		$where=array('user_id'=>$id);
		$data['komdev_karyawan'] = $this->m_user->komdev_karyawan($where);
		
		$where = array('username'=>$this->session->userdata('username'));
		$data['tipe_user'] = $this->m_user->tipe_user_join($where);
		$data['kompetensi'] = $this->m_user->data_kompetensi();
		// $data['komp'] = $this->m_user->komp_dev();
		// print_r($data['komdev_karyawan']);
		$this->load->view('template/header',$data);
		$this->load->view('v_komdev_karyawan', $data);
		$this->load->view('template/footer');
	}

		public function app_kar(){
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
		$data['performa_target'] = '';
		$data['komdev_karyawan'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$data['nilai_app'] = $this->m_user->get_nilai_app_login($this->session->userdata('username'));
		$data['indikator'] = $this->m_user->get_indikator();
		$data['tipe'] = $this->m_user->get_tipe();
		$data['satuan'] = $this->m_user->get_satuan();
		$data['bobot'] = $this->m_user->get_bobot(	);
		$data['waktu'] = $this->m_user->get_waktu();
		$data['target'] = $this->m_user->get_target();

		$where = array('username'=>$this->session->userdata('username'));
		$data['tipe_user_join_user'] = $this->m_user->tipe_user_join($where);
				
		$this->load->view('template/header',$data);
		$this->load->view('v_approval_kar');
		$this->load->view('template/footer');
	}

	
	public function pengelompokan($id){
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
		$data['komp_dev'] = 'active';
		$data['hrd_performa']='';
		$data['performa_target'] = '';
		$where = array('username'=>$this->session->userdata('username'));
		$data['tipe_user'] = $this->m_user->tipe_user_join($where);
		$data['info_user'] = $this->session->all_userdata();
		$data['nilai_komp'] = $this->m_user->get_all_nilai_komp();
		

		$where=array('pk.id_kompetensi'=>$id);
		$data['pengelompokan'] = $this->m_user->pengelompokan_kompetensi($where);
		
		$where=array('pk.id_kompetensi'=>$id);
		$data['nilai_total'] = $this->m_user->nilai_total($where);



		$data['kompetensi'] = $this->m_user->data_kompetensi();

		$data['peng_komp'] = $this->m_user->pengelompokan_nilai($id);
		$this->load->view('template/header',$data);
		//$this->session->set_userdata('nama_competency',$id);
		$this->load->view('v_pengelompokan', $data);
		$this->load->view('template/footer');
		// print_r($data['pengelompokan']);
	}

	function rekomendasi_training($id, $total){;
		$data['rekomendasi']=$this->m_user->get_rekomendasi_training($id,$total);
		$this->load->view('v_rekomendasi_training',$data);
		
    	}
	
public function data_grafik(){
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
		$data['komp_dev'] = 'active';
		$data['hrd_performa']='';
		$data['performa_target'] = '';
		$where = array('username'=>$this->session->userdata('username'));
		$data['tipe_user'] = $this->m_user->tipe_user_join($where);
		$data['info_user'] = $this->session->all_userdata();
		$data['nilai_komp'] = $this->m_user->get_all_nilai_komp();
		
		$data['grafik'] = $this->m_user->grafik();
		
		$data['kompetensi'] = $this->m_user->data_kompetensi();
		$data['komp'] = $this->m_user->pengelompokan_karyawan();

		$this->load->view('template/header',$data);
		$this->load->view('v_data_grafik', $data);
		$this->load->view('template/footer');
	}

	public function grafik($nip,$id_kompetensi){
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
		$data['komp_dev'] = 'active';
		$data['hrd_performa']='';
		$data['performa_target'] = '';
		$where = array('username'=>$this->session->userdata('username'));
		$data['tipe_user'] = $this->m_user->tipe_user_join($where);
		$data['info_user'] = $this->session->all_userdata();
		$data['nilai_komp'] = $this->m_user->get_all_nilai_komp();
		
		$data['grafik'] = $this->m_user->grafik();
		
		$data['kompetensi'] = $this->m_user->data_kompetensi();
		$data['komp'] = $this->m_user->pengelompokan_karyawan();

		$where=array('pk.nip'=>$nip,
					 'pk.id_kompetensi' =>$id_kompetensi
					);
		$data['report'] = $this->m_user->report($where);
		/*print_r($data['report']);*/
		 $this->load->view('template/header',$data);
		 $this->load->view('v_grafik', $data);
		 $this->load->view('template/footer');

	}




}
