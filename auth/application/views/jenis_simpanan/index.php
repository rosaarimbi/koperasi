<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengolahan Data Jenis Simpanan
      </h1>

    </section>
    <br>
    <br>
    <div class="col-md-4">
      <a href="<?php echo base_url(); ?>Jenis_simpanan/tambah" class="btn btn-success">+ Tambah</a>
    </div>
    <br>
    <br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Jenis Simpanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Jenis Simpanan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ( $data as $data) : ?>
                   <tr>
                       <td><?= $no; ?></td>
                       <td><?= $data['nama_jenis_simpanan']; ?></td>
                       <td>
                           <!--a href="<?php echo base_url(); ?>Jenis_simpanan/ubah/<?= $data['id_jenis_simpanan']; ?>" class="btn btn-success p-2">Ubah</a-->
                           <a href="<?php echo base_url(); ?>Jenis_simpanan/hapus/<?= $data['id_jenis_simpanan']; ?>" class="btn btn-danger p-2" onclick="return confirm('Yakin untuk menghapus?');">Hapus</a>
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