<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengolahan Data Simpanan
      </h1>

    </section>
    <br>
    <br>
    <div class="col-md-4">
      <a href="<?php echo base_url(); ?>Simpanan/tambah" class="btn btn-success">+ Tambah</a>
    </div>
    <br>
    <br>
     <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Simpanan</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Tanggal Simpanan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                      <?php $no=1; foreach ( $data as $data) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                     <td><?= $data['id_simpanan']; ?></td>
                                    <td><?= $data['NIP']; ?></td>
                                    <td><?= $data['nama_anggota']; ?></td>
                                    <td><?php echo date('d F Y', strtotime($data['tgl_simpan'])); ?></td>
                                    <td><center><a href="<?php echo base_url(); ?>Simpanan/detail/<?= $data['id_simpanan']; ?>" class="btn-info btn-sm">Detail</a>|<a href="<?php echo base_url(); ?>Simpanan/hapus/<?= $data['id_simpanan']; ?>" class="btn-danger btn-sm" onclick="return confirm('Yakin untuk menghapus?');">Hapus</a>
                                        </center></td>
                                </tr>
                                <?php $no++; ?>
                                <?php endforeach; ?>
                    </tbody>
              </table>
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
