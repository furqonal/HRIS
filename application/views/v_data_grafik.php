<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Grafik</h5>
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
									
									<th>Aksi</th>
									
									
								</tr>
							</thead>
							<tbody>
								
									<?php 
										$no=1;
									 ?>									
									<?php 

										foreach($grafik as $a){ ?>
										<tr>
													<?php echo "<td>".$no++."</td>";
													 echo "<td>".$a->nama;

											
										?>

										<td><a href="<?php echo base_url().'c_user/grafik/'.$a->nip_karyawan ?>"><button type="submit" value="kirim" class="btn btn-primary">Lihat grafik </i></button></a></td>

									</tr>
									<?php } ?>
								
								

							</tbody>
						</table>
					
				</div>
				<!-- /both borders -->
				

