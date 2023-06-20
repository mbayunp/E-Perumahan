<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Informasi Iuran Warga</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="<?= base_url() ?>assets/images/favicon.ico" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <!-- Required Js -->
    <script src="<?= base_url() ?>assets/js/vendor-all.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/ripple.js"></script>
    <script src="<?= base_url() ?>assets/js/pcoded.min.js"></script>

    <link href="<?= base_url('assets/') ?>js/sweetalert2.min.css" rel="stylesheet">
    <script src="<?= base_url('assets/') ?>js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/jquery.validate.min.js"></script>






</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar menu-light ">
        <div class="navbar-wrapper  ">
            <div class="navbar-content scroll-div ">
                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>dashboard" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>warga" class="nav-link "><span class="pcoded-micon"><i class="feather icon-life-buoy"></i></span><span class="pcoded-mtext">Data
                                Warga</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>iuran" class="nav-link "><span class="pcoded-micon"><i class="feather icon-cloud-lightning"></i></span><span class="pcoded-mtext">Data
                                Iuran</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>pengeluaran" class="nav-link "><span class="pcoded-micon"><i class="feather icon-bookmark"></i></span><span class="pcoded-mtext">Pengeluaran</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>report" class="nav-link "><span class="pcoded-micon"><i class="feather icon-bookmark"></i></span><span class="pcoded-mtext">Report</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>setting" class="nav-link "><span class="pcoded-micon"><i class="feather icon-bookmark"></i></span><span class="pcoded-mtext">Setting</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">


        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            <a href="#!" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                Iuran Warga
            </a>
            <a href="#!" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="feather icon-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <span>Admin</span>
                                <a href="<?= base_url('auth/logout') ?>" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </li>
            </ul>
        </div>


    </header>
    <!-- [ Header ] end -->