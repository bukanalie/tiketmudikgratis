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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/forms.js"></script>



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
            
                
                <h4 class="widgettitle">DAFTAR TRANSPORTASI</h4>
                
                <div class="widgetcontent">
                <form class="stdform" action="tambahtransportasi" method="post">                        
                        <p>
                          <label>Nama Transportasi</label>
                            <span class="field"><input type="text" name="nama" class="input-xxlarge" placeholder="Nama Transportasi" /></span>
                        </p>

                        <p>
                            <label>Jenis Transportasi</label>
                            <span class="formwrapper">
                            <?php foreach ($jenis_transportasi as $key): ?>
                              <input type="radio" name="jenis" value="<?php echo $key->jtid;?>"/> <?php echo $key->nama;?> &nbsp; &nbsp;
                            <?php endforeach ?>
                            </span>
                        </p>
                        
                        <p>
                            <label>Jumlah Penumpang</label>
                            <span class="field"><input type="number" name="jumlah" class="input-xxlarge" placeholder="Jumlah Penumpang" /></span>
                        </p>
                        
                        <p>
                            <label>Asal</label>
                            <span class="field">
                            <select name="asal" class="uniformselect">
                              <?php foreach ($route as $key): ?>
                                <option value="<?php echo $key->tid;?>"><?php echo $key->nama;?></option>
                              <?php endforeach ?>
                            </select>
                            </span>
                        </p>
                        <p>
                            <label>Tujuan</label>
                            <span class="field">
                            <select name="tujuan" class="uniformselect">
                              <?php foreach ($route as $key): ?>
                                <option value="<?php echo $key->tid;?>"><?php echo $key->nama;?></option>
                              <?php endforeach ?>
                            </select>
                            </span>
                        </p>

                        <p>
                          <label>Tanggal</label>
                            <span class="field"><input type="text" name="tanggal" class="input-medium" placeholder="20 Januari 2016" /></span>
                        </p>
                        <p>
                          <label>Waktu</label>
                            <span class="field"><input type="text" name="waktu" class="input-small" placeholder="21:00" /></span>
                        </p>
                                             
                        <p>
                            <label>Route</label>
                            <span class="formwrapper">
                              <?php foreach ($route as $key): ?>
                                  <input type="checkbox" value="<?php echo $key->nama;?>" name="route[]" />
                                  <?php echo $key->nama;?> <br />
                              <?php endforeach ?>
                            </span>
                        </p>
                        <p class="stdformbutton">
                                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                            </p>
                  
                        
                </form>
            </div><!--widgetcontent-->

                <?php $this->load->view('template/footer'); ?>
                
                
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->
    
</div><!--mainwrapper-->

</body>

</html>
