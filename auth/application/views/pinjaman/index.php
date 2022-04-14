<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengolahan Data Pinjaman
      </h1>

    </section>
    <br>
    <br>
    <div class="col-md-4">
      <a href="<?php echo base_url(); ?>Pinjaman/tambah" class="btn btn-success">+ Tambah</a>
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
                  <th>Nama</th>
                  <th>Tanggal Pinjam</th>
                  <th>Jangka</th>
                  <th>Jumlah pinjaman</th>
                  <th>Bunga</th>
                  <th>Total Pinjaman</th>
                  <th>Angsuran/bln</th>                  
                </tr>
                </thead>
                <tbody>
                      <?php $no=1; foreach ( $data as $data) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $data['NIP']; ?></td>
                                    <td><?= $data['nama_anggota']; ?></td>
                                    <!--td><?= $data['tgl_pinjaman']; ?></td-->
                                    <td><?php echo date('d F Y', strtotime($data['tgl_pinjaman'])); ?></td>
                                    <td><?= $data['jangka']; ?> Bulan</td>
                                    <td>Rp. <?= number_format($data['jml_pinjaman']); ?></td>
                                    <td>1.25 %</td>
                                    <td>Rp. <?= number_format($data['total']); ?></td>
                                    <td>Rp. <?= number_format($data['angsuran']); ?></td>     
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