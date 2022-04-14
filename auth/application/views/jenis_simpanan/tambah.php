<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Jenis Simpanan
      </h1>

      <br>
      <br>
      <br>
       <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                   <div class="col-md-8">
                    <div class="card">
                        <div class="card-body card-block">
                            <form action="" method="post" class="">
                                <div class="form-group">
                                  <label for="" class="col-sm-4 col-form-label">Nama Jenis Simpanan</label>
                                    <div class="input-group">
                                        <input type="text" id="nama_jenis_simpanan" name="nama_jenis_simpanan" placeholder="Nama Jenis Simpanan" class="form-control">
                                        <div class="input-group-addon"><i class="fa fa-archive"></i></div>
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                  <center><button type="submit" class="btn btn-info">SIMPAN
                                  </button> |
                                  <button type="submit" class="btn btn-danger pl-5">BATAL
                                  </button></center>
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
<?php $this->load->view("templates/footer.php") ?>