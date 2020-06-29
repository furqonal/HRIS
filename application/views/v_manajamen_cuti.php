<div class="content">
<!-- Basic datatable -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<?php
				if ($this->session->flashdata('failed')) { ?>
		 		<div class="col-md-12 alert alert-danger"><?php echo $this->session->flashdata('failed')?> 
    				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 				 </div>
			<?php }
			?>
			<h5 class="panel-title">Manajemen Cuti</h5>
		</div>

		<form id="formdatapersonal" method="POST" class="form-horizontal form-validate-jquery" action="<?= base_url()?>c_karyawan/pengajuanCuti" enctype= "multipart/form-data" >
			<fieldset class="content-group">
				
				<?php
					foreach ($datapersonal as $key) {

					}
				?>	

				<div class="panel-body">
					<legend class="text-bold">Manajemen Cuti</legend>

					<div class="form-group">
						<label class="control-label col-lg-3">NIP<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="text" class="form-control" required="required" placeholder="Masukan tanggal capeg" value="<?= $key->nip?>" disabled >
							<input type="hidden" name="nip" class="form-control" required="required" placeholder="Masukan tanggal capeg" value="<?= $key->nip?>" >
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-3">Nama Karyawan<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="text" name="namakaryawan" class="input form-control" required="required" placeholder="Masuk Nomer Induk Pegawai" value="<?= $key->nama?>" disabled  >
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-3">Jabatan<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="text" name="jabatan" class="form-control" required="required" placeholder="Masukan tanggal capeg" value="<?= $key->nama_jabatan?>" disabled >
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-3">Unit<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="text" name="unit" class="form-control" required="required" placeholder="Masukan tanggal capeg" value="<?= $key->unit?>" disabled >
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-3">Tanggal Pengajuan<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="date" name="tgl_pengajuan" class="form-control" required="required" placeholder="Masukan tanggal capeg"  >
						</div>
					</div>

					<!-- <div class="form-group">
						<label class="control-label col-lg-3">Sampai Tanggal<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="date" name="sampai_tgl" class="form-control" required="required" placeholder="Masukan tanggal capeg"  >
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-3">Lama Cuti<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="number" name="lamacuti" class="form-control" required="required" placeholder="Masukan lama cuti"  >
						</div>
					</div> -->

					<div class="form-group">
						<label class="control-label col-lg-3">Jenis Cuti<span class="text-danger">*</span></label>
							<div class="col-lg-9">
							<select name="jeniscuti" class="jeniscuti form-control" value="<?= $key->status_karyawan?>" >
								<option disabled="">Pilih jenis cuti</option>
								<?php
									foreach ($jeniscuti as $row) { ?>
									<option value="<?=$row->id_cuti?>"><?=$row->nama_cuti?></option>
								<?php	}
								?>
								
							</select>
							</div>
					</div>
					<div id="jumlahCuti"></div>

					
					
				</div>
			</fieldset> 
		
			<div class="panel-footer">
				<?php
					foreach ($pengajuanCuti as $row ) {
					}

					if (empty($pengajuanCuti)) {
					}elseif ($row->p_ataasan1 == "Sudah disetujui" && $row->p_ataasan2 == "Sudah disetujui" ) { ?>
				<a class="btn btn-success" style="float: left; margin: 5px" href="<?= base_url()?>c_hrd/cetak_suratCuti/<?= $this->session->userdata('nip')?>/<?= $row->id_pengajuan_cuti?>">Pengajuan Cuti</a>
				<?php	} else {

				}
				?>
				<a  class="btn btn-danger" style="float: right; margin: 5px" >cancel</a>
				<button  class="btn btn-primary" style="float: right; margin: 5px" value="submit" type="submit">Submit</button>
			</div>

			</form>	
		<!-- <div class="panel-footer">
			
			<a href="<?= base_url()?>c_user/pengalaman_kerja/1" class="btn btn-primary" style="float: right; margin: 5px">Pengalaman kerja </a>
			<a href="<?= base_url()?>c_user/pengalaman_kerja/2" class="btn btn-success" style="float: right; margin: 5px">Pelatihan</a>
			
		</div> -->
	</div>
	<!-- /basic datatable -->
