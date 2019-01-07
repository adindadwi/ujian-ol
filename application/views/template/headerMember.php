      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
        <?php if($username){ ?>
          <a class="navbar-brand js-scroll-trigger" href="<?php echo base_url('member') ?>">Sewpad</a>
          <?php }else{?>
            <a class="navbar-brand js-scroll-trigger" href="<?php echo base_url('home') ?>">Sewpad</a>
            <?php } ?>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <?php if($username){ ?>
                <a class="nav-link js-scroll-trigger" href="<?php echo base_url('tutorial') ?>">Tutorial</a>
              <?php }else{?>
                <a class="nav-link js-scroll-trigger" href="<?php echo base_url('show') ?>">Tutorial</a>
              <?php } ?>
              </li>
              <?php if($username){ ?>
                  <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo base_url('MemberDetail') ?>"><span class="fa fa-user"></span>&nbsp;<?php echo $username;?></a></li>
                  <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo base_url('Login/Logout');?>">Logout</a></li>
                  <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo site_url('tutorial/create') ?>"><span class="glyphicon glyphicon-pencil"></span>Tulis Tutorial</a></li>
              <?php }else{?>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo site_url('/Login');?>">Login</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo site_url('/Register');?>">Register</a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </nav>
