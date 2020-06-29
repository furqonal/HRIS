<div class="content">
	<h6 class="content-group text-semibold">
					<h5 class="panel-title">Kompetensi Appraisal</h5>

				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="thumbnail">
							
						
					    	
				    	</div>
					</div>

					<!-- Custom table color -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                		<li><a data-action="close"></a></li>
		                	</ul>
	                	</div>
					</div>
				<form method="POST" action="<?php echo base_url().'c_atasan/tes'?>">
					<div class="table-responsive">
						<table class="table bg-slate-600">
							<thead>
								<?php 
								
								foreach($data_karyawan as $a){ 
								?>

								<?php } ?>
									<tr>
										<th> Nama : <?php echo $a->nama?></th>
									</tr>
									<?= "<input type='hidden' name='nip' value='".$a->nip."'" ?>

									<tr>
										<th>Nama Jabatan: <?php echo $a->nama_jabatan?></th>
									</tr>
									<tr>
										<th>Unit Kerja: <?php echo $a->unit_kerja?></th>
									</tr>
									<tr>
										<th>Atasan Langsung: <?php echo $a->atasan_langsung?></th>
									</tr>
									
									
							</tbody>
						</table>
					</div>
				</div>
				<!-- /custom table color -->



					<!-- Custom thead border color -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						
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
									<th>Nama Kompetensi</th>
									<!-- <th>Level</th> -->
									<th>Persyaratan Kompetensi</th>
									<th>Penilaian</th>
								</tr>
							</thead>
							<tbody>
									<?php 
									$no = 1;
									foreach($kompetensi as $u){ 										
										echo "<input type='hidden' name='no' value='".$no."'>";
									?>
								<tr>
									
								</tr>
							</thead>
							<tbody>
								
								<tr>
									<td>
										<?php 
												if($no%2<>0){
													echo $u->nama_competency;
												}
												echo "<input type='hidden' name='id_kompetensi$no' value='".$u->id_kompetensi."'";
										?>
									</td>
									<!-- <td>
										<?php echo $u->level_kompetensi?>
									</td> -->
									<td>
										<?php echo $u->detail;
												echo "<input type='hidden' name='id_detail$no' value='".$u->id_detail 	."'";
										?>
									</td>
									
									<td>
										<input type="radio" name="n_kompetensi<?=$no?>" value="5">Sangat Baik <br/>
										<input type="radio" name="n_kompetensi<?=$no?>" value="4">Baik <br/>
										<input type="radio" name="n_kompetensi<?=$no?>" value="3">Cukup <br/>
										<input type="radio" name="n_kompetensi<?=$no?>" value="2">Kurang <br/>
										<input type="radio" name="n_kompetensi<?=$no?>" value="1">Sangat Kurang <br/>
									</td>
									
									
								</tr>
								
								<!-- <tr>
									<td>
										2. Pengetahuan Produk <br/>
									</td>
									<td>
										3 <br/>
									</td>
									<td>
										<input type="radio" name="n_kompetensi2" value="5">Sangat Baik <br/>
										<input type="radio" name="n_kompetensi2" value="4">Baik <br/>
										<input type="radio" name="n_kompetensi2" value="3">Cukup <br/>
										<input type="radio" name="n_kompetensi2" value="2">Kurang <br/>
										<input type="radio" name="n_kompetensi2" value="1">Sangat Kurang <br/>
									</td>
									
								<tr>
									<td>
										3. Keahlian Komunikasi <br/>
									</td>
									<td>
										2 <br/>
									</td>
									<td>
										<input type="radio" name="n_kompetensi3" value="5">Sangat Baik <br/>
										<input type="radio" name="n_kompetensi3" value="4">Baik <br/>
										<input type="radio" name="n_kompetensi3" value="3">Cukup <br/>
										<input type="radio" name="n_kompetensi3" value="2">Kurang <br/>
										<input type="radio" name="n_kompetensi3" value="1">Sangat Kurang <br/>
									</td> 
									
									
								</tr> -->
								<?php 
									$no++;
							} 
							?>
								
								

							
							<!--<tr>
								<td></td>
								<td></td>
								<td>
									<?php 
										foreach ($nilai_komp as $nilai) {
											echo $nilai->nilai_komp;
										}
									 ?> 
								</td>
							</tr>-->
						</table>
						
								

						
					</div>

					
				</div>
				
				 		<div class="text-right" style="margin-top: 20px; margin-bottom: 40px; margin-right: 100px;">
                        <button type="submit" value="kirim" class="btn btn-primary">Kirim </i></button>
                        </div>

								<font  size="3" color='red'>Score :</font>
								<ul>
  									<li><font color='red'>Sangat baik = 5</font><br></li>
  									<li><font color='red'>Baik = 4</font><br></li>
  									<li><font color='red'>Cukup = 3</font><br></li>
  									<li><font color='red'>Kurang = 2</font><br></li>
  									<li><font color='red'>Sangat kurang = 1</font><br></li>
								</ul>

								
<!-- custom thead border color -->



						
				</table>

					<!-- /basic datatable -->

