<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Simpanan
      </h1>
<br>
      <div class="col-md-6 offset-md-3">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url(); ?>Laporan/simpanan" method="get">
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
                    <small><span class="text-danger"><?= form_error('tgl2'); ?></span></small>
                  </div>
                </div>
                <div class="form-group">
                  <label for="NIP" class="col-sm-2 control-label">Jenis Simpanan</label>
                  <div class="col-sm-10">
                    <select name="nama_jenis_simpanan" id="nama_jenis_simpanan" class="form-control" required>
                       <option value="<?=(!empty($_GET['nama_jenis_simpanan']) ? $_GET['nama_jenis_simpanan'] : '')?>">
                       <?=(!empty($_GET['nama_jenis_simpanan']) ? $_GET['nama_jenis_simpanan'] : '')?></option>
                       <?php foreach ($jenis as $jenis): ?>
                       <option value="<?= $jenis['nama_jenis_simpanan'] ?>"><?= $jenis['nama_jenis_simpanan'] ?></option>
                       <?php endforeach ?>
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Tampilkan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>

    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan Simpanan Seluruh Anggota</h3>

              <a target="_blank" href="<?php echo base_url(); ?>laporan/cetak_simpanan/?
                tgl1=<?=(!empty($_GET['tgl1']) ? $_GET['tgl1'] : '')?>&
                tgl2=<?=(!empty($_GET['tgl2']) ? $_GET['tgl2'] : '')?>&
                nama_jenis_simpanan=<?=(!empty($_GET['nama_jenis_simpanan']) ? $_GET['nama_jenis_simpanan'] : '')?>" class="btn btn-success pull-right">Cetak</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
              <table id="" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10px">No</th>
                  <th>Tanggal</th>
                  <th>ID Simpanan</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Jenis Simpanan</th>
                  <th>Jumlah</th>
                  <th>User</th>
                </tr>
                </thead>
                <tbody>
                      <?php $no=1; foreach ( $data as $data) : ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <!--td><?= $data['tgl_simpan']; ?></td-->
                        <td><?php echo date('d F Y', strtotime($data['tgl_simpan'])); ?></td>
                        <td><?= $data['id_simpanan']; ?></td>
                        <td><?= $data['NIP']; ?></td>
                        <td><?= $data['nama_anggota']; ?></td>
                        <td><?= $data['nama_jenis_simpanan']; ?></td>
                        <td>Rp. <?= number_format($data['jml_simpanan']); ?></td>
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

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php $this->load->view("templates/footer.php") ?>
