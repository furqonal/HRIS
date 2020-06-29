<div class="content">
<html>
    <head>
        <title>jquery media - harviacode.com</title>
    </head>
    <body>
 		<?php 
 			foreach ($evidence as $row) :
 				$evd = $row->evidence;
 			endforeach;
 			echo $evd;
 		?>

        
		<a class="media" href="<?php echo base_url('/assets/evidence/'.$evd);?>"></a>

 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://malsup.github.com/jquery.media.js"></script>
        <script type="text/javascript">
            $(function () {
                $('.media').media({width: 1080});
            });
        </script>
    </body>
</html>
</div>
<!-- <a class="media" href="<?php echo base_url();?>./assets/evidence/aa.pdf"></a>
 
												        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
												        <script type="text/javascript" src="http://malsup.github.com/jquery.media.js"></script>
												        <script type="text/javascript">
												            $(function () {
												                $('.media').media({width: 868});
												            });
												        </script> -->