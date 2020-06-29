<div class="content">
					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Pengajuan Pengalaman Kerja</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			 
			                	</ul>
		                	</div>
						</div>

						<table class="table datatable-basic">
							<thead>
								<tr>
									<th>NIP</th>
									<th>Nama</th>
									<th>Unit</th>
									<th>Jabatan</th>
									<th>Nama Perusahaan</th>
									<th>Posisi</th>
									<th>Tgl Mulai</th>
									<th>Tgl Berkahir</th>
									<th>Status</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($dataPengalamanKerja as $key) { ?>
								<tr>
									<td><?= $key->nip?></td>
									<td><?= $key->nama?></td>
									<td><?= $key->unit?></td>
									<td><?= $key->nama_jabatan?></td>
									<td><?= $key->nama_perusahaan?></td>
									<td><?= $key->posisi?></td>
									<td><?= $key->tgl_mulai?></td>
									<td><?= $key->tgl_berakhir?></td>
									<td>
										<?php
											if ($key->status == "Belum disetujui") { ?>
												<a class="btn btn-danger btn-sm"><?= $key->status?></a>
											<?php } elseif ($key->status == "Sudah disetujui") { ?>
												<a class="btn btn-success btn-sm"><?= $key->status?></a>
											<?php } elseif ($key->status == "Tidak disetujui") { ?>
												<a class="btn btn-danger btn-sm"><?= $key->status?></a>
										<?php	}
										?>
									</td>
									<td><a class="fa fa-search fa-1x" data-toggle="modal" data-target="#modal_form_horizontal"></a></td>
								</tr>
								<?php	}
								?>

					<!-- Horizontal form modal -->
					<div id="modal_form_horizontal" class="modal fade">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h5 class="modal-title">Horizontal form</h5>
								</div>

								<form method="POST" action="<?= base_url()?>c_hrd/a_persetujuanPengalamanKerja" class="form-horizontal">
									<div class="modal-body">
										<div class="form-group">
											<label class="control-label col-sm-3">NIP</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->nip?></label>
												<input type="hidden" name="idpengalamankerja" value="<?= $key->id_pengalamankerja?>"></input>
												
											</div>
											<class="form-group">
											<label class="control-label col-sm-3">Nama</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->nama?></label>
											</div>
											<label class="control-label col-sm-3">Unit</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->unit?></label>
											</div>
											<label class="control-label col-sm-3">Jabatan</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->nama_jabatan?></label>
											</div>
											<label class="control-label col-sm-3">Nama Perusahaan</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->nama_perusahaan?></label>
											</div>
											<label class="control-label col-sm-3">Posisi</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->posisi?></label>
											</div>
											<label class="control-label col-sm-3">Tanggal Mulai</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->tgl_mulai?></label>
											</div>
											<label class="control-label col-sm-3">Tanggal Berkahir</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->tgl_berakhir?></label>
											</div>
										</div>
									</div>

									<div class="modal-footer">
										<button name="persetujuan" value="Sudah disetujui" class="btn btn-success">Setujui</button>
										<button name="persetujuan" value="Tidak disetujui" class="btn btn-danger">Tidak disetujui</button>
										
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- /horizontal form modal -->
							</tbody>
						</table>
					</div>

					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Pengajuan Pelatihan</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			 
			                	</ul>
		                	</div>
						</div>

						<table class="table datatable-basic">
							<thead>
								<tr>
									<th>NIP</th>
									<th>Nama</th>
									<th>Unit</th>
									<th>Jabatan</th>
									<th>Nama Pelatihan</th>
									<th>Tahun</th>
									<th>Sertifikat</th>
									<th>Status</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($dataPelatihan as $row) { ?>
								<tr>
									<td><?= $row->nip?></td>
									<td><?= $row->nama?></td>
									<td><?= $key->nama_jabatan?></td>
									<td><?= $key->unit?></td>
									<td><?= $row->nama_pelatihan?></td>
									<td><?= $row->tahun?></td>
									<td><?= $row->sertifikat?></td>
									<td>
										<?php
											if ($row->status == "Belum disetujui") { ?>
												<a class="btn btn-danger btn-sm"><?= $row->status?></a>
											<?php } elseif ($row->status == "Sudah disetujui") { ?>
												<a class="btn btn-success btn-sm"><?= $row->status?></a>
											<?php } elseif ($row->status == "Tidak disetujui") { ?>
												<a class="btn btn-danger btn-sm"><?= $row->status?></a>
										<?php	}
										?>
									</td>
									<td><a class="fa fa-search fa-1x" data-toggle="modal" data-target="#modal_form_vertical"></a></td>
								</tr>
								<?php	}
								?>

					<!-- Horizontal form modal -->
					<div id="modal_form_vertical" class="modal fade">
						<div class="modal-dialog modal-lg">
							<div class="modal-content" style="height: 300px"> 
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h5 class="modal-title">Horizontal form</h5>
								</div>

								<form method="POST" action="<?= base_url()?>c_hrd/a_persetujuanPelatihan" class="form-horizontal">
									<div class="modal-body">
										<div class="form-group">
											
											<label class="control-label col-sm-3">NIP</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $row->nip?></label>
												<input type="hidden" name="idpelatihan" value="<?= $row->id_pelatihan?>"></input>
												<!-- <input type="hidden" name="id" value="<?= $key->id_pengajuan?>"></input>
												<input type="hidden" name="nip" value="<?= $key->nip?>"></input> -->
											</div>
											<class="form-group">
											<label class="control-label col-sm-3">Nama</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $row->nama?></label>
											</div>
											<label class="control-label col-sm-3">Unit</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $row->unit?></label>
											</div>
											<label class="control-label col-sm-3">Jabatan</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $row->nama_jabatan?></label>
											</div>
											<label class="control-label col-sm-3">Nama Pelatihan</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $row->nama_pelatihan?></label>
											</div>
											<label class="control-label col-sm-3">Tahun Pelatihan</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $row->tahun?></label>
											</div>
											<label class="control-label col-sm-3">Sertifikat</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $row->sertifikat?></label>
											</div>
											</div>
										</div>

										<div class="modal-footer">
										<button name="persetujuan" value="Sudah disetujui" class="btn btn-success">Setujui</button>
										<button name="persetujuan" value="Tidak disetujui" class="btn btn-danger">Tidak disetujui</button>
										
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- /horizontal form modal -->
							</tbody>
						</table>
					</div>
					<!-- /basic datatable -->
