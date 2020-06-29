<!-- Content area -->
				<div class="content">

					<!-- Form horizontal -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Edit Job Profile</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
							<form class="form-horizontal" method="POST" action="<?= base_url()?>c_atasan/editjobprofile">
								<fieldset class="content-group">
								<legend><b>	Identitas Jabatan</b></legend>
								<?php foreach ($jobprofile as $jp) {

								} ?>
									<div class="form-group">
										<label class="control-label col-lg-2">Nama Jabatan</label>
										<div class="col-lg-10">
											<input type="text" name= "nama_jabatan" value="<?php echo $jp->nama_jabatan ?>" class="form-control">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Unit Kerja</label>
										<div class="col-lg-10">
											<input type="text" name="unit_kerja" value="<?php echo $jp->unit_kerja?>" class="form-control">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Atasan Langsung</label>
										<div class="col-lg-10">
											<input type="text" name="atasan_langsung" value="<?php echo $jp->atasan_langsung ?>" class="form-control">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Bawahan Langsung</label>
										<div class="col-lg-10">
											<input type="text" name="bawahan_langsung" value="<?php echo $jp->bawahan_langsung ?>" class="form-control">
										</div>
									</div>

									<legend><b>Tujuan Jabatan</b></legend>
									<div class="form-group">
										<label class="control-label col-lg-2">Tujuan jabatan</label>
										<div class="col-lg-10">
											<input type="text" name="tujuan_jabatan" value="<?php echo $jp->tujuan_jabatan ?>" class="form-control">
										</div>
									</div>

									<legend><b>Tugas pokok</b></legend>
									<div>
										<a class="btn btn-primary btn-sm btn-rounded tambahtugaspokok" >Tambah tugas pokok</a>
									</div>

									<div class="tugaspokokdata" >
										
									</div>

									<legend><b>Indikator Keberhasilan Kerja</b></legend>
									<div>
										<a class="btn btn-primary btn-sm btn-rounded tambahindikator" >Tambah Indikator Keberhasilan Kerja</a>
									</div>

									<div class="indikatordata" >
										
									</div>

									<legend><b>Spesifikasi Jabatan</b></legend>
									<div class="form-group">
										<label class="control-label col-lg-2">Pendidikan Minimal</label>
										<div class="col-lg-10">
											<input type="text" name="pendidikan_minimal" value="<?php echo $jp->pendidikan_minimal ?>" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-2">Status Kepegawaian</label>
										<div class="col-lg-10">
											<input type="text" name="status_kepegawaian" value="<?php echo $jp->status_kepegawaian ?>" class="form-control">
										</div>
									</div>
									<div>
										<a class="btn btn-primary btn-sm btn-rounded tambahki" >Tambah Kompetensi Inti</a>
									</div>

									<div class="kidata" >
										
									</div><br>
									<div>
										<a class="btn btn-primary btn-sm btn-rounded tambahkp" >Tambah Kualitas Personal</a>
									</div>

									<div class="kpdata" >
										
									</div>


									<div class="form-group">
										<label class="control-label col-lg-2">Keahlian Pengetahuan</label>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<select name="select_komp" class="form-control input-xlg">
						                                    <option value="no selected">Kompetensi</option>
						                                    <?php foreach ($list_komp as $lk) {
						                                    ?>
						                                    <option value="<?php echo $lk->nama_competency ?>"><?php echo $lk->nama_competency; ?></option>
						                                    <?php
						                                    } ?>
						                                    
						                                </select>
													</div>
												
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<select name="select_level" class="form-control input-xlg">
						                                    <option value="no level selected">Level</option>
						                                    <option value="Beginner">Beginner</option>
						                                    <option value="Intermediate">Intermediate</option>
						                                    <option value="Expert">Expert</option>
						                                </select>
													</div>
												</div>
											</div>
										</div>
									</div>

									<button class="btn btn-primary" style="float: right;  margin: 5px" value="submit" type="submit">Submit</button>
				</div>
				<!-- /content area -->