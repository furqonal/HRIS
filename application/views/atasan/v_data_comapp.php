<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Kompetensi Development</h5>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                		<li><a data-action="close"></a></li>
		                	</ul>
	                	</div>
					</div>

					<div class="panel-body">
						
					</div>

									
					<div class="table-responsive">
						<table class="table">
							<thead>
							<tr class="border-bottom-danger">
									<th>No</th>
									<th>Nama</th>
									<th>Status</th>
									<th>Tanggal</th>
									<th>Aksi</th>
									<th>Lihat Nilai</th>
									
									
								</tr>
							</thead>
							<tbody>
								
									<?php 
										$no=1;
									 ?>									
									<?php 

										foreach($data_komp_karyawan as $a){ ?>
										<tr>
													<?php echo "<td>".$no++."</td>";
													 echo "<td>".$a->nama;

											
										?>

									<?php if($a->nilai_komp==0){?>
										<td><span class="label label-danger">Belum dinilai</span></td>
										
										<td><a href="<?php echo base_url().'c_atasan/komp_appraisal/'.$a->nip_karyawan ?>"><button type="submit" value="kirim" class="btn btn-primary">Nilai </i></button></a></td>
									<?php }else{ ?>
										<td><span class="label label-success">Sudah dinilai</span></td>
										<td> <?php echo date('l, d F Y', strtotime($a->tanggal)); ?></td>
										<td><a href="<?php echo base_url().'c_atasan/komp_appraisal/'.$a->nip_karyawan ?>"><button type="submit" value="kirim" class="btn btn-primary">Nilai </i></button></a></td>
									<?php }?>

									<td>
										<a href="<?php echo base_url().'c_atasan/lihat_nilai/'.$a->nip_karyawan ?>"><button type="submit" value="kirim" class="btn btn-primary">Lihat Nilai </i></button></a>
									</td>
									
									</tr>
									<?php } ?>
								
								

							</tbody>
						</table>
					
				</div>
				<!-- /both borders -->
				

