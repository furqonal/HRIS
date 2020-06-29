<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>
        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets/assets_user/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets/assets_user/assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets/assets_user/assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets/assets_user/assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets/assets_user/assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
        <!-- /global stylesheets -->
        <!-- Core JS files datable -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/loaders/blockui.min.js"></script>
        <!-- /core JS files datable-->
        <!-- Theme JS files -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/tables/datatables/datatables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/forms/selects/select2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/core/app.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/pages/datatables_basic.js"></script>
        <!-- /theme JS files -->
        <!-- Theme JS files -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/visualization/d3/d3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/forms/styling/switchery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/ui/moment/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/pickers/daterangepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/core/app.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/pages/dashboard.js"></script>
    </head>
    <body>
        <!-- /main navbar -->
        <!-- Page header -->
        <!-- Page container -->
        <div class="page-container">
            <!-- Page content -->
            <div class="page-content">
                <!-- Main content -->
                <div class="content-wrapper">
                    <!-- Form horizontal -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Form Input Performa Appraisal</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="simpan" method="POST">
                                <fieldset class="content-group">
                                    <!-- <legend class="text-bold">Basic inputs</legend> -->
                                    <div class="form-group" class="form-control input-xlg">
                                        <label class="control-label col-lg-2">Nip</label>
                                        <div class="col-lg-10">
                                            <select name="nm_karyawan" class="form-control input-xlg">
                                                <?php 
                                                    foreach ($data_user as $user) {

                                                        echo "<option value='".$user->user_id."'>".$user->nip."</option>";
                                                    }
                                                 ?>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="control-label col-lg-2">Posisi</label>
                                        <div class="col-lg-10">
                                            <select name="posisi_kar" class="form-control input-xlg">
                                                <?php 
                                                    foreach ($data_user as $user) {

                                                        echo "<option value='".$user->unit."'>".$user->nama_jabatan."</option>";
                                                    }
                                                 ?>
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">SKU</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="inp_sku">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group" id="indikator">
                                        <label class="control-label col-lg-2">Indikator</label>
                                        <div class="col-lg-10" >
                                            <input type="text" class="form-control" name="inp_indk[]">
                                            <input id="id_indk" value="1" type="hidden" />
                                            <a href='' style="float: right;" onclick="tambah_form(); return false;" >Add</a>
                                        </div>


                                            <script >
                                        function tambah_form(){
                                                 var target=document.getElementById("indikator");
                                                // membuat element <tr>
                                                var grup = document.createElement("div");
                                                // membuat element input untuk menambah form inputan
                                                var label = document.createElement("label");
                                                var tabel_col=document.createElement("div");
                                                var tambah = document.createElement("input");
                                                // menambahkan element <tr> pada tag table

                                                
                                                target.appendChild(grup);
                                                // menambahkan element input pada tag <td>
                                                grup.appendChild(label)  ;
                                                // kemudian memberikan attribute type="text" untuk form inputan
                                                label.appendChild(tabel_col);
                                                tabel_col.appendChild(tambah);
                                               
                                                //grup.setAttribute('class','form-group ');
                                                label.setAttribute('class','control-label col-lg-12');
                                                tabel_col.setAttribute('class','col-lg-10');
                                                tambah.setAttribute('style', 'margin-left: 170px;');
                                                tambah.setAttribute('type','text');
                                                 // lalu memberikan attribute name="inputan[]" untuk form inputan
                                                tambah.setAttribute('class','form-control');
                                                tambah.setAttribute('name','inp_indk[]');
                                                }
                                            </script>
                                        
                                    </div>

                                    <div class="form-group" id="tipe" >
                                        <label class="control-label col-lg-2">Tipe</label>
                                    <div class="col-lg-10">
                                        <select class="form-control input-xlg" name="inp_tipe[]" >
                                            <option value="Higher Better ">Higher Better</option>
                                            <option value="Lower Better">Lower Better</option>
                                            </optgroup>
                                        </select>
                                        <a href='#' style="float: right;" onclick="tambah_form1() ; return false;" >Add</a>
                                    </div>
                                        <script >
                                            function tambah_form1(){
                                            	var myDiv=document.getElementById("tipe");
                                                var grup = document.createElement("div");
                                                // membuat element input untuk menambah form inputan
                                                var label = document.createElement("label");
                                                var tabel_col=document.createElement("div");
                                                var selectList=document.createElement("select");
                                                selectList.id = "mySelect";
                                                var array =["Higher Better", "Lower Better"];

                                                myDiv.appendChild(document.createElement("br"));
                                                myDiv.appendChild(grup);
                                                grup.appendChild(label);
                                                label.appendChild(tabel_col);
                                                tabel_col.appendChild(selectList);

                                                label.setAttribute('class','control-label col-lg-12');
                                                tabel_col.setAttribute('class','col-lg-10');
                                                selectList.setAttribute('style', 'margin-left: 170px;');
                                                selectList.setAttribute('name', 'inp_tipe[]');

                                            
                                                for (var i=0; i<array.length; i++){
                                                	var option = document.createElement("option");
                                                	selectList.setAttribute('class', 'form-control input-xlg');
                                                	option.value = array[i];
                                                	option.text = array[i];
                                                	selectList.appendChild(option);
                                                }
                                            }
                                            
                                        </script>
                                    </div>
                                    <div class="form-group" id="satuan">
                                        <label class="control-label col-lg-2">Satuan</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="inp_satuan[]">
                                        <a href='#' style="float: right;" onclick="tambah_form_2() ; return false;" >Add</a>
                                        </div>                                        
                                        <script >
                                            function tambah_form_2(){

                                                 var target=document.getElementById("satuan");
                                                // membuat element <tr>
                                                var grup = document.createElement("div");
                                                // membuat element input untuk menambah form inputan
                                                var label = document.createElement("label");
                                                var tabel_col=document.createElement("div");
                                                var tambah = document.createElement("input");
                                                // menambahkan element <tr> pada tag table

                                                
                                                target.appendChild(grup);
                                                // menambahkan element input pada tag <td>
                                                grup.appendChild(label)  ;
                                                // kemudian memberikan attribute type="text" untuk form inputan
                                                label.appendChild(tabel_col);
                                                tabel_col.appendChild(tambah);
                                               
                                                
                                                label.setAttribute('class','control-label col-lg-12');
                                                tabel_col.setAttribute('class','col-lg-10');
                                                tambah.setAttribute('style', 'margin-left: 170px;');
                                                tambah.setAttribute('type','text');
                                                 // lalu memberikan attribute name="inputan[]" untuk form inputan
                                                tambah.setAttribute('class','form-control');
                                                tambah.setAttribute('name','inp_satuan[]');
                                            }
                                        </script>
                                    </div>
                                    <div class="form-group" id="bobot">
                                        <label class="control-label col-lg-2">Bobot</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="10" max="100"class="form-control"  name="inp_bobot[]">
                                        </div>
                                        <a href='#' style="float: right;" onclick="tambah_form_3() ; return false;" >Add</a>
                                        <script >
                                            function tambah_form_3(){
                                                var target=document.getElementById("bobot");
                                                // membuat element <tr>
                                            	var grup = document.createElement("div");
                                                // membuat element input untuk menambah form inputan
                                            	var label = document.createElement("label");
                                                var tabel_col=document.createElement("div");
                                                var tambah = document.createElement("input");
                                                // menambahkan element <tr> pada tag table

                                                
                                                target.appendChild(grup);
                                                // menambahkan element input pada tag <td>
                                                grup.appendChild(label)  ;
                                                // kemudian memberikan attribute type="text" untuk form inputan
                                                label.appendChild(tabel_col);
                                                tabel_col.appendChild(tambah);
                                               
                                                
                                                label.setAttribute('class','control-label col-lg-12');
                                                tabel_col.setAttribute('class','col-lg-10');
                                                tambah.setAttribute('style', 'margin-left: 170px;');
                                                tambah.setAttribute('number','text');
                                                 // lalu memberikan attribute name="inputan[]" untuk form inputan
                                                tambah.setAttribute('class','form-control');
                                                tambah.setAttribute('name','inp_bobot[]');
                                            
                                            
                                            }
                                        </script>
                                    </div>
                                    <div class="form-group" id="waktu">
                                        <label class="control-label col-lg-2">Waktu (bulan)</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="1" max="12" class="form-control" placeholder="Inputan berupa angka" name="inp_waktu[]" >
                                        </div>
                                        <a href='#' style="float: right;" onclick="tambah_form_4() ; return false;" >Add</a>
                                        <script >
                                            function tambah_form_4(){
                                                var target=document.getElementById("waktu");
                                            	var grup = document.createElement("div");
                                            	var label = document.createElement("label");
                                                var tabel_col=document.createElement("div");
                                                var tambah = document.createElement("input");
                                                
                                                target.appendChild(grup);
                                                grup.appendChild(label)  ;
                                                label.appendChild(tabel_col);
                                                tabel_col.appendChild(tambah);
                                               
                                                
                                                label.setAttribute('class','control-label col-lg-12');
                                                tabel_col.setAttribute('class','col-lg-10');
                                                tambah.setAttribute('style', 'margin-left: 170px;');
                                                tambah.setAttribute('number','text');
                                                tambah.setAttribute('class','form-control');
                                                tambah.setAttribute('name','inp_waktu[]');
                                            
                                            
                                            }
                                        </script>
                                    </div>
                                    <div class="form-group" id="target">
                                        <label class="control-label col-lg-2">Target</label>
                                        <div class="col-lg-10">
                                            <input type="number" min="1" max="100" class="form-control" placeholder="Inputan berupa angka" name="inp_target[]"/>
                                        </div>
                                        <a href='#' style="float: right;" onclick="tambah_form_5() ; return false;" >Add</a>
                                        <script >
                                            function tambah_form_5(){
                                                 var target=document.getElementById("target");
                                            	var grup = document.createElement("div");
                                            	var label = document.createElement("label");
                                                var tabel_col=document.createElement("div");
                                                var tambah = document.createElement("input");
                                                
                                                target.appendChild(grup);
                                                grup.appendChild(label)  ;
                                                label.appendChild(tabel_col);
                                                tabel_col.appendChild(tambah);
                                               
                                                
                                                label.setAttribute('class','control-label col-lg-12');
                                                tabel_col.setAttribute('class','col-lg-10');
                                                tambah.setAttribute('style', 'margin-left: 170px;');
                                                tambah.setAttribute('number','text');
                                                tambah.setAttribute('class','form-control');
                                                tambah.setAttribute('name','inp_target[]');
                                            
                                            
                                            }
                                        </script>
                                    </div>
                        </div>
                        </fieldset>
                        <div class="text-right" style="margin-top: 20px; margin-bottom: 40px; margin-right: 100px;">
                        <button type="submit" value="kirim" class="btn btn-primary">Kirim </i></button>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- /form horizontal -->
            </div>
            <!-- /main content -->
        </div>
        <!-- /page content -->
        <!-- Footer -->
        <div class="footer text-muted">
            &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
        </div>
        <!-- /footer -->
        </div>
        <!-- /page container -->
       
    </body>
</html>