<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Anggota
      </h1>

    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan Anggota</h3>

              <a target="_blank" href="<?php echo base_url(); ?>laporan/cetak_anggota/?tgl1=<?=(!empty($_GET['tgl1']) ? $_GET['tgl1'] : '')?>&tgl2=<?=(!empty($_GET['tgl2']) ? $_GET['tgl2'] : '')?>" class="btn btn-success pull-right">Cetak</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
              <table id="" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10px">No</th>
                  <th>NIP</th>
                  <th>Nama Anggota</th>
                  <th>Tanggal Lahir</th>
                  <th>Jabatan</th>
                  <th>No Telepon</th>
                  <th>Alamat</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ( $data as $data) : ?>
                   <tr>
                       <td><?= $no; ?></td>
                       <td><?= $data['NIP']; ?></td>
                       <td><?= $data['nama_anggota']; ?></td>
                       <td><?= $data['tanggal_lahir']; ?></td>
                       <td><?= $data['jabatan']; ?></td>
                       <td><?= $data['no_telp']; ?></td>
                       <td><?= $data['alamat']; ?></td>
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
<!-- ./wrapper -->
<?php $this->load->view("templates/footer.php") ?>