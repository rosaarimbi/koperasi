<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ubah Data Anggota
      </h1>

      <br>
       <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                   <div class="col-md-8">
                    <div class="card">
                        <div class="card-body card-block">
                            <form action="" method="post" class="">
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">NIP</label>
                                    <div class="input-group col-md-8">
                                        <input type="text" id="NIP" name="NIP" class="form-control" value="<?= $data['NIP']; ?>" readonly>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Nama</label>
                                    <div class="input-group col-md-8">
                                        <input type="text" id="nama_anggota" name="nama_anggota" value="<?= $data['nama_anggota']; ?>" class="form-control" >
                                        <small class="form-text text-danger"><?= form_error('nama_anggota'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Username</label>
                                    <div class="input-group col-md-8">
                                        <input type="text" id="username" name="username" value="<?= $data['username']; ?>" class="form-control">
                                        <small class="form-text text-danger"><?= form_error('username'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Password</label>
                                    <div class="input-group col-md-8">
                                        <input type="text" id="password" name="password" value="<?= $data['password']; ?>" class="form-control">
                                        <small class="form-text text-danger"><?= form_error('password'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Jabatan</label>
                                    <div class="input-group  col-md-8">
                                        <input type="text" id="jabatan" name="jabatan" value="<?= $data['jabatan']; ?>" class="form-control">
                                        <small class="form-text text-danger"><?= form_error('jabatan'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">No Telepon</label>
                                    <div class="input-group  col-md-8">
                                        <input type="text" id="no_telp" name="no_telp" value="<?= $data['no_telp']; ?>" class="form-control">
                                        <small class="form-text text-danger"><?= form_error('no_telp'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Alamat</label>
                                  <div class="input-group col-md-8">
                                  <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $data['alamat']; ?></textarea>
                                  <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                    <div class="input-group col-md-8">
                                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= $data['tanggal_lahir']; ?>" class="form-control">
                                        <small class="form-text text-danger"><?= form_error('tanggal_lahir'); ?></small>
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                  <center><button type="submit" class="btn btn-info">SIMPAN
                                  </button> |
                                  <a href="<?php echo base_url();?>Anggota" class="btn btn-danger">BATAL</a></center>
                                </div>
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