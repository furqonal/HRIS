<!-- Both borders -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Performa Appraisal</h5> <br>
						<div class="heading-elements">
							<ul class="icons-list">
		                		
		                	</ul>
	                	</div>
					</div>

					<div class="panel-body">
						
					</div>

					<div class="table-responsive">
						<table class="table table-bordered">
				
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Karyawan</th>
									<th>Posisi</th>
									<th>SKU</th>
									<th>Indikator</th>
									<th>Tipe</th>
									<th>Satuan</th>
									<th>Bobot</th>
									<th>Waktu (bulan)</th>
									<th>Target</th>
									<th>Real</th>
									<th>Evidence</th>

								</tr>
							</thead>
							<tbody>
								<?php echo form_open_multipart('c_user/tes_performa_app') ?>
									<?php 
									$no=1;
									$i=1;
									foreach ($nilai_app as $performa) {
										echo "<tr>
												<td>$no</td>
												<td>".$performa->nip."</td>
												<td>".$performa->posisi."</td>
												<td>".$performa->sku."</td>
												<td>";												
												$ci = & get_instance();
												$ci->load->model('m_user');
												$where = array('indikator.id_user'=>$performa->id_user);								
												
												$result = $ci->m_user->get_indikator_join($where);
												foreach ($result as $res) {
													echo nl2br($res->indikator."\n");
													echo "<hr>";
												}
												
												echo  "</td>";
												
												echo "<td>";
													$ci = & get_instance();
													$ci->load->model('m_user');
													$where = array('tipe.id_user'=>$performa->id_user);								
													
													$result = $ci->m_user->get_tipe_join($where);
													foreach ($result as $res) {
														echo nl2br($res->tipe."\n");
														echo "<hr>";
													}
												echo  "</td>";

												echo "<td>";
													$ci = & get_instance();
													$ci->load->model('m_user');
													$where = array('satuan.id_user'=>$performa->id_user);								
													
													$result = $ci->m_user->get_satuan_join($where);
													foreach ($result as $res) {
														echo nl2br($res->satuan."\n");
														echo "<hr>";
													}
												echo  "</td>";

												echo "<td>";
													$ci = & get_instance();
													$ci->load->model('m_user');
													$where = array('bobot.id_user'=>$performa->id_user);								
													
													$result = $ci->m_user->get_bobot_join($where);
													foreach ($result as $res) {
														echo nl2br($res->bobot."\n");
														echo "<hr>";
													}
												echo  "</td>";

												echo "<td>";
													$ci = & get_instance();
													$ci->load->model('m_user');
													$where = array('waktu.id_user'=>$performa->id_user);								
													
													$result = $ci->m_user->get_waktu_join($where);
													foreach ($result as $res) {
														echo nl2br($res->waktu."\n");
														echo "<hr>";
													}
												echo  "</td>";

												
												echo "<td>";
													$ci = & get_instance();
													$ci->load->model('m_user');
													$where = array('target.id_user'=>$performa->id_user);								
													
													$result = $ci->m_user->get_target_join($where);
													
													
													foreach ($result as $res) {
														echo nl2br($res->target."\n");
														echo "<hr>";
													}
												echo"</td>";
												
												

												echo "<td>";													
													$where = array('indikator.id_user'=>$performa->id_user);
													$result = $ci->m_user->get_indikator_join($where);
													foreach ($result as $res) {
														echo "<input type='text' name='n_real".$i."' >			
														<input type='hidden' name='nama_karyawan".$i."' value=".$res->id_user.">
														<input type='hidden' name='indikator".$i."' value=".$res->indikator.">
														<input type='hidden' name='id_indikator".$i."' value=".$res->id_indikator.">";
														echo "<hr>";
													$i++;

													}
													
												
												echo "</td>";
													
												echo "<td>"	; 
												$i=1;
												$where = array('indikator.id_user'=>$performa->id_user);
													$result = $ci->m_user->get_indikator_join($where);
													foreach ($result as $res) {
														//echo 'berkas'.$i;
														echo "<input type='file' name='berkas".$i."'  >

															<input type='hidden' name='nama_karyawan".$i."' value=".$res->id_user.">
															<input type='hidden' name='indikator".$i."' value=".$res->indikator.">
															<input type='hidden' name='id_indikator".$i."' value=".$res->id_indikator.">";
													echo "<hr>";
													
													$i++;
												}
												echo "</td>";

													
											echo "</td></tr>";

										$no++;
									} ?>								
								
							</tbody>

						</table>

					</div>
					<div class="text-right" style="margin-top: 20px; margin-bottom: 40px; margin-right: 100px;">
                        <button type="submit" value="kirim" class="btn btn-primary">Kirim </i></button>
                        </div>
                        <?php echo form_close()?>

					<!-- /basic datatable -->
