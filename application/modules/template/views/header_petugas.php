    <div class="header">
        <div class="logo">
            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" /></a>
        </div>
        <div class="headerinner">
            <ul class="headmenu">
                <li>
                    <a href="<?php echo base_url(); ?>administrator">
                    <span class="count"></span>
                    <span class="head-icon head-message"></span>
                    <span class="headmenu-label">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>dashboard/pemudik">
                    <span class="count"></span>
                    <span class="head-icon head-users"></span>
                    <span class="headmenu-label">Pemudik</span>
                    </a>
                </li>
                <li class="right">
                    <div class="userloggedinfo">
                        <img src="<?php echo base_url(); ?>assets/images/photos/default.png" alt="" />
                        <div class="userinfo">
                            <h5><?php echo $nama; ?> <small>- <?php echo $username; ?></small></h5>
                            <ul>
                                <li><a href="#">View Profile</a></li>
                                <li><a href="<?php echo base_url(); ?>logout">Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul><!--headmenu-->
        </div>
    </div>
