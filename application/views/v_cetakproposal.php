<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Website Kerja Praktik Telkom University">
    <title>Cetak Proposal - LAA</title>
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
                                echo strtoupper($status);
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
                            <a href="<?php echo site_url('homelaa')?>">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('submitnilailaa')?>">
                                <i class="fa fa-chart-line" aria-hidden="true"></i>
                                <span>Submit Nilai</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('cetakproposal')?>">
                                <i class="fa fa-file" aria-hidden="true"></i>
                                <span>Cetak Proposal</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <div>
                    <a href="<?php echo base_url(). 'homelaa/logout'; ?>">
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
                       <table class="table table-striped" style="margin-top: 15px">
                          <thead>
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Cetak Dokumen</th>
                              <th scope="col" style="text-align: center;">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $n=0; for($i = 0; $i < count($values); $i++)
                            {  
                                $path1 = 'file/proposal/' . $map1[$i];

                                if($values[$i]=='2')
                                {
                            ?>
                            <tr>
                              <td scope="row"><?php echo ($n+1)?></td>
                              <td>
                                    <a href="<?php echo $path1?>" target="blank"><?php echo $map1[$i]?></a></br>
                              </td>
                              <td style="text-align: center;">
                                    <i class="fa fa-print" aria-hidden="true"><span><a href="<?php echo base_url('cetakproposal/cetak/'.$ids[$i]); ?>"> Ajukan Sudah Dicetak</a></span>
                              </td>
                            </tr>
                            <?php $n++;
                                }
                            }?>
                          </tbody>
                        </table>
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