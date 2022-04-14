<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Pinjaman
      </h1>

      <br>
       <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                   <div class="col-lg-6 p-5">
                    <div class="card">
                          <?php if ($this->session->flashdata('message')) : ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <?php echo $this->session->flashdata('message'); ?>.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                          <?php endif; ?>
                          <?php if ($this->session->flashdata('kurang')) : ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <?php echo $this->session->flashdata('kurang'); ?>.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                          <?php endif; ?>
                        <div class="card-body card-block">
                            <form action="" method="post" class="">
                                        <input type="hidden" id="id_user" name="id_user" value="<?= $user['id_user'] ?>" class="form-control" readonly>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">NIP</label>
                                    <div class="input-group  col-lg-8">
                                        <select class="select2 form-control" name="NIP" id="NIP">
                                          <option value="">Pilih</option>
                                          <?php foreach ($anggota as $anggota): ?>
                                          <option value="<?= $anggota['NIP'] ?>"><?= $anggota['NIP'] ?></option>
                                          <?php endforeach ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Nama Peminjam</label>
                                    <div class="input-group  col-lg-8">
                                        <input type="text" id="nama" name="nama" class="form-control" readonly>

                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Tanggal Pinjaman</label>
                                    <div class="input-group  col-lg-8">
                                        <input type="date" id="tgl_pinjamamn" name="tgl_pinjaman" value="<?php echo date('Y-m-d'); ?>" class="form-control" readonly>

                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Jumlah Pinjaman</label>
                                    <div class="input-group">
                                        <input type="number" id="jml_pinjaman" name="jml_pinjaman" placeholder="Jumlah pinjam" class="form-control" min="5" required>
                                        <small>Jumlah Pinjaman Minimal 3 juta dan Maksimal 50 Juta !</small>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Bunga</label>
                                    <div class="input-group">
                                        <input type="text" value="1.25" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Jangka</label>
                                    <div class="input-group col-lg-8">
                                        <select class="form-control" name="jangka" id="jangka" required>
                                          <option value="">Pilih</option>
                                          <option value="12">12 Bulan</option>
                                          <option value="24">24 Bulan</option>
                                          <option value="36">36 Bulan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Angsuran</label>
                                    <div class="input-group  col-lg-8">
                                        <input type="text" id="angsuran" name="angsuran" placeholder="Angsuran" class="form-control" readonly>

                                    </div>
                                </div>
                                <div class="form-group">
                                  <label  for="" class="col-sm-4 col-form-label">Total</label>
                                  <div class="input-group  col-lg-8">
                                      <input type="text" id="total" name="total" placeholder="Total" class="form-control" readonly>

                                  </div>
                                </div>
                                <div class="form-actions form-group">
                                  <center><button type="submit" class="btn btn-info">SIMPAN
                                  </button> |
                                  <a href="<?php echo base_url();?>Pinjaman" class="btn btn-danger">BATAL</a></center></center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
       </div>
    </section>

  </div>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

            <script type="text/javascript">

            $(document).ready(function() {

              //perintah untuk menampilkn jml pinjam yang sudah dikali bunga
                $('#jml_pinjaman').keyup(function(){
                var bunga= 1.25 ;
                var pinjaman=parseInt($('#jml_pinjaman').val());

                var hasil=bunga*pinjaman;
                $('#total').val(hasil);
                });

                //perintah untuk menampilkan angsuran
                $('#jangka').change(function(){
                var total= $('#total').val();
                var jangka=parseInt($('#jangka').val());

                var angsuran=total/jangka;
                $('#angsuran').val(angsuran);
                });

            $('.select2').select2();


            //Menampilkan Barang
        $('#NIP').change(function(){

            var NIP = $(this).val();

            //var quantity     = $('#' + produk_id).val();
            $.ajax({
                url : "<?php echo base_url();?>Anggota/getAnggota",
                method : "POST",
                data : { NIP: NIP },
                success: function(data){
                    //$('#detail_cart').html(data);
                    var json=$.parseJSON(data);
                    $('#nama').val(json.nama_anggota);
                }
            });

        });
      });
            </script>
<?php $this->load->view("templates/footer.php") ?>
