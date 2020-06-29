<div class="panel panel-flat">
					<div class="panel-heading">
									 <?php foreach ($pengelompokan as $pk) {
									 	# code...
									 } ?>
									 	<?php   	echo 'Kompetensi '.$pk->nama_competency."<br>"; ?>
						
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
									<th>Tanggal</th>
									<th>Nilai</th>
									<th>Status</th>
									<th>Grafik</th>

									
								</tr>
							</thead>
							<tbody>
									
							
								
								
								<?php 
										$no=1;
									 ?>									
									<?php 

										foreach($pengelompokan as $a){ ?>
										<tr>
													<?php echo "<td>".$no++."</td>";
													 echo "<td>".$a->nama;
													?>
													</td>

									
									 <td>
									 	<?php echo date('l, d F Y', strtotime($a->tanggal))."<br>"; ?>
									</td>


							
								<td>
									<?php 	echo $a->total."<br>"; ?>
								</td>

								<?php if($a->status == 1){?>
										<td><a href="<?php echo base_url().'c_user/rekomendasi_training/'.$a->id_kompetensi.'/'. $a->total ?>"><button type="submit" value="kirim" class="btn btn-primary">Rekomendasi Training </i></button></a></td>
									<?php }else{ ?>
										<td>	<?php echo ('nothing');?> </td>
									
								<?php } ?>							

								
								<?php if($a->tanggal > 1){?>
										<td><a href="<?php echo base_url().'c_user/grafik/'.$a->nip.'/'.$a->id_kompetensi?>"><button type="submit" value="kirim" class="btn btn-primary">Lihat grafik </i></button></a></td>
									<?php }else{ ?>
										<td>	<?php echo ('');?> </td>
									
								<?php } ?>							
									 
								

								</tr>

								<?php } ?>

							</tbody>
						</table>

					</div>

				</div>
				<!-- /both borders -->
						<!-- <div class="text-right" style="margin-top: 20px; margin-bottom: 40px; margin-right: 100px;">
									<?php if($a->total<=6){?>
										<a href="<?php echo base_url().'c_user/rekomendasi_training/'.$a->id_kompetensi.'/'. $a->total ?>"><button type="submit" value="kirim" class="btn btn-primary">Rekomendasi Training </i></button></a>
									<?php }else{ ?>
										<span class="label label-success">Sudah memenuhi</span>
										<?php }?>
                        
                        </div>
 -->
