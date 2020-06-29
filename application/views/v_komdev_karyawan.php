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
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
									
							<?php 
										$nmbr = 1;
										foreach($komdev_karyawan as $a){ 
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

									
									 	<?php echo $a->nilai_komp  ?>

									 
									 </td>

									 <?php if($a->status == 1){?>
										<td><?php echo ("Anda direkomendasikan mengikuti training "); echo $a->nama_competency?></td>
									<?php }else{ ?>
										<td>	<?php echo ('nothing');?> </td>
									
								<?php } ?>							
								</tr>
								<?php $nmbr = $nmbr +1; } ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /both borders -->
				

