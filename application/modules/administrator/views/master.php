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
<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

<body>

<div id="mainwrapper" class="mainwrapper">
    
    <?php $this->load->view('template/header_admin'); ?>
  
    
    <div class="konten">
        
        
        <div class="maincontent">
            <div class="maincontentinner">                
                <div class="row-fluid">
                    <div class="span3">
                        <h4 class="widgettitle">MASTER RUTE</h4>
                         
                        <table class="table table-bordered table-infinite" id="dyntable2">

                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php 
                            $no = 0;
                            foreach ($tempat as $key): 
                            $no++;
                            ?>         
                              <tr class="gradeX">

                                <td class="center"><?php echo $no; ?></td>
                                <td><?php echo $key->nama; ?></td>
                                <td><?php echo $key->jenis; ?></td>
                              </tr>

                              <?php endforeach ?>
                            </tbody>
                        </table>
                        <form action="submit_tempat" method="post">
                            <p>
                                
                                <span class="field"><input name="nama" class="input-block-level" placeholder="Nama Tempat / Rute" type="text"></span>
                            </p>
                            <p>
                                <label>Jenis Transportasi</label>
                                <span class="formwrapper">
                                <select name="jenis" class="uniformselect" style="width : 303.5px;">
                                  <?php foreach ($transportasi as $key): ?>
                                    <option value="<?php echo $key->jtid;?>"><?php echo $key->nama;?></option>
                                  <?php endforeach ?>
                                </select>

                                </span>
                            </p>      
                            <p class="stdformbutton" >
                                   <center> <button type="submit" name="submit" value="submit" class="btn btn-primary">+ Tambah</button></center>
                            </p>
                        </form> 
                    </div>
                    <div class="span3">
                        <h4 class="widgettitle">MASTER JENIS TRANSPORT</h4>
                        <table class="table table-bordered table-infinite" id="dyntable2">

                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php 
                            $no = 0;
                            foreach ($transportasi as $key): 
                            $no++;
                            ?>         
                              <tr class="gradeX">

                                <td class="center"><?php echo $no; ?></td>
                                <td><?php echo $key->nama; ?></td>
                              </tr>

                              <?php endforeach ?>
                            </tbody>
                        </table>
                        <form action="submit_jenistransport" method="post">
                            <p>
                                
                                <span class="field"><input name="nama" class="input-block-level" placeholder="Nama Jenis Transport" type="text"></span>
                            </p>      
                            <p class="stdformbutton" >
                                   <center> <button type="submit" name="submit" value="submit" class="btn btn-primary">+ Tambah</button></center>
                            </p>
                        </form> 
                    </div>
                    <div class="span6">
                        <h4 class="widgettitle">MASTER USER</h4>
                        <table class="table table-bordered table-infinite" id="dyntable2">

                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Hak Akses</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php 
                            $no = 0;
                            foreach ($user as $key): 
                            $no++;
                            ?>         
                              <tr class="gradeX">

                                <td class="center"><?php echo $no; ?></td>
                                <td><?php echo $key->username; ?></td>
                                <td><?php echo $key->nama; ?></td>
                                <td><?php echo $key->hak; ?></td>
                              </tr>

                              <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                



                <?php $this->load->view('template/footer'); ?>
                
                
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->
    
</div><!--mainwrapper-->

</body>

</html>
