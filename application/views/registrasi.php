
<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg col-lg-6 my-5 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
         
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat Akun!</h1>
              </div>
              <form class="user" method="POST" action="<?php echo base_url('registrasi/index') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control " placeholder="Masukan Nama Lengkap Anda">
                    <?php echo form_error('nama','<div class="text-danger small ml-2">','</div>') ?>
                </div>
                <div class="form-group">
                    <label>Profile Picture</label>
                    <input type="file" name="img_profil" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control " id="exampleInputEmail" placeholder="Masukan Email Anda">
                    <?php echo form_error('email','<div class="text-danger small ml-2">','</div>') ?>
                </div>
                <label for="">Password</label>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password_1" class="form-control " id="exampleInputPassword" placeholder="Masukan Password">
                    <?php echo form_error('password_1','<div class="text-danger small ml-2">','</div>') ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="password_2" class="form-control " id="exampleRepeatPassword" placeholder="Ulangi Password">
                    <?php echo form_error('password_2','<div class="text-danger small ml-2">','</div>') ?>
                  </div>
                </div><br>
                <button type="submit" class="btn btn-primary btn-user btn-block">Buat Akun</button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?php echo base_url('auth/forgotPassword') ?>">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?php echo base_url('auth/index') ?>">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

