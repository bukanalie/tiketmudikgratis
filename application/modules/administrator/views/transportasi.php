<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php echo $title ?></title>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive-tables.css">
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/responsive-tables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/responsive-tables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        // dynamic table
    jQuery('#dyntable2').dataTable( {
            "bScrollInfinite": true,
            "bScrollCollapse": true,
            "sScrollY": "300px"
        });
        
    });
</script>
</head>

<body>

<div id="mainwrapper" class="mainwrapper">
    
    <?php $this->load->view('template/header_admin'); ?>
    
    <div class="konten">
        
        
        <div class="maincontent">
            <div class="maincontentinner">
            
                
                <h4 class="widgettitle">DAFTAR TRANSPORTASI<a href="<?php echo base_url(); ?>administrator/tambahtransportasi" class="btn btn-small pull-right "><small>+</small></a></h4>
                <table class="table table-bordered table-infinite" id="dyntable2">

                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Jumlah Penumpang</th>
                            <th>Sisa Penumpang</th>
                            <th>Asal</th>
                            <th>Tujuan</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Route</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                    $no = 0;
                    foreach ($data_transportasi as $key): 
                    $no++;
                    ?>         
                      <tr class="gradeX">

                        <td class="center"><?php echo $no; ?></td>
                        <td><?php echo $key->NAMA; ?></td>
                        <td><?php echo $key->JENIS; ?></td>
                        <td><?php echo $key->PENUMPANG; ?></td>
                        <td><?php echo $key->SISA; ?></td>
                        <td><?php echo $key->ASAL; ?></td>
                        <td><?php echo $key->TUJUAN; ?></td>
                        <td><?php echo $key->TANGGAL; ?></td>
                        <td><?php echo $key->WAKTU; ?></td>
                        <td><?php echo $key->ROUTE; ?></td>


                      </tr>

                      <?php endforeach ?>


                    </tbody>
                </table>
                <?php $this->load->view('template/footer'); ?>
                
                
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->
    
</div><!--mainwrapper-->

</body>

</html>
