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
</head>

<script>
$(document).ready(function(){
    $("button").click(function(){
        $.ajax({url: "demo_test.txt", success: function(result){
            $("#div1").html(result);
        }});
    });

    tampiltersedia();
   // s2id_autogen3
    function tampiltersedia(){
      var e = document.getElementById("asal");
      var asal = e.options[e.selectedIndex].text;
      var f = document.getElementById("tujuan");
      var tujuan = f.options[f.selectedIndex].text;
        $.ajax({
          type:"POST", 
          url: "<?php echo base_url(); ?>dashboard/gettransporttersedia", 
          data: "asal="+asal+"&tujuan="+tujuan, 
          success: function(result){
            $("#tersedia").html(result);
        }});
    };

    $("#asal").change(function(){
      tampiltersedia();
    });
    $("#tujuan").change(function(){
      tampiltersedia();
    });

});
</script>
<body class="loginpage">

<div class="regpanel">
    <div class="regpanelinner">
        <div class="pageheader">
            <div class="pageicon"><span class="iconfa-hand-down"></span></div>
            <div class="pagetitle">
                <h5>Tiket Mudik Gratis</h5>
                <h1>Tambah Pemudik</h1>
            </div>
        </div>
        <div class="regcontent">
        
            
            
            <form action="tambahpemudik" method="post" class="stdform">
                
                <h3 class="subtitle">Biodata Pemudik</h3>
                <p><input type="text" name="nama" class="input-block-level" placeholder="Nama" /></p>
                <p><input type="text" name="pekerjaan" class="input-block-level" placeholder="Pekerjaan" /></p>
                <p class="bday">
                    <select name="jenis_kelamin" style="width: 380px;">
                        <option value="L">Laki - Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </p>
                <h3 class="subtitle">Rute</h3>
                <p class="bday">
                    <select name="asal" id="asal" style="width: 380px;">
                        <?php foreach ($route as $key): ?>
                          <option value="<?php echo $key->tid;?>"><?php echo $key->nama;?></option>
                        <?php endforeach ?>
                    </select>
                </p>
                <p class="bday">
                    <select name="tujuan" id="tujuan" style="width: 380px;">
                        <?php foreach ($route as $key): ?>
                          <option value="<?php echo $key->tid;?>"><?php echo $key->nama;?></option>
                        <?php endforeach ?>
                    </select>
                </p>
                <h3 class="subtitle">Transportasi yang tersedia</h3>
                <p>
                <div id="tersedia"></div>
                  
                </p>


                <p><button type="submit" name="submit" value="submit" class="btn btn-primary">Add</button></p>
                
            </form>
        
        </div><!--regcontent-->
    </div><!--regpanelinner-->
</div><!--regpanel-->

<div class="regfooter">
    <p>&copy; 2016. Tiket Mudik Gratis. All Rights Reserved.</p>
</div>

</body>

</html>
