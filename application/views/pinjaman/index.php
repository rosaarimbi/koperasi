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
                  <th>Tanggal Pinjam</th>
                  <th>Jumlah Pinjam</th>
                  <th>Jangka</th>
                  <th>Angsuran ke</th>
                  <th>Nominal Sisa</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ( $data as $data) : ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <!--td><?= $data['tgl_angsuran']; ?></td-->
                    <td><?php echo date('d F Y', strtotime($data['tgl_angsuran'])); ?></td>
                    <td>Rp. <?= number_format($data['jml_pinjaman']); ?></td>
                    <td><?= $data['jangka']; ?> Bulan</td>
                    <td><?= $data['angsuran_ke']; ?></td>
                    <td>Rp. <?= number_format($data['sisa']); ?></td>
                  </tr>
                <?php $no++; ?>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
  		</div>
<?php $this->load->view("templates/footer.php") ?>