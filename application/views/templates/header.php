<!doctype html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">


    <title><?php echo $title; ?></title>

        <style type="text/css">
      .responsive img {
    max-width:100%;
    /*width:100%;*/
    height: auto;
}
    </style>
  </head>
  <body>
  	<!--navbar-->
  	<nav class="navbar navbar-expand-md bg-dark navbar-light fixed-top">
      <ul class="navbar-nav pl-5">
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>" class="nav-link text-white font-weight-bold">Home |</a>
        </li>
        <?php
         if($this->session->userdata('status') == 'login'){
                    echo '
                    <ul class="navbar-nav">
                    <li class="nav-item">
                      <a href="'.base_url().'Simpanan" class="nav-link text-white font-weight-bold">Info Simpanan |</a>
                    </li>
                  </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item">
                      <a href="'.base_url().'Pinjaman" class="nav-link text-white font-weight-bold">Info Pinjaman |</a>
                    </li>
                  </ul>

                    <div class="dropdown show">
                    <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link text-white font-weight-bold">Akun</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="'.base_url('Login/logout').'">Logout</a>
                    </div>
                    </div>';
                    }else{
                      echo'<ul class="navbar-nav">
                    <li class="nav-item">
                    <a href="'.base_url().'Login" class="nav-link text-white font-weight-bold">Login</a>
                    </li>
                    </ul>';
                    }
                    ?>
      </ul>
    </nav>
