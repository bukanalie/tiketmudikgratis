              <?php if ($transportasi_tersedia){ ?>
              	<?php foreach ($transportasi_tersedia as $key): ?>
                	<strong><h4 class="widgettitle title-inverse"><input type="radio" name="transportasi" value="<?php echo $key->ID;?>"/><?php echo $key->JENIS." ".$key->NAMA;?> </h4></strong> <b>Waktu berangkat : </b><?php echo $key->TANGGAL;?> <?php echo $key->WAKTU;?> <br> <b>Rute : </b><?php echo $key->ROUTE;?><br />
                <?php endforeach ?>
              <?php } else { ?>
              		Tidak ada transportasi untuk asal dan tujuan tersebut
                 <?php } ?>
