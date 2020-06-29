
					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2017. <a href="#">HRIS</a> by <a href="#" target="_blank">TM</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	<script type="text/javascript">
		$(document).on('click', '#editbutton', function(){
			//document.getElementById('namalengkap').disabled = true;
			$('#formdatapersonal :input').prop("disabled", false);
			document.getElementById('submitedit').style.display = "block";
			document.getElementById('editbutton').style.display = "none";
			document.getElementById('cancelbutton').style.display = "block";
		});

		$(document).on('click', '#cancelbutton', function(){
			$('#formdatapersonal :input').prop("disabled", true);
			document.getElementById('submitedit').style.display = "none";
			document.getElementById('editbutton').style.display = "block";
			document.getElementById('cancelbutton').style.display = "none";
		});
	</script>
	<script type="text/javascript">
		$(document).on('click', '.detailData', function (){
			var  id_cuti = $(this).attr("id");

			$.ajax({
				url: '<?= base_url()?>c_atasan/detailCuti/'+id_cuti,
				method: 'POST',
				data:{id_cuti: id_cuti},
				success: function(data){
					$('.content_modal').html(data);
					//alert('ok');
				}
			});
			
		});
	</script>

	<script type="text/javascript">
		$(document).on('click', '.detailDinas', function (){
			var  id_dinas = $(this).attr("id");

			$.ajax({
				url: '<?= base_url()?>c_atasan/detailDinas/'+id_dinas,
				method: 'POST',
				data:{id_dinas: id_dinas},
				success: function(data){
					$('.content_modal').html(data);
					//alert('ok');
				}
			});
			
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){

			function load_unseen_notification(view = ''){
				$.ajax({
					url: '<?= base_url()?>c_hrd/fetch',
					method: 'POST',
					data: {view:view},
					dataType: "json",
					success : function(data){
						$('.dropdown-menu').html(data.notification);
						if(data.unseen_notification > 0){
							$('.count').html(data.unseen_notification);
						}
					}
				})
			}

			load_unseen_notification();

		});

	</script>

	<script type="text/javascript">
		$('.jeniscuti').change(function(){
      		var id_cuti = $(this).val();

      		 $.ajax({
		        url:"<?php echo base_url()?>c_user/getJenisCuti",
		        type:"GET",
		        data:{'id_cuti' : id_cuti},
		        success: function(data){
		         $('#jumlahCuti').html(data);
		        },
		        error: function(){
		          alert('Error!');
		        }
		      });

		});

	</script>

	<script type="text/javascript">
	 	
	 	 jQuery(document).ready(function($){

            $(document).on('click', '.tambahkaryawan', function(event){
                event.preventDefault();

                // $("div#submit").css("display","block");
                addFileInput();
                
            });

            function addFileInput(){
           	var html = '';
            html += '<div class="form-group alert">';
            html += '<label class="control-label col-lg-3">NIP<span class="text-danger">*</span></label>';
            html += '<div class="col-lg-8">';
            html += '<input type="text" name="nip[]" class="form-control" required="required" placeholder="Masukan NIP" >';
            html += '</div>';
            html += '<div class="col-md-1" >';
            html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            html += '</div>';
            html += '</div>';
        	html += '<div class="form-group alert">';
            html += '<label class="control-label col-lg-3">Jabatan<span class="text-danger">*</span></label>';
            html += '<div class="col-lg-8">';
            html += '<select class="form-control" name="namajabatan[]">';
            html += '<option value=1>Atasan 1</option>';
            html += '<option value=2>Atasan 2</option>';
            html += '<option value=3>HRD</option>';
            html += '<option value=4>Karyawan</option>';
            html += '</select>';
            html += '</div>';
            html += '<div class="col-md-1" >';
            html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            html += '</div>';
            html += '</div>';


           

            $('.anggotaPerjalanan').append(html);
        }
    });

	 </script>

	 <script type="text/javascript">
	 	
	 	 jQuery(document).ready(function($){

            $(document).on('click', '.tambahtugaspokok', function(event){
                event.preventDefault();

                // $("div#submit").css("display","block");
                addFileInput();
                
            });

            function addFileInput(){
           	var html = '';
            html += '<div class="form-group alert">';
            html += '<label class="control-label col-lg-3">Tugas Pokok<span class="text-danger">*</span></label>';
            html += '<div class="col-lg-8">';
            html += '<input type="text" name="uraian_tugas_pokok[]" class="form-control" required="required" placeholder="Masukan uraian tugas pokok" >';
            html += '</div>';
            html += '<div class="col-md-1" >';
            html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            html += '</div>';
            html += '</div>';
        	


           

            $('.tugaspokokdata').append(html);
        }
    });

	 </script>

	 <script type="text/javascript">
	 	
	 	 jQuery(document).ready(function($){

            $(document).on('click', '.tambahindikator', function(event){
                event.preventDefault();

                // $("div#submit").css("display","block");
                addFileInput();
                
            });

            function addFileInput(){
           	var html = '';
            html += '<div class="form-group alert">';
            html += '<label class="control-label col-lg-3">Indikator keberhasilan kerja<span class="text-danger">*</span></label>';
            html += '<div class="col-lg-8">';
            html += '<input type="text" name="indikator_keberhasilan_kerja[]" class="form-control" required="required" placeholder="Masukan indikator keberhasilan kerja" >';
            html += '</div>';
            html += '<div class="col-md-1" >';
            html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            html += '</div>';
            html += '</div>';
        	


           

            $('.indikatordata').append(html);
        }
    });

	 </script>

	 <script type="text/javascript">
	 	
	 	 jQuery(document).ready(function($){

            $(document).on('click', '.tambahki', function(event){
                event.preventDefault();

                // $("div#submit").css("display","block");
                addFileInput();
                
            });

            function addFileInput(){
           	var html = '';
            html += '<div class="form-group alert">';
            html += '<label class="control-label col-lg-3">Kompetensi Inti<span class="text-danger">*</span></label>';
            html += '<div class="col-lg-8">';
            html += '<input type="text" name="kompetensi_inti[]" class="form-control" required="required" placeholder="Masukan Kompetensi Inti" >';
            html += '</div>';
            html += '<div class="col-md-1" >';
            html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            html += '</div>';
            html += '</div>';
            $('.kidata').append(html);
        }
    });

	 </script>

	 <script type="text/javascript">
	 	
	 	 jQuery(document).ready(function($){

            $(document).on('click', '.tambahkp', function(event){
                event.preventDefault();

                // $("div#submit").css("display","block");
                addFileInput();
                
            });

            function addFileInput(){
           	var html = '';
            html += '<div class="form-group alert">';
            html += '<label class="control-label col-lg-3">Kualitas Personal<span class="text-danger">*</span></label>';
            html += '<div class="col-lg-8">';
            html += '<input type="text" name="kualitas_personal[]" class="form-control" required="required" placeholder="Masukan Kualitas Personal" >';
            html += '</div>';
            html += '<div class="col-md-1" >';
            html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            html += '</div>';
            html += '</div>';
            $('.kpdata').append(html);
        }
    });

	 </script>
</body>
</html>