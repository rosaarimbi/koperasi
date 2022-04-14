
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengelolaan Data Angsuran
      </h1>

      <br>
      <div class="col-md-12">
         <?php if ($this->session->flashdata('message')) : ?>
         <div class="alert alert-success">
         <?= $this->session->flashdata('message'); ?>.
         </div>
         <?php endif; ?>
      </div>
      <?php if ($this->session->flashdata('data')) : ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <?php echo $this->session->flashdata('data'); ?>.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                          <?php endif; ?>
      <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url(); ?>Angsuran/angsuran" method="POST">
              <div class="box-body ">
                <div class="form-group">
                  <label for="NIP" class="col-sm-2 control-label">Nama </label>

                  <div class="col-sm-8">
                    <select class="select2 form-control" name="NIP" id="NIP">
                    <option value="">Pilih</option>
                    <?php foreach ($anggota as $anggota): ?>
                    <option value="<?= $anggota['NIP'] ?>"><?= $anggota['nama_anggota'] ?></option>
                    <?php endforeach ?>
                    </select>
                  </div>
                  <input class="btn btn-info" type="button" id="tambah" name="btn" value="Cari" />
                </div>

                <div class="form-group">
                  <label for="tglangsuran" class="col-sm-2 control-label">Tgl Angsuran</label>

                  <div class="col-sm-8">
                    <input type="date" class="form-control" id="tgl_angsuran" name="tgl_angsuran" value="<?php echo date('Y-m-d');?>" readonly>

                  </div>
                </div>

                <div class="form-group">
                  <label for="jmlangsuran" class="col-sm-2 control-label">Jml Angsuran</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="jml_angsuran" name="jml_angsuran" placeholder="Jumlah Angsuran" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="angsuranke" class="col-sm-2 control-label">Angsuran ke</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="angsuran_ke" name="angsuran_ke" placeholder="Angsuran Ke" required>
                  </div>
                </div>
                <label><i>*Silahkan Cari Anggota dahulu untuk memastikan angsuran</i></label>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right">Bayar</button>
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
                  <th>Jumlah Angsuran</th>
                  <th>Tanggal Angsuran</th>
                  <th>Angsuran Ke</th>
                  <th>Sisa</th>
                </tr>
                </thead>
                <tbody id="tampil">
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
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

<script type="text/javascript">
    $(document).ready(function(){

       $('.select2').select2();

      //untuk menampilkan jumlah angsuran
        $('#NIP').change(function(){

            var NIP = $(this).val();

            //var quantity     = $('#' + produk_id).val();
            $.ajax({
                url : "<?php echo base_url();?>Angsuran/getAngsuran",
                method : "POST",
                data : { NIP: NIP },
                success: function(data){
                    //$('#detail_cart').html(data);
                    var json=$.parseJSON(data);
                    $('#jml_angsuran').val(json.angsuran);
                }
            });

        });


    });
    // Menampilkan menmabhakan data angsuran
        $('#tambah').click(function(){
            var NIP  = $('#NIP').val();

            $.ajax({
                url : "<?php echo base_url();?>Angsuran/cari",
                method : "POST",
                data : {NIP: NIP},
                success: function(data){
                  var json=$.parseJSON(data);
                    $('#tampil').html(json);
                }
            });
        });

</script>
<?php $this->load->view("templates/footer.php") ?>
