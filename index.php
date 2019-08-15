<?php 
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    include 'koneksi.php';
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>Kelola Uangku</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/dataTables/dataTables.bootstrap.css">
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/styleku.css">

</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Email: </strong>info@yourdomain.com
                    &nbsp;&nbsp;
                    <strong>Support: </strong>+90-897-678-44
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <span><strong>Kelola <br>Uangku</strong></span>
                </a>
            </div>
            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a class="menu-top-active" href="index.php"><i class="glyphicon glyphicon-home"></i>&nbsp;Dashboard</a></li>
                            <li><a href="?page=masuk"><i class="glyphicon glyphicon-floppy-save"></i>&nbsp;Uang Masuk</a></li>
                            <li><a href="?page=keluar"><i class="glyphicon glyphicon-floppy-open"></i>&nbsp;Uang Keluar</a></li>
                            <li><a href="?page=rekap"><i class="glyphicon glyphicon-th-list"></i>&nbsp;Rekapitulasi Uang</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php  
                        $page=$_GET["page"];
                        $aksi=$_GET["aksi"];

                        if ($page=="masuk") {
                            if ($aksi=="") {
                                include 'page/uang_masuk/masuk.php';
                            }elseif($aksi=="hapus") {
                                include 'page/uang_masuk/hapus.php';
                            }
                        }elseif ($page=="keluar") {
                            if ($aksi=="") {
                                include 'page/uang_keluar/keluar.php';
                            }elseif($aksi=="hapus") {
                                include 'page/uang_keluar/hapus.php';
                            }
                        }elseif ($page=="rekap"){
                            if ($aksi=="") {
                                include 'page/uang_rekap/rekap.php';
                            }
                        }elseif ($page==""){
                            include 'home.php';
                        }

                    ?>
                </div>
            </div>
        </div>
    </div>
        <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>&copy; 2019 Development | by : <a href="#">triyasniko</a></p>
                </div>
            </div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/dataTables/jquery.dataTables.js"></script>
    <script src="assets/dataTables/dataTables.bootstrap.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#dataTable').dataTable();
        });
    </script>
</body>
</html>
