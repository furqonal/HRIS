<div class="content">

				<!-- Basic Scroller example -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Data Kompetensi</h5>
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

					<table class="table datatable-basic" >
						<thead>
							<tr>
					            <th>No</th>
					            <th>Nama Kompetensi</th>
					            <th>Aksi</th>
					            
					        </tr>
						</thead>
						<tbody>
							
								<?php 
										$no=1;
									 ?>									
									<?php 

										foreach($kompetensi as $a){ ?>
										<tr>
													<?php echo "<td>".$no++."</td>";
													 echo "<td>".$a->nama_competency;
													?>
													</td>

													<td>
														<div class="text-left" style="margin-top: 20px; margin-bottom: 40px; margin-right: 100px;">
															<a href="<?php echo base_url().'c_user/pengelompokan/'.$a->id_kompetensi ?>">
										                        <button type="submit" value="kirim" class="btn btn-primary">Lihat data </i></button>
										                        </div>
													</td>
									<?php } ?>																	

							</tr>
						</tbody>
					</table>
				</div>
				<!-- /basic Scroller example -->
			</div>