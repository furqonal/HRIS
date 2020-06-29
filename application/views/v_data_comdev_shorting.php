	<div class="content">
					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Kompetensi Development</h5>
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
									<th>Kompetensi</th>
									
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($dataJobProfile as $key) { ?>
								<tr>
									<td><?= $key->nama_jabatan?></td>
									<td><?= $key->unit_kerja?></td>
									<td><?= $key->atasan_langsung?></td>
									<td><?= $key->bawahan_langsung?></td>
									<td>
										<?php
											if ($key->status == 0) { ?>
												<a class="btn btn-danger btn-sm">Belum di ACC</a>
											<?php } elseif ($key->status == 1) { ?>
												<a class="btn btn-success btn-sm">Sudah di ACC</a>
											<?php } ?>
									</td>
									<td><a class="fa fa-search fa-1x"  href="detail_job_profile/<?php echo $key->id_job_profile ?>"	></a></td>
								</tr>
								<?php	}
								?>
							</tbody>
						</table>
					</div>
					<!-- /basic datatable -->
