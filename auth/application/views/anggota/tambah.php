<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Anggota
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
                                        <input type="text" id="NIP" name="NIP" placeholder="NIP" class="form-control" value="<?php echo set_value('NIP')?>">
                                        <small class="form-text text-danger"><?= form_error('NIP'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Nama</label>
                                    <div class="input-group col-md-8">
                                        <input type="text" id="nama_anggota" name="nama_anggota" placeholder="Nama" class="form-control" value="<?php echo set_value('nama_anggota')?>">
                                        <small class="form-text text-danger"><?= form_error('nama_anggota'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Username</label>
                                    <div class="input-group col-md-8">
                                        <input type="text" id="username" name="username" placeholder="Username" class="form-control" value="<?php echo set_value('username')?>">
                                        <small class="form-text text-danger"><?= form_error('username'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Password</label>
                                    <div class="input-group col-md-8">
                                        <input type="password" id="password" name="password" placeholder="Password" class="form-control" value="<?php echo set_value('password')?>">
                                        <small class="form-text text-danger"><?= form_error('password'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Jabatan</label>
                                    <div class="input-group col-md-8">
                                        <input type="text" id="jabatan" name="jabatan" placeholder="Jabatan" class="form-control" value="<?php echo set_value('jabatan')?>">
                                        <small class="form-text text-danger"><?= form_error('jabatan'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">No Telepon</label>
                                    <div class="input-group col-md-8">
                                        <input type="number" id="no_telp" name="no_telp" placeholder="No Telepon" class="form-control" min="10" value="<?php echo set_value('no_telp')?>">
                                        <small class="form-text text-danger"><?= form_error('no_telp'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Alamat</label>
                                  <div class="input-group col-md-8">
                                  <textarea class="form-control" id="alamat" name="alamat" rows="3" value="<?php echo set_value('alamat')?>"></textarea>
                                  <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                    <div class="input-group col-md-8">
                                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" class="form-control" value="<?php echo set_value('tanggal_lahir')?>">
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