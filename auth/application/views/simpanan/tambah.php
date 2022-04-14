  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Simpanan
      </h1>

      <br>
      <?php if ($this->session->flashdata('error')) : ?>
      <div class="alert alert-danger alert-dismissible" role="alert">
      <strong><?= $this->session->flashdata('error'); ?>.</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <?php endif; ?>
      <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                   <div class="col-lg-6 p-5">
                    <div class="card">
                        <div class="card-body card-block">
                            <form action="<?php echo site_url('Simpanan/add'); ?>" method="post" class="">
                              <input type="hidden" id="id_user" name="id_user" value="<?= $user['id_user'] ?>" class="form-control" readonly>
                              <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">ID Simpanan</label>
                                    <div class="input-group  col-md-8">
                                        <input type="text" class="form-control" id="id_simpanan" name="id_simpanan" value="<?php echo $kode; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">NIP</label>
                                    <div class="input-group col-md-8">
                                        <select class="select2 form-control" name="NIP" id="NIP" required>
                                          <option value="">Pilih</option>
                                          <?php foreach ($anggota as $anggota): ?>
                                          <option value="<?= $anggota['NIP'] ?>"><?= $anggota['NIP'] ?></option>
                                          <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Nama</label>
                                    <div class="input-group">
                                        <input type="text" id="nama_anggota" name="nama_anggota" placeholder="Nama" class="form-control" readonly>
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Tanggal Simpanan</label>
                                    <div class="input-group">
                                        <input type="date" id="tgl_simpan" name="tgl_simpan" value="<?php echo date('Y-m-d'); ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Jenis Simpanan</label>
                                  <div class="input-group">
                                    <select name="id_jenis_simpanan" id="id_jenis_simpanan" class="form-control" required>
                                      <option value="">Pilih Jenis Simpanan</option>
                                      <?php foreach ($jenis as $jenis): ?>
                                      <option value="<?= $jenis['id_jenis_simpanan'] ?>"><?= $jenis['nama_jenis_simpanan'] ?></option>
                                          <?php endforeach ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Jumlah Simpanan</label>
                                    <div class="input-group col-md-8">
                                        <input type="number" id="jumlah" name="jumlah" placeholder="Nominal" class="form-control" min="5" required >
                                        <small class="form-text text-danger"><?= form_error('jumlah'); ?></small>
                                    </div>
                                </div>
                                 <input type="hidden" id="qty" name="qty" value="1" class="form-control">
                                    <div class="form-group">
                                    <label for="" class="col-sm-4 col-form-label"></label>
                                    <div class="input-group">
                                  <input class="btn btn-success" type="button" id="tambah" name="btn" value="TAMBAH" />
                                  </div>
                                </div>

                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
       </div>
       <div class="box-body">
       <table class="table table-striped table-bordered">
         <thead>
             <tr>
                 <th>No</th>
                 <th>Jenis Simpanan</th>
                 <th>Jumlah Simpanan</th>
                 <th>Aksi</th>
             </tr>
         </thead>
         <tbody id="tampildata">
           <tr>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
           </tr>
         </tbody>
     </table>
     <br>
     <br>
     <br>
      <div class="form-actions form-group">
       <center>
        <button type="submit" name="simpan" class="btn btn-success float-right">Simpan</button>|
       <a href="<?php echo base_url();?>Simpanan" class="btn btn-danger">BATAL</a></center>
      </div>
      </form>
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

        $('#tampildata').load("<?php echo base_url();?>Simpanan/load_cart");

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
                    $('#nama_anggota').val(json.nama_anggota);
                }
            });

        });

        $('#id_jenis_simpanan').change(function(){

            var id_jenis_simpanan = $(this).val();

            //var quantity     = $('#' + produk_id).val();
            $.ajax({
                url : "<?php echo base_url();?>Jenis_simpanan/getJumlah",
                method : "POST",
                data : { id_jenis_simpanan: id_jenis_simpanan },
                success: function(data){
                    //$('#detail_cart').html(data);
                    var json=$.parseJSON(data);
                    $('#jumlah').val(json.jumlah);
                }
            });

        });

        // Menampilkan data
        $('#tambah').click(function(){
            var id_user    = $('#id_user').val();
            var id_simpanan    = $('#id_simpanan').val();
            var NIP       = $('#NIP').val();
            var nama_anggota   = $('#nama_anggota').val();
            var tgl_simpan   = $('#tgl_simpan').val();
            var id_jenis_simpanan   = $('#id_jenis_simpanan').val();
            var jumlah   = $('#jumlah').val();
            var qty   = $('#qty').val();

            $.ajax({
                url : "<?php echo base_url();?>Simpanan/simpanan",
                method : "POST",
                data : {id_simpanan: id_simpanan, id_user: id_user, NIP: NIP, nama_anggota: nama_anggota, tgl_simpan: tgl_simpan, id_jenis_simpanan: id_jenis_simpanan, jumlah: jumlah, qty, qty},
                success: function(data){
                    $('#tampildata').html(data);
                }
            });
        });

        //hapus data
        $(document).on('click','.hapus_cart',function(){
            var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
            $.ajax({
                url : "<?php echo base_url();?>Simpanan/hapus_cart",
                method : "POST",
                data : {row_id : row_id},
                success :function(data){
                    $('#tampildata').html(data);
                }
            });
        });

    });
</script>

<script type="text/javascript">
            function isi_otomatis(){
                var id_jenis_simpanan = $("#id_jenis_simpanan").val();
                $.ajax({
                    url: '<?php echo base_url();?>Jenis_simpanan/total',
                    data:"id_jenis_simpanan="+id_jenis_simpanan ,
                }).success(function (data) {
                    var json = data,
                    obj = $.parseJSON(json);
                    $('#total').val(obj.total);
                });
            }
        </script>
<?php $this->load->view("templates/footer.php") ?>
