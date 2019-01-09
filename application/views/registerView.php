<?php $this->load->view('template/headerLogin') ?>

        <!-- Top content -->
        <div class="top-content" style="background-color: #dc56ff; padding-top: 0px;padding-bottom: 0px">
            
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Register</strong></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-4 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Register to our site</h3>
                                    <p>Enter your data:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                            <?php echo form_open('Register/create','class = "login-form"'); ?>
                                <?php if(!empty(validation_errors())){ ?>
                            <div class="alert alert-warning alert-dismissable">
                                <a class="panel-close close" data-dismiss="alert">×</a> 
                                <?php echo validation_errors(); ?>
                            </div>
                            <?php }?>
                                <form role="form" action="" method="post" class="login-form">
                                    <div class="form-group">
                                        <label class="sr-only" for="nama_user">Nama User</label>
                                        <input type="text" name="nama_user" placeholder="Nama lengkap user..." class="nama_user form-control" id="nama_user">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="email">Email</label>
                                        <input type="text" name="email" placeholder="Email..." class="email form-control" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="username">Username</label>
                                        <input type="text" name="username" placeholder="Username..." class="username form-control" id="username">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="password">Password</label>
                                        <input type="password" name="password" placeholder="Password..." class="password form-control" id="password">
                                    </div>
                                    <div class="text-center">
                                        <a class="txt2" href="<?php echo site_url('/Login')?>">
                                            Sudah punya akun?
                                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <button type="submit" class="btn">Register</button>
                                </form>
                                <?php echo form_close(); ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="<?php echo base_url('assets/login/js/jquery-1.11.1.min.js');?>"></script>
        <script src="<?php echo base_url('assets/login/js/bootstrap/bootstrap.min.js');?>"></script>
        <script src="<?php echo base_url('assets/login/js/jquery.backstretch.min.js');?>"></script>
        <script src="<?php echo base_url('assets/login/js/scripts.js');?>"></script>

        <?php $this->load->view('template/footer') ?>

