
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengelolaan Data Angsuran
      </h1>

      <br>
      <a href="<?php echo base_url();?>Angsuran" class="btn btn-primary">Kembali</a>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
             <!--<a href="" class="btn btn-success pull-right">CETAK</a> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>NIP</th>
                  <th>Nama Anggota</th>
                  <th>Jumlah Angsuran</th>
                  <th>Tanggal Angsuran</th>
                  <th>Angsuran Ke</th>
                  <th>Sisa</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ( $data as $data) : ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= $data['NIP']; ?></td>
                  <td><?= $data['nama_anggota']; ?></td>
                  <td>Rp. <?= number_format($data['jml_angsuran']); ?></td>
                  <!--td><?= $data['tgl_angsuran']; ?></td-->
                  <td><?php echo date('d F Y', strtotime($data['tgl_angsuran'])); ?><td-->
                  <td><?= $data['angsuran_ke']; ?></td>
                  <td>Rp. <?= number_format($data['sisa']); ?></td>
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