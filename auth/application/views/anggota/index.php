<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengolahan Data Anggota
      </h1>

    </section>
    <br>
    <br>
    <div class="col-md-4">
      <a href="<?php echo base_url(); ?>Anggota/tambah" class="btn btn-success">+ Tambah</a>
    </div>
    <br>
    <br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama Anggota</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Jabatan</th>
                  <th>No telpon</th>
                  <th>Alamat</th>
                  <th>Tanggal Lahir</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ( $data as $data) : ?> 
                   <tr>
                       <td><?= $no; ?></td>
                       <td><?= $data['NIP']; ?></td>
                       <td><?= $data['nama_anggota']; ?></td>
                       <td><?= $data['username']; ?></td>
                       <td><?= $data['password']; ?></td>
                       <td><?= $data['jabatan']; ?></td>
                       <td><?= $data['no_telp']; ?></td>
                       <td><?= $data['alamat']; ?></td>
                       <td><?= $data['tanggal_lahir']; ?></td>
                       <td>
                           <a href="<?php echo base_url(); ?>Anggota/ubah/<?= $data['NIP']; ?>" class="btn btn-success p-2">Ubah</a>
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

  </div>

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<?php $this->load->view("templates/footer.php") ?>
<!-- ./wrapper -->