<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Simpanan
        <small>Control panel</small>
      </h1>

    </section>

     <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Detail simpanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Jenis Simpanan</th>
                  <th>Jumlah Simpanan</th>
                </tr>
                </thead>
                <tbody>
                      <?php $no=1; foreach ( $data as $data) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $data['nama_jenis_simpanan']; ?></td>
                                    <td>Rp.<?= number_format($data['jml_simpanan']); ?></td> 
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