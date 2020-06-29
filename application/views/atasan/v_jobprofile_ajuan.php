	<div class="content">
					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Data Job Profile</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			 
			                	</ul>
		                	</div>
						</div>

						<div>
							<?php
								if ($this->session->flashdata('success')) { ?>
						 		<div class="col-md-12 alert alert-success"><?php echo $this->session->flashdata('success')?> 
				    				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				 				</div>
							<?php } elseif ($this->session->flashdata('failed')) { ?>
								<div class="col-md-12 alert alert-danger"><?php echo $this->session->flashdata('failed')?> 
				    				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				 				</div>
							<?php }
							?>
						</div>
						<table class="table datatable-basic">
							<thead>
								<tr>
									<th>Nama Jabatan</th>
									<th>Unit Kerja</th>
									<th>Atasan Langsung</th>
									<th>Bawahan Langsung</th>
									<th>Status</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($jobprofile as $key) { ?>
								<tr>
									<td><?= $key->nama_jabatan?></td>
									<td><?= $key->unit_kerja?></td>
									<td><?= $key->atasan_langsung?></td>
									<td><?= $key->bawahan_langsung?></td>
									<td>
										<?php
											if ($key->status == 0) { ?>
												<a href="update_job_profile/<?php echo $key->id_job_profile ?>"
												class="btn btn-danger btn-sm">ACC</a>
											<?php } elseif ($key->status == 1) { ?>
												<a class="btn btn-success btn-sm">Sudah di ACC</a>
											<?php } ?>
									</td>
									<td><a class="fa fa-search fa-1x"  href="detail_job_profile/<?php echo $key->id_job_profile ?>"	></a> &nbsp <a class="fa fa-pencil fa-1x"  href="edit_jobprofile/<?php echo $key->id_job_profile ?>"	></a></td>
								</tr>
								<?php	}
								?>
							</tbody>
						</table>
					</div>
					<!-- /basic datatable -->
