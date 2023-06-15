<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg col-lg-6 my-5 mx-auto">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900">masukan password yang baru</h1>
                    <h5 class="mb-4"><?php echo $this->session->userdata('reset_email'); ?></h5>
                  </div>
                  <?php echo $this->session->flashdata('pesan'); ?>
                  <form class="user" action="<?php echo base_url('auth/gantiPassword') ?>" method="POST">
                    <div class="form-group">
                      <input type="password" name="password_1" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="masukan password yang baru">
                      <?php echo form_error('password_1','<div class="text-danger small ml-2">','</div>') ?>
                    </div><br>
                    <div class="form-group">
                      <input type="password" name="password_2" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="ulangi password ">
                      <?php echo form_error('password_2','<div class="text-danger small ml-2">','</div>') ?>
                    </div><br>
                   
                    <button type="submit" class="btn btn-primary btn-user btn-block">Reset Password</button>
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
