				<!-- Both borders -->
     <div class="page-container">
            <!-- Page content -->
            <div class="page-content">
                <!-- Main content -->
                <div class="content-wrapper">
                    <!-- Form horizontal -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
   						<h5 class="panel-title">Edit Real</h5>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                		<li><a data-action="close"></a></li>
		                	</ul>
	                	</div>
					</div>

					<div></div>

					<div class="panel-body">

	<form action="<?= base_url(); ?>c_atasan/updateReal" method="post">

					
		
							<?php 	
								foreach($nilai_app as $c){			
	 							
							 ?>	

				
					
					<div class="form-group" class="form-control input-xlg">
                        <label class="control-label col-lg-2">Indikator</label>
                            <div class="col-lg-10">
                            	<input type="hidden" name="id_real" value="<?=$c->id_real; ?>">
                                <input class="form-control input-xlg" readonly type="text" name="inp_ind" value= "<?php echo $c->indikator;?>">	
								
                          	</div>
                    </div>

                          
                    <!-- <div class="form-group" class="form-control input-xlg">
                        <label class="control-label col-lg-2">Nama karyawan</label>
                            <div class="col-lg-10">
                                <input class="form-control input-xlg" readonly type="text" name="inp_nama" value="<?php echo $c->username; ?>">	
							 </div>
                    </div> -->

                    
                    <div class="form-group" class="form-control input-xlg">
                        <label class="control-label col-lg-2">Real</label>
                            <div class="col-lg-10">
                                <input class="form-control input-xlg" type="text" name="inp_real" value="<?php echo $c->real; ?>">									
							</div>
					</div>
                       

				<?php 	}  ?>
		
					</div>
				</div>
				<div class="text-right" style="margin-top: 20px; margin-bottom: 40px; margin-right: 100px;">
     <input type="submit" value="kirim" class="btn btn-primary" value="Nilai"></td>
                        </div>
				<!-- /both borders -->



