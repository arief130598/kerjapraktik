<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Website Kerja Praktik Telkom University">
    <title>Home - Dosen</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sidebar-main.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sidebar-themes.css')?>">
    <link rel="shortcut icon" type="img/png" href="<?php echo base_url('assets/images/kp.png')?>" />
</head>

<body>
    <div class="page-wrapper ice-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#">kerja praktik</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="<?php echo base_url('assets/images/user.jpg')?>" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">
                            <?php 
                                $nama = $this->session->userdata('nama');
                                echo ucwords($nama);
                            ?>
                        </span>
                        <span class="user-id">
                            <?php 
                                echo $this->session->userdata('id');
                            ?>
                        </span>
                        <span class="user-role">
                            <?php 
                                $status = $this->session->userdata('status');
                                echo ucwords($status);
                            ?>
                        </span>
                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-search">
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Search...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="homedosen">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="submitnilaidosen">
                                <i class="fa fa-chart-line" aria-hidden="true"></i>
                                <span>Submit Nilai</span>
                            </a>
                        </li>
                        <li>
                            <a href="tinjauproposal">
                                <i class="fa fa-file" aria-hidden="true"></i>
                                <span>Tinjau Proposal</span>
                            </a>
                        </li>
                        <li>
                            <a href="tinjaulaporan">
                                <i class="fa fa-file" aria-hidden="true"></i>
                                <span>Tinjau Laporan</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <div>
                    <a href="<?php echo base_url(). 'homemahasiswa/logout'; ?>">
                        <i class="fa fa-power-off"></i>
                    </a>
                </div>
            </div>
        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="form-group col-md-12">
                        <div id="carouselExampleIndicators" class="carousel slide">
                          <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                          </ol>
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img class="d-block w-100" src="<?php echo base_url('assets/images/konsultasi.png')?>" alt="First slide" width="100%" height="120px">
                              <div class="carousel-caption d-none d-md-block">
                                <a href="#" style="color: #FFF">
                                <h5 style="font-size: 5.0vh;">Mekanisme Konsultasi</h5>
                                <p style="color: #FFF">Cara-cara dalam berkonsultasi yang perlu dipersiapkan adalah...</p>
                                </a>
                              </div>
                            </div>
                            <a href="#">
                            <div class="carousel-item">
                              <img class="d-block w-100" src="<?php echo base_url('assets/images/telkomkp.jpg')?>" alt="Second slide" width="100%" height="120px">
                              <div class="carousel-caption d-none d-md-block">
                                <a href="#" style="color: #FFF">
                                <h5 style="font-size: 5.0vh;">Mekanisme UPKP</h5>
                                <p style="color: #FFF">Persiapan yang perlu dilakukan sebelum melakukan Ujian Presentasi Kerja Praktik adalah...</p>
                                </a>
                              </div>
                            </div>
                            </a>
                            <a href="#">
                            <div class="carousel-item">
                              <img class="d-block w-100" src="<?php echo base_url('assets/images/telkom.png')?>" alt="Third slide" width="100%" height="120px">
                              <div class="carousel-caption d-none d-md-block">
                                <a href="#" style="color: #FFF">
                                <h5 style="font-size: 5.0vh;">Jadwal UPKP S1-TK</h5>
                                <p style="color: #FFF">Berikut adalah nama-nama beserta jadwal UPKP Fakultas Teknik Elektro...</p>
                                </a>
                              </div>
                            </div>
                            </a>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="card-deck">
                          <div class="card" style=" height: 16.5rem">
                            <img class="card-img-top" src="<?php echo base_url('assets/images/telkom.png')?>" alt="Card image cap" height="110px">
                            <div class="card-body">
                              <a href="#"> <h5 class="card-title" href="#">Jadwal UPKP S1-TT</h5></a>
                              <p class="card-text">Berikut adalah nama-nama beserta jadwal UPKP S1-TT...</p>
                            </div>
                          </div>
                          <div class="card" style=" height: 16.5rem">
                            <img class="card-img-top" src="<?php echo base_url('assets/images/telkom.png')?>" alt="Card image cap" height="110px">
                            <div class="card-body">
                              <a href="#"><h5 class="card-title" href="#">Jadwal UPKP S1-TE</h5></a>
                              <p class="card-text">Berikut adalah nama-nama beserta jadwal UPKP S1-TE...</p>
                            </div>
                          </div>
                          <div class="card" style=" height: 16.5rem">
                            <img class="card-img-top" src="<?php echo base_url('assets/images/telkom.png')?>" alt="Card image cap" height="110px">
                            <div class="card-body">
                              <a href="#"><h5 class="card-title" href="#">Jadwal UPKP S1-TK</h5></a>
                              <p class="card-text">Berikut adalah nama-nama beserta jadwal UPKP S1-TK...</p>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="card-deck">
                          <div class="card" style=" height: 17rem">
                            <img class="card-img-top" src="<?php echo base_url('assets/images/telkom.png')?>" alt="Card image cap" height="110px">
                            <div class="card-body">
                              <a href="#"><h5 class="card-title" href="#">Jadwal UPKP S1-TF</h5></a>
                              <p class="card-text">Berikut adalah nama-nama beserta jadwal UPKP S1-TF...</p>
                            </div>
                          </div>
                          <div class="card" style=" height: 17rem">
                            <img class="card-img-top" src="<?php echo base_url('assets/images/telkomkp.jpg')?>" alt="Card image cap" height="110px">
                            <div class="card-body">
                              <a href="#"><h5 class="card-title" href="#">Mekanisme UPKP</h5></a>
                              <p class="card-text">Persiapan yang perlu dilakukan sebelum melakukan Ujian Presentasi Kerja Praktik adalah...</p>
                            </div>
                          </div>
                          <div class="card" href="#" style=" height: 17rem">
                            <img class="card-img-top" src="<?php echo base_url('assets/images/konsultasi.png')?>" alt="Card image cap" height="110px">
                            <div class="card-body">
                              <a href="#"><h5 class="card-title" >Mekanisme Konsultasi</h5></a>
                              <p class="card-text">Cara-cara dalam berkonsultasi yang perlu dipersiapkan adalah...</p>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </main>
        <!-- page-content" -->
    </div>
    <!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo base_url('assets/js/sidebar-main.js')?>"></script>
    <script src="<?php echo base_url('assets/js/main.js')?>"></script>
    <script src="<?php echo base_url('assets/carousel.js')?>"></script>

</body>

</html>