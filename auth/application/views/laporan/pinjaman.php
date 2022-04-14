<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Pinjaman
      </h1>

      <br>
      <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <form class="form-horizontal" action="<?php echo base_url(); ?>Laporan/pinjaman" method="get">
              <div class="box-body">
                <div class="form-group">
                  <label for="NIP" class="col-sm-2 control-label">Dari Tanggal</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tgl1" name="tgl1" value="<?=(!empty($_GET['tgl1']) ? $_GET['tgl1'] : '')?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="NIP" class="col-sm-2 control-label">Sampai Tanggal</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tgl2" name="tgl2" value="<?=(!empty($_GET['tgl2']) ? $_GET['tgl2'] : '')?>" required>
                  </div>
                </div>
                <!--div class="form-group">
                  <label for="NIP" class="col-sm-2 control-label">NIP</label>
                  <div class="col-sm-10">
                    <input class="form-control float-right" id="cari" name="cari" type="text" placeholder="Cari NIP" value="<?=(!empty($_GET['cari']) ? $_GET['cari'] : '')?>"
                  </div>
                </div>
              </div-->
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Tampilkan</button>
              </div>
            </form>
          </div>
        </div>
    </section>


<br>
    <br>
     <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan Pinjaman Seluruh Anggota</h3>
              <a target="_blank" href="<?php echo base_url(); ?>laporan/cetak_pinjaman/?
                tgl1=<?=(!empty($_GET['tgl1']) ? $_GET['tgl1'] : '')?>&
                tgl2=<?=(!empty($_GET['tgl2']) ? $_GET['tgl2'] : '')?>"
                class="btn btn-success pull-right">Cetak</a>
                <!--cari=<?=(!empty($_GET['cari']) ? $_GET['cari'] : '')?>"-->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10px">No</th>
                  <th>Tanggal</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Pinjaman</th>
                  <th>Jangka</th>
                  <th>Angsuran</th>
                  <th>Sisa Angsuran</th>
                  <th>User</th>              
                </tr>
                </thead>
                <tbody>
                      <?php $no=1; foreach ( $data as $data) : ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <!--td><?= $data['tgl_pinjaman']; ?></td-->
                        <td><?php echo date('d F Y', strtotime($data['tgl_pinjaman'])); ?></td>
                        <td><?= $data['NIP']; ?></td>
                        <td><?= $data['nama_anggota']; ?></td>
                        <td>Rp. <?= number_format($data['jml_pinjaman']); ?></td>
                        <td><?= $data['jangka']; ?> Bulan</td>
                        <td>Rp. <?= number_format($data['angsuran']); ?></td>
                        <td>Rp. <?= number_format($data['total']); ?></td>
                        <td><?= $data['nama_user']; ?></td>
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

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php $this->load->view("templates/footer.php") ?>