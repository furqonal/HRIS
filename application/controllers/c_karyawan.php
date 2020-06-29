<?php

class C_karyawan extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->library('upload');
	}

	public function editDataPersonal(){
		$nip = $this->input->post('nip');
		$namalengkap = $this->input->post('namalengkap');
		$nik = $this->input->post('nik');
		$unit = $this->input->post('unit');
		$statuskaryawan = $this->input->post('statuskaryawan');
		$tempatlahir = $this->input->post('tempatlahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$jabatan = $this->input->post('jabatan');
		$nama_anak1 = $this->input->post('nama_anak1');
		$nama_anak2 = $this->input->post('nama_anak2');
		$nama_anak3 = $this->input->post('nama_anak3');
		$alamatrumah = $this->input->post('alamatrumah');
		$notlp_rumah = $this->input->post('notlp_rumah');
		$nohp = $this->input->post('nohp');
		$email = $this->input->post('email');
		$nama_ibukandung = $this->input->post('nama_ibukandung');
		$nama_bapakkandung = $this->input->post('nama_bapakkandung');
		$alamat_ortu = $this->input->post('alamat_ortu');
		$perguruan_tinggi = $this->input->post('perguruan_tinggi');
		$level = $this->input->post('level');
		$jurusan = $this->input->post('jurusan');
		$norek_gaji = $this->input->post('norek_gaji');
		$bankgaji = $this->input->post('bankgaji');
		$tgl_mulai_kerja = $this->input->post('tgl_mulai_kerja');
		$tgl_capeg = $this->input->post('tgl_capeg');
		$tgl_penglap = $this->input->post('tgl_penglap');


		$config['upload_path'] = './assets/images/foto_pas/';
		$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG|gif|GIF';
		$config['max_size']	= '100000'; //in kb
        $this->upload->initialize($config);

         if (! $this->upload->do_upload('pas_foto')) {
            echo $this->upload->display_errors();
	    } else {
	    	$dataPersonal=array(
	    			'nip' => $nip,
					'nama' => $namalengkap,
					'nik' => $nik,
					'unit' => $unit,
					'status_karyawan' => $statuskaryawan,
					'tempat_lahir' => $tempatlahir,
					'tgl_lahir' => $tanggal_lahir,
					'nama_anak1' => $nama_anak1,
					'nama_anak2' => $nama_anak2,
					'nama_anak3' => $nama_anak3,
					'alamat_rumah' => $alamatrumah,
					'notlp_rumah' => $notlp_rumah,
					'sys_jabatan_id' => $jabatan,
					'nohp' => $nohp,
					'email' => $email,
					'alamat_ortu' => $alamat_ortu,
					'perguruan_tinggi' => $perguruan_tinggi,
					'level' => $level,
					'jurusan' => $jurusan,
					'nama_ibu_kandung' => $nama_ibukandung,
					'nama_bapak_kandung' => $nama_bapakkandung,
					'norek_gaji' => $norek_gaji,
					'bank_gaji' => $bankgaji,
					'tgl_mulai_kerja' => $tgl_mulai_kerja,
					'tgl_capeg' => $tgl_capeg,
					'tgl_penglap' => $tgl_penglap,
					'status' => "Belum disetujui",
	    			'foto' => $this->upload->data('file_name')
	    		);

	    	$where = array(
	    			'nip' => $nip
	    		);

	    	$this->m_user->insert('ms_data_update_karyawan', $dataPersonal);
	    	
	    	//$result = $this->m_konsumen->update($where,$dataStatus,'rel_pemesanan');

	    	/*if ($result == TRUE) {
			$this->session->set_flashdata('success', 'Upload bukti pembayaran berhasil!');
			} else {
				$this->session->set_flashdata('failed', 'Upload bukti pembayaran gagal!');
			}
*/
	    	$data['link'] = 'job_profile';
			$data['dashboard'] = '';
			$data['data_personal'] = 'active';
			$data['pengalaman_kerja'] = '';
			$data['manajemencuti'] = '';
			$data['manajemenperjalanandinas'] = '';
			$data['sppd_online'] = '';
			$data['komp_dev'] = '';
			$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
			$data['info_user'] = $this->session->all_userdata();
			$data['datapersonal'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
			$data['jabatan'] = $this->m_user->getData('sys_jabatan');
			$this->load->view('template/header',$data);
			$this->load->view('v_form_data_personal',$data);
			$this->load->view('template/footer');
	    }

	}

	public function tambahPengalamanKerja(){
		$namaperusahaan = $this->input->post('namaperusahaan');
		$tgl_mulai = $this->input->post('tgl_mulai');
		$tgl_berakhir = $this->input->post('tgl_berakhir');
		$posisi = $this->input->post('posisi');
		$unit = $this->input->post('unit');

		$data['datapersonal'] = $this->m_user->getDataPersonal($this->session->userdata('id'));

		foreach ($data['datapersonal'] as $key) {
			$nip = $key->nip;
		}

		$dataPengalamanKerja = array(
				'nama_perusahaan' => $namaperusahaan,
				'tgl_mulai' => $tgl_mulai,
				'tgl_berakhir' => $tgl_berakhir,
				'posisi' => $posisi,
				'unit' => $unit,
				'ms_karyawan_id' => $nip
			);

		$where = array(
				'ms_karyawan_id' => $nip
			);

		$result = $this->m_user->insert('rel_pengalaman_kerja', $dataPengalamanKerja);

		redirect('C_user/pengalaman_kerja/0');

	}

	public function tambahPelatihan(){
		$namapelatihan = $this->input->post('namapelatihan');
		$tahun = $this->input->post('tahun');
		$sertifikat = $this->input->post('sertifikat');

		$data['datapersonal'] = $this->m_user->getDataPersonal($this->session->userdata('id'));

		foreach ($data['datapersonal'] as $key) {
			$nip = $key->nip;
		}

		$dataPelatihan = array(
				'nama_pelatihan' => $namapelatihan,
				'tahun' => $tahun,
				'sertifikat' => $sertifikat,
				'ms_karyawan_id' => $nip
			);

		$result = $this->m_user->insert('rel_pelatihan', $dataPelatihan);

		redirect('C_user/pengalaman_kerja/0');

	}

	public function pengajuanCuti(){
		$nip = $this->input->post('nip');
		$namakaryawan = $this->input->post('namakaryawan');
		$atasan = $this->input->post('atasan');
		$jabatan = $this->input->post('jabatan');
		$unit = $this->input->post('unit');
		$tgl_pengajuan = $this->input->post('tgl_pengajuan');
		$lama_cuti = $this->input->post('lama_cuti');
		$jeniscuti = $this->input->post('jeniscuti');
		$sampai_tgl = date('Y-m-d', strtotime('+'.$lama_cuti.' days', strtotime($tgl_pengajuan)));

		$dataPengajuan = array(
				'tgl_pengajuan' => $tgl_pengajuan,
				'sampai_tgl' => $sampai_tgl,
				'lama_cuti' => $lama_cuti,
				'p_ataasan1' => "Belum disetujui",
				'p_ataasan2' => "Belum disetujui",
				'ms_karyawan_id' => $nip,
				'ms_cuti_id' => $jeniscuti,
				'status' => "Proses persetujuan"
			);

		$where = array(
				'ms_karyawan_id' => $this->session->userdata('nip')
			);

		$whereJatah = array(
				'nip' => $this->session->userdata('nip')
			);

		$cekStatus = $this->m_user->cekStatusCuti($where);
		$cekJatah =  $this->m_user->getDataById('ms_jatah_cuti',$whereJatah);

		foreach ($cekStatus as $key) {
			
		}

		foreach ($cekJatah as $row) {

		}

		$jatah = 0;
		if ($jeniscuti == 1) {
			$jatah = $row->tahunan;
		} elseif ($jeniscuti == 2) {
			$jatah = $row->alasan_penting;
		} elseif ($jeniscuti == 3) {
			$jatah = $row->sakit;
		} elseif ($jeniscuti == 4) {
			$jatah = $row->melahirkan;
		} elseif ($jeniscuti == 5) {
			$jatah = $row->besar;	
		} elseif ($jeniscuti == 6) {
			$jatah = $row->keguguran;
		} elseif ($jeniscuti == 7) {
			$jatah = $row->diluar_tanggungan_yayasan;
		}

		if ($jatah < $lama_cuti) {
			$this->session->set_flashdata('failed','Jatah cuti tidak cukup');
			redirect('C_user/manajemen_cuti');
			
		} else{
			if ($key->status == "Disetujui" || $key->status == "Proses persetujuan") {
			$this->session->set_flashdata('failed','Cuti anda yang sebelumnya masih belum di ACC atau belum di cetak');
			redirect('C_user/manajemen_cuti');

			} else {
				$result = $this->m_user->insert('rel_manajemen_cuti', $dataPengajuan);
				redirect('C_user/manajemen_cuti');

			}
		}
	}

	public function pengajuanPerjalananDinas(){
		//$nip = $this->input->post('nip');
		$deskripsi = $this->input->post('deskripsi');
		$jenis_perjalanan = $this->input->post('jenisperjalanan');
		$kota_tujuan = $this->input->post('kotatujuan');
		$transportasi = $this->input->post('transportasi');
		$anggaran_saatini = $this->input->post('anggaransaatini');
		$anggaran_akhir = $this->input->post('anggaranakhir');
		$tgl_pengajuan = $this->input->post('tgl_pengajuan');
		$tgl_kembali = $this->input->post('tgl_kembali');

		$tglpengajuan = strtotime($tgl_pengajuan);
		$tglkembali = strtotime($tgl_kembali);

		$lama_Perjalanan = $tglkembali - $tglpengajuan;
		$lamaperjalanan = floor($lama_Perjalanan / (60 * 60 * 24));

		$jml = count($_POST['nip']);

		$dataPerjalananDinas = array(
				'deskripsi_perjalanan' => $deskripsi,
				'jenis_perjalan' => $jenis_perjalanan,
				'kota_tujuan' => $kota_tujuan,
				'transportasi' => $transportasi,
				'anggaran_saat_ini' => $anggaran_saatini,
				'anggaran_akhir' => $anggaran_akhir,
				'p_atasan1' => "Belum disetujui",
				'p_atasan2' => "Belum disetujui",
				'tgl_pengajuan' => $tgl_pengajuan,
				'tgl_kembali' => $tgl_kembali,
				'lama_perjalanan' => $lamaperjalanan,
				'ms_karyawan_id' => $this->session->userdata('nip'),
				'status' => "Proses persetujuan"	
			);

		$cekStatus = $this->m_user->getNewPPDAnggota($this->session->userdata('nip'));

		foreach ($cekStatus as $key ) {
			
		}

		if ($key->status == "Disetujui" || $key->status == "Proses persetujuan") {
			$this->session->set_flashdata('failed','PPD anda yang sebelumnya masih belum di ACC atau belum di cetak');
			redirect('C_user/manajemen_perjalanan_dinas');

			} else {
				$result = $this->m_user->insert('rel_manajemen_perjalanan_dinas', $dataPerjalananDinas);
				

				$dataPPD = $this->m_user->getNewPPD();

				foreach ($dataPPD as $key) {
				}

				for ($i=0; $i < $jml ; $i++) { 

					$nipanggota = $this->input->post('nip')[$i];

					$dataAnggotaPPD = array(
						'nip' => $nipanggota,
						'id_perjalanandinas' => $key->id_perjalanan_dinas
					);

					$this->m_user->insert('rel_anggota_perjalanandinas', $dataAnggotaPPD);
				}

			redirect('C_user/manajemen_perjalanan_dinas');

					}
	}

// tambahan punya TM
	public function tambahJobProfile(){
		$nama_jabatan = $this->input->post('nama_jabatan');
		$unit_kerja = $this->input->post("unit_kerja");
		$atasan_langsung = $this->input->post("atasan_langsung");
		$bawahan_langsung = $this->input->post("bawahan_langsung");
		$tujuan_jabatan = $this->input->post("tujuan_jabatan");
		$pendidikan_minimal = $this->input->post("pendidikan_minimal");
		$status_kepegawaian = $this->input->post("status_kepegawaian");
		
		$data_job_profile = array(
			'nama_jabatan' => $nama_jabatan,
			'unit_kerja' =>$unit_kerja,
			'atasan_langsung' => $atasan_langsung,
			'bawahan_langsung' => $bawahan_langsung,
			'tujuan_jabatan' => $tujuan_jabatan,
			'pendidikan_minimal' => $pendidikan_minimal,
			'status_kepegawaian' => $status_kepegawaian,
			'status' => 0);

		$this->m_user->insert('ms_job_profile', $data_job_profile);
		

		$cek = $this->m_user->getJobProfileId($nama_jabatan);
		$id_job = "";
		foreach ($cek as $c) {
				$id_job = $c->id_job_profile;
			}
		
		$kompetensi_keahlian = $this->input->post("select_komp");
		$level = $this->input->post("select_level");
		$data_kpg = array(
				'id_job_profile' => $id_job,
				'kompetensi_keahlian' => $kompetensi_keahlian,
				'level_keahlian' => $level
			);
		$this->m_user->insert('rel_keahlian_pengetahuan', $data_kpg);
		$jml_tp = count($_POST['uraian_tugas_pokok']);
		$jml_ikk = count($_POST['indikator_keberhasilan_kerja']);
		$jml_ki = count($_POST['kompetensi_inti']);
		$jml_kp = count($_POST['kualitas_personal']);

		for ($i=0; $i < $jml_tp ; $i++) { 
			$uraian_tugas_pokok = $this->input->post('uraian_tugas_pokok')[$i];
			
			$data_tp = array(
				'id_job_profile' => $id_job,
				'uraian' => $uraian_tugas_pokok
			);
			$this->m_user->insert('rel_tugas_pokok', $data_tp);
		}

		for ($i=0; $i < $jml_ikk ; $i++) { 
			$indikator_keberhasilan_kerja = $this->input->post('indikator_keberhasilan_kerja')[$i];
			$data_ikk = array(
				'id_job_profile' => $id_job,
				'indikator' => $indikator_keberhasilan_kerja
			);
			$this->m_user->insert('rel_indikator_keberhasilan', $data_ikk);
		}

		for ($i=0; $i < $jml_ki ; $i++) { 
			$kompetensi_inti = $this->input->post('kompetensi_inti')[$i];
			$data_ki = array(
				'id_job_profile' => $id_job,
				'kompetensi_inti' => $kompetensi_inti
			);
			$this->m_user->insert('rel_kompetensi_inti', $data_ki);
		}

		for ($i=0; $i < $jml_kp ; $i++) { 
			$kualitas_personal = $this->input->post('kualitas_personal')[$i];
			$data_kp = array(
				'id_job_profile' => $id_job,
				'kualitas_personal' => $kualitas_personal
			);
			$this->m_user->insert('rel_kualitas_personal', $data_kp);
		}

		// echo "success";
		redirect("c_hrd/tambah_job_profile");
	}

	//FURQON
	/*public function performa_target(){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['job_profile'] = '';
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
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['job_profile'] = '';
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
		$data['tipe_user'] = $this->m_user->tipe_user_join($where);
		$this->load->view('template/header',$data);
		$this->load->view('v_performa_app');
		$this->load->view('template/footer');
		
		
	}

	public function tes_performa_app(){			
			$row = $this->m_user->get_indikator_real($this->session->userdata('username'))->num_rows();
			
			for ($i=1; $i<=$row; $i++) { 
					$b='n_real'.$i;
					$c='indikator'.$i;
					$d='nama_karyawan'.$i;
					$e='id_indikator'.$i;

					$performa_real=$this->input->post($b);										
					$indikator=$this->input->post($c);									
					$id_indikator=$this->input->post($e);
					$nama_karyawan=$this->input->post($d);
					
					$data=array(
						'id_user'=>$nama_karyawan,
						'real'=>$performa_real,
						'indikator'=>$indikator,
						'id_indikator'=>$id_indikator
					);			
					$this->m_user->input_real($data);
			}			
			

			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Sudah Disimpan');
		    window.location.href='index';
		    </script>");
		    		
	}

	public function komdev_karyawan(){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['job_profile'] = '';
		$data['komp_appraisal'] = '';
		$data['komp_dev'] = '';
		$data['komdev_karyawan'] = 'active';
		$data['performa_target'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$data['nilai_komp'] = $this->m_user->get_all_nilai_komp();
		$data['data_karyawan'] = $this->m_user->data_kar()->result();
		$where = array('username'=>$this->session->userdata('username'));
		$data['tipe_user'] = $this->m_user->tipe_user_join($where);
		$data['kompetensi'] = $this->m_user->data_kompetensi()->result();
		$data['komp'] = $this->m_user->komp_dev();
		$this->load->view('template/header',$data);
		$this->load->view('v_komdev_karyawan', $data);
		$this->load->view('template/footer');

		


	}*/

}

?>