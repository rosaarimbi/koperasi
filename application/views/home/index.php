  		<div class="p-5">
  		<center>
        <br>
        <p class="font-weight-bold float-right"><?php echo date('d F Y'); ?></p>
  			<h1 class="p-5 font-weight-bold">KOPERASI KARYA HUSADA</h1>
  			<br>
        <?php
         if($this->session->userdata('status') == 'login'){
  			echo'<p class="font-weight-bold">Selamat Datang '.$data['nama_anggota'].'</p>';
      }else{
        echo'<p class="font-weight-bold">Selamat Datang Anggota</p>';
      }
      ?>
      <div class="row">
          <div class="col-md-6 offset-md-3">
      <span class="responsive"><img src="<?php echo base_url(); ?>images/images.png"></span>
      </div>
      </div
  		</center>
  		</div>
<?php $this->load->view("templates/footer.php") ?>
