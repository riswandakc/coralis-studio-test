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
                    <h1 class="h4 text-gray-900 mb-4">Selamat datang dan silahkan Login</h1>
                  </div>

                  <?php echo $this->session->flashdata('pesan'); ?>

                  <form class="user" action="<?php echo base_url('auth/login') ?>" method="POST">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan Email Anda">
                      <?php echo form_error('email','<div class="text-danger small ml-2">','</div>') ?>
                    </div><br>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukan Password">
                      <?php echo form_error('password','<div class="text-danger small ml-2">','</div>') ?>
                    </div><br>
                    <button type="submit" class="btn btn-primary btn-user btn-block">LOGIN</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url('auth/forgotPassword') ?>">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url('registrasi/index') ?>">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
