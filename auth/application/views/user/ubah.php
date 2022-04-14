<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ubah Data User
      </h1>

      <br>
       <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                   <div class="col-lg-6 p-5">
                    <div class="card">
                        <div class="card-body card-block">
                            <form action="" method="post" class="">
                              <input type="hidden" id="id_user" name="id_user" value="<?= $data['id_user']; ?>" class="form-control">
                                <div class="form-group">
                                    <label for="" class="col-sm-4 col-form-label">Nama</label>
                                    <div class="input-group">
                                        <input type="text" id="nama_user" name="nama_user" value="<?= $data['nama_user']; ?>" class="form-control">
                                        <small class="form-text text-danger"><?= form_error('nama_user'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Username</label>
                                    <div class="input-group">
                                        <input type="text" id="username" name="username" value="<?= $data['username']; ?>" class="form-control">
                                        <small class="form-text text-danger"><?= form_error('username'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" id="password" name="password" value="<?= $data['password']; ?>" class="form-control">
                                        <small class="form-text text-danger"><?= form_error('password'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Email</label>
                                    <div class="input-group">
                                        <input type="email" id="email" name="email" value="<?= $data['email']; ?>" class="form-control">
                                        <small class="form-text text-danger"><?= form_error('email'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">No Telepon</label>
                                    <div class="input-group">
                                        <input type="text" id="no_telp" name="no_telp" value="<?= $data['no_telp']; ?>" class="form-control" min="10" required>
                                        <small class="form-text text-danger"><?= form_error('no_telp'); ?></small>
                                    </div>
                                </div>
                                 <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Level Admin</label>
                                        <div class="input-group col-md-8">
                                            <select name="level" id="level" class="form-control">
                                                <option value="<?= $data['level']; ?>"><?= $data['level']; ?></option>
                                                <option value="Bendahara">Bendahara</option>
                                                <option value="Ketua">Ketua</option>
                                            </select>
                                        </div>
                                    </div>
                                <center><div class="form-actions form-group"><button type="submit" class="btn btn-info btn-sm">SIMPAN</button></div>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
       </div>
    </section>

  </div>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<?php $this->load->view("templates/footer.php") ?>