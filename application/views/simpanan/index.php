  		<div class="p-5">
  		<center>
        <br>
        <p class="font-weight-bold float-right"><?php echo date('d F Y'); ?></p>
  			<h1 class="p-5 font-weight-bold">KOPERASI KARYA HUSADA</h1>
  		</center>

      <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Jenis Simpanan</th>
                  <th>Nominal</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ( $data as $data) : ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <!--td><?= $data['tgl_simpan']; ?></td-->
                    <td><?php echo date('d F Y', strtotime($data['tgl_simpan'])); ?></td>
                    <td><?= $data['nama_jenis_simpanan']; ?></td>
                    <td>Rp. <?= number_format($data['jml_simpanan']); ?></td>
                  </tr>
                <?php $no++; ?>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="3"></th>
                    <th>Total Simpanan : Rp. <?= number_format($sisa); ?></th>
                </tr>
                </tfoot>
              </table>
            </div>
  		</div>
<?php $this->load->view("templates/footer.php") ?>