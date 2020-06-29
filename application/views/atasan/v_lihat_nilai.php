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
									<th>Kompetensi</th>
									<th>Tanggal</th>
									<th>Nilai</th>
									<th>Pengajuan training</th>
								</tr>
							</thead>
							<tbody>
									
							<?php 
										$nmbr = 1;
										foreach($lihat_nilai as $a){ 
										?>
								<tr >
									<td><?php echo $nmbr; ?></td>
									<td>
										<?php	
													 echo $a->nama;
											
										?>
									</td>
									<td>
									
									 
									 	<?php 	echo $a->nama_competency."<br>"; ?>									 	
									 

									 
									 </td>
									 <td>
									
									 
									 	<?php 	echo $a->tanggal."<br>"; ?>									 	
									 

									 
									 </td>
									 
									 <td>

									
									 	<?php echo $a->total  ?>

									 
									 </td>
									 <td>
									 	<?php if($a->total<=6 && $a->status==0){?>
										<a href="<?php echo base_url().'c_atasan/status/'.$a->nip.'/'.	$a->id_kompetensi.'/'. $a->total.'/'.$a->tanggal ?>"><button type="submit" value="kirim" class="btn btn-primary">Kirim </i></button></a>
									<?php }elseif ($a->status==1){ ?>
										<span class="label label-success"> sedang mengajukan training</span>
									<?php }else {?>
										<span class="label label-success"> sudah memenuhi</span>
										<?php }?>
									 </td>

								</tr>
								<?php $nmbr = $nmbr +1; } ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /both borders -->
				

