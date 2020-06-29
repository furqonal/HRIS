				<!-- Content area -->
				<div class="content">
				<div class="row">
					
					
						<div class="col-md-4">
							<div class="panel panel-body border-top-primary text-center">
								<h6 class="no-margin text-semibold">Data Personal</h6>
								<p class="text-muted content-group-sm">Data personal karyawan</p>

		                    	<a href="<?php echo base_url() ?>c_user/data_personal" type="button" class="btn btn-primary btn-rounded"><i class="icon-help position-left"></i>Lihat</a>
							</div>
						</div>

						<div class="col-md-4">
							<div class="panel panel-body border-top-primary text-center">
								<h6 class="no-margin text-semibold">Pengalaman Kerja</h6>
								<p class="text-muted content-group-sm">Pelatihan & pengalaman kerja karyawan</p>

		                    	<a href="<?php echo base_url() ?>c_user/pengalaman_kerja/0" type="button" class="btn btn-primary btn-rounded"><i class="icon-help position-left"></i> Lihat</a>
							</div>
						</div>

						<div class="col-md-4">
							<div class="panel panel-body border-top-primary text-center">
								<h6 class="no-margin text-semibold">Manajemen Cuti</h6>
								<p class="text-muted content-group-sm">Pengajuan Cuti</p>

		                    	<a  href="<?php echo base_url() ?>c_user/manajemen_cuti"  type="button" class="btn btn-primary btn-rounded"><i class="icon-help position-left"></i> Lihat</a>
							</div>
						</div>

						<div class="col-md-4">
							<div class="panel panel-body border-top-primary text-center">
								<h6 class="no-margin text-semibold">Manajemen Perjalanan Dinas</h6>
								<p class="text-muted content-group-sm">Pengajuan perjalanan dinas</p>

		                    	<a href="<?php echo base_url() ?>c_user/manajemen_perjalanan_dinas" type="button" class="btn btn-primary btn-rounded"><i class="icon-help position-left"></i> Lihat</a>
							</div>
						</div>

						<div class="col-md-4">
								<div class="panel panel-body border-top-primary text-center">
									<h6 class="no-margin text-semibold">Penilaian Kinerja</h6>
									<p class="text-muted content-group-sm">Penilaian kinerja</p>
								<?php  
										$where = array('username' => $this->session->userdata('username'));
										$data['real'] = $this->m_user->get_real_where($where); 
										if($data['real']){ ?>
											<a href="<?php echo base_url() ?>c_user/app_kar" type="button" class="btn btn-primary btn-rounded"><i class="icon-help position-left"></i> Lihat</a>
								</div>
										<?php }else{ ?>
											<a href="<?php echo base_url() ?>c_user/performa_target" type="button" class="btn btn-primary btn-rounded"><i class="icon-help position-left"></i> Lihat</a>
								</div>
										<?php }
								?>
		                    	
							</div>
							<div class="col-md-4">
								<div class="panel panel-body border-top-primary text-center">
									<h6 class="no-margin text-semibold">Pengembangan Kompetensi</h6>
									<p class="text-muted content-group-sm">Pengembangan kompetensi</p>

		                    	<a href="<?php echo base_url('c_user/komdev_karyawan/'.$this->session->userdata('id')) ?>" type="button" class="btn btn-primary btn-rounded"><i class="icon-help position-left"></i> Lihat</a>
							</div>
				</div>