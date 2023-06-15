<div class="container-fluid">
    <div class="container" style="margin-top: 40px;">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Selamat Datang <strong><?php echo $nama ?></strong> silahkan periksa data diri kamu
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <div class="row" style="margin-top: 40px;">
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-header">berikut merupakan data kamu</h5>
                <div class="card-body">
                    <div class="col-md-6">
                        <h6>Foto Profil</h6>
                        <img src="<?php echo base_url().'/uploads/'.$img_profil ?>" class="card-img-top">
                    </div>
                    <div class="col-md-4">
                        <table class="table">
                            <tr>
                                <td>Nama</td>
                                <td><?php echo $nama ?></td>
                            </tr>
                            <tr>
                                <td>email</td>
                                <td><?php echo $email ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <?php echo anchor('auth/logout','<div class="btn btn-danger">logout</div>') ?>
</div>