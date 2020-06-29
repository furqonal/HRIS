
<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Performa Appraisal</h5>
						<?php
						
						
								
						?>
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
						<table class="table table-bordered">
				
							<thead>
								<tr>
									<th>No</th>
									<th>Nip</th>
									<!-- <th>Posisi</th> -->
									<th>SKU</th>
									<th>Indikator</th>
									<th>Tipe</th>
									<th>Satuan</th>
									<th>Bobot</th>
									<th>Waktu (bulan)</th>
									<th>Target</th>
									<th>Real</th>
									<th>Nilai</th>
									<th>Evidence</th>
									<th>Approval</th>
								</tr>
							</thead>
							<tbody>
									<?php 	

									$no=1;
									foreach ($nilai_app as $performa) {
										echo "<tr>
												<td>$no</td>
												<td>".$performa->nip."</td>
												
												<td>".$performa->sku."</td>
												<td>";												
												$ci = & get_instance();
												$ci->load->model('m_user');
												$where = array('indikator.id_user'=>$performa->id_user);								
												
												$result = $ci->m_user->get_indikator_join($where);
												foreach ($result as $res) {
													echo nl2br($res->indikator."\n");
													echo"<hr>";
												}
												
												echo  "</td>";
												
												echo "<td>";
													$ci = & get_instance();
													$ci->load->model('m_user');
													$where = array('tipe.id_user'=>$performa->id_user);								
													
													$result = $ci->m_user->get_tipe_join($where);
													foreach ($result as $res) {
														echo nl2br($res->tipe."\n");
														echo"<hr>";
													}
												echo  "</td>";

												echo "<td>";
													$ci = & get_instance();
													$ci->load->model('m_user');
													$where = array('satuan.id_user'=>$performa->id_user);								
													
													$result = $ci->m_user->get_satuan_join($where);
													foreach ($result as $res) {
														echo nl2br($res->satuan."\n");
														echo"<hr>";
													}
												echo  "</td>";

												echo "<td>";
													$ci = & get_instance();
													$ci->load->model('m_user');
													$where = array('bobot.id_user'=>$performa->id_user);								
													
													$result = $ci->m_user->get_bobot_join($where);
													foreach ($result as $res) {
														echo nl2br($res->bobot."\n");
														echo"<hr>";
													}
												echo  "</td>";

												echo "<td>";
													$ci = & get_instance();
													$ci->load->model('m_user');
													$where = array('waktu.id_user'=>$performa->id_user);								
													
													$result = $ci->m_user->get_waktu_join($where);
													foreach ($result as $res) {
														echo nl2br($res->waktu."\n");
														echo"<hr>";
													}
												echo  "</td>";

												
												echo "<td>";
													$ci = & get_instance();
													$ci->load->model('m_user');
													$where = array('target.id_user'=>$performa->id_user);								
													
													$result = $ci->m_user->get_target_join($where);
													
													
													foreach ($result as $res) {
														echo nl2br($res->target."\n");
														echo"<hr>";
													}
										
												echo "</td>";

												echo "<td>";
													$ci = & get_instance();
													$ci->load->model('m_user');
													$where = array('real.id_user'=>$performa->id_user);								
													
													$result = $ci->m_user->get_real_join($where);
													
													
													foreach ($result as $res) {
														 if($res->status==0){
														echo nl2br($res->real."<a href='EditReal/".$res->id_real."'>/Edit\n</a>");
														}else{
															echo nl2br($res->real."\n");
														}
															echo"<hr>";
													}
													
													

													
												echo "</td>";
												
												

												echo "<td>";
												$where = array('indikator.id_user'=>$performa->id_user);											
												$result = $ci->m_user->get_indikator_join($where);												
												foreach ($result as $res) {
													$where = array('indikator.id_indikator'=>$res->id_indikator);
													$result2 = $ci->m_user->cari_nilai($where);													
													foreach ($result2 as $res2){														
														$tipe = $res2->tipe;
														if (strcmp($tipe, 'Higher Better')){
															$value = $res2->real/$res2->target;
														}else if (strcmp($tipe, 'Lower Better')){
															$value = $res2->target/$res2->real;
														}
														echo nl2br($value."\n");
														echo"<hr>";
													}
												}							
												echo"</td>";

												echo"<td>"; 

													$ci = & get_instance();
													$ci->load->model('m_user');
													$where = array('real.id_user'=>$performa->id_user);								
													
													$result = $ci->m_user->get_real_where($where);
													
													
													foreach ($result as $res) {
														echo nl2br($res->evidence."<a href='Evidence/".$res->evidence."'>/View\n</a>");
														echo"<hr>";
													}
													
												echo"</td>";

												echo"<td>";
													$ci = & get_instance();
													$ci->load->model('m_user');
													$where = array('real.id_user'=>$performa->id_user);								
													
													$result = $ci->m_user->get_real_where($where);
													
													
													foreach ($result as $res) { ?>
														<?php if($res->status==0){
														echo "<input type='hidden' name='id_indikator' value='$res->id_indikator'>";
														echo nl2br("<a href='Approval/$res->id_indikator'><button type='submit' value='kirim' class='btn btn-primary'> Approv </button></a>");
														echo"<hr>";
														} else {
															echo nl2br("<span class='label label-success'>Sudah diaprov</span>");
															echo "<hr>";
														}
														
												}
												
												echo"</td>";
										$no++;
										
									} ?>
									
							</tbody>


						</table>
					