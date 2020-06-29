	<div class="content">
					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<center>	<h5 class="panel-title">Detail Job Profile</h5></center>
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

						<div class="panel-heading">
							<?php 	foreach ($dataJobProfileByid as $jp) {
								?>
								<h6 class="panel-title"><b>Nama Jabatan : </b><?php echo $jp->nama_jabatan?></h6> 
								<h6 class="panel-title"><b>Unit Kerja : </b><?php echo $jp->unit_kerja?></h6>
								<h6 class="panel-title"><b>Atasan Langsung : </b><?php echo $jp->atasan_langsung?></h6>
								<h6 class="panel-title"><b>Bawahan Langsung : </b><?php echo $jp->bawahan_langsung?></h6>

							
							
						</div>
					</div>

					<div class="panel panel-flat">
						<div class="panel-heading">	
						<h6 class="panel-title"><b>Tujuan Jabatan : </b><?php echo $jp->tujuan_jabatan?></h6>
						</div>
					</div>
					<?php
							} ?>

					
						
						<div class="panel panel-flat">
						<!-- Basic table -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h6 class="panel-title"><b>Tugas Pokok</b></h6>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>No</th>
										<th>Uraian</th>
									</tr>
								</thead>
								<tbody>
									<?php 	foreach ($dataTugaspokok as $tp) {
									?>
									<tr>
										<td><?php 	echo $tp->id_tugas_pokok ?></td>
										<td><?php 	echo $tp->uraian; ?></td>
									</tr>
									<?php
									} ?>
									
								</tbody>
							</table>
						</div>
					</div>
					<!-- /basic table -->
						</div>

						<div class="panel panel-flat">
						<!-- Basic table -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h6 class="panel-title"><b>Indikator Keberhasilan Kerja</b></h6>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>No</th>
										<th>Indikator</th>
									</tr>
								</thead>
								<tbody>
									<?php 	foreach ($dataIndikatorKeberhasilan as $ik) {
									?>
									<tr>
										<td><?php 	echo $ik->id_indikator_keberhasilan ?></td>
										<td><?php 	echo $ik->indikator; ?></td>
									</tr>
									<?php
									} ?>
									
								</tbody>
							</table>
						</div>
					</div>
					<!-- /basic table -->
						</div>

						<div class="panel panel-flat">
						<!-- Basic table -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h6 class="panel-title"><b>Spesifikasi Jabatan</b></h6>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Pendidikan Minimal :</th>
										<th>Status Kepegawaian</th>
										<th>Kompetensi inti</th>
										<th>Kualitas personal</th>
										<th>Keahlian dan Pengetahuan</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php 	echo $jp->pendidikan_minimal ?></td>
										<td><?php 	echo $jp->status_kepegawaian ?></td>
										<td><?php 	foreach ($dataKompetensiInti as $ki) {
											echo "- ".$ki->kompetensi_inti."<br>";
										} ?></td>
										<td><?php 	foreach ($dataKualitasPersonal as $kp) {
											echo "- ".$kp->kualitas_personal."<br>";
										} ?></td>
										<td><?php 	foreach ($dataKeahlianPengetahuan as $knp) {
											echo "- ".$knp->kompetensi_keahlian." (".$knp->level_keahlian.")"."<br>";
										} ?></td>
									</tr>
									
								</tbody>
							</table>
						</div>
					</div>
					<!-- /basic table -->
						</div>
					
					<!-- /basic datatable -->
