<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengelolahan Data Admin
      </h1>

      <br>
        <div class="col-md-12">
            <div class="row">
                   <div class="col-md-6">
                      <div class="card">
                        <div class="card-body">
                            <form action="<?php echo base_url(); ?>User/tambah" method="post" class="">
                                <div class="form-group">
                                    <label for="" class="col-sm-4 col-form-label">Nama</label>
                                    <div class="input-group">
                                        <input type="text" id="nama_user" name="nama_user" placeholder="Nama" class="form-control" required>
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Username</label>
                                    <div class="input-group">
                                        <input type="text" id="username" name="username" placeholder="Username" class="form-control" required>
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" id="password" name="password" placeholder="Password" class="form-control" minlength="8" required>
                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Email</label>
                                    <div class="input-group">
                                        <input type="email" id="email" name="email" placeholder="Email" class="form-control" required>
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">No Telepon</label>
                                    <div class="input-group">
                                        <input type="number" id="no_telp" name="no_telp" placeholder="No Telepon" class="form-control" min="10" required>
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                    </div>
                                </div>
                                 <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Level Admin</label>
                                        <div class="input-group col-md-8">
                                            <select name="level" id="level" class="form-control" required>
                                                <option value="">Pilih Level</option>
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
      </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
              <table id="" class="table table-bordered table-striped">
                <thead>
                <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>No Telp</th>
            <th>Level</th>
            <th>aksi</th>
                </tr>
                </thead>
                <tbody>
                       <?php $no=1; foreach ( $data as $data) : ?>
         <tr>
             <td><?= $no; ?></td>
             <td><?= $data['nama_user']; ?></td>
             <td><?= $data['username']; ?></td>
             <td><?= $data['password']; ?></td>
             <td><?= $data['email']; ?></td>
             <td><?= $data['no_telp']; ?></td>
             <td><?= $data['level']; ?></td>
             <td>
                 <a href="<?php echo base_url(); ?>User/ubah/<?= $data['id_user']; ?>" class="btn btn-success p-2">Ubah</a>
                 <!--a href="<?php echo base_url(); ?>User/hapus/<?= $data['id_user']; ?>" class="btn btn-danger p-2" onclick="return confirm('Yakin untuk menghapus?');">Hapus</a-->
             </td>
         </tr>
         <?php $no++; ?>
         <?php endforeach; ?>
                    </tbody>
              </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<?php $this->load->view("templates/footer.php") ?>