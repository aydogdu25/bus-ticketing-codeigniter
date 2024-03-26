<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>Umuttepe Turizm</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" href="assets/frontend/img/fav.ico" type="image/x-icon">
    <link href="assets/frontend/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="assets/frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/frontend/css/style.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
</head>

<body>

    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-lg-flex">
            <div class="col-lg-6 col-12 px-3 text-start">

                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+0212 345 6789</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i
                            class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-12 px-3 text-end">

                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    TARİH:
                    <?php date_default_timezone_set('Europe/Istanbul');
                    echo date("d.m.Y H:i:s"); ?>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <img src="assets/frontend/img/log.png" alt="Küçük İkon">
                    <a href="Login"><small><u>Admin Giriş</u></small></a>
                </div>
            </div>
        </div>
    </div>



    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="<?php echo base_url() ?>" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><img src="assets/frontend/img/logo.png" />Umuttepe Turizm</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="<?php echo base_url() ?>" class="nav-item nav-link <?php if ($active_page == 'anasayfa')
                       echo 'active'; ?>">Anasayfa</a>
                <a href="biletAra" class="nav-item nav-link <?php if ($active_page == 'biletAra')
                    echo 'active'; ?>">Bilet Ara</a>
                <a href="biletSor" class="nav-item nav-link <?php if ($active_page == 'biletSor')
                    echo 'active'; ?>">Bilet Sorgula</a>
                <?php
                if (isset ($_SESSION["login"])) {
                    echo '<a href="profil" class="nav-item nav-link';
                    if ($active_page == 'profil') {
                        echo ' active';
                    }
                    echo '">Hesabım</a>';
                    echo '<a href="logout" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Çıkış Yap<i class="fa fa-arrow-right ms-3"></i></a>';
                } else {
                    echo '<a href="giris" class="nav-item nav-link';
                    if ($active_page == 'giris') {
                        echo ' active';
                    }
                    echo '">Giriş</a></div>';
                    echo '<a href="kayit" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Kayıt Ol<i class="fa fa-arrow-right ms-3"></i></a>';
                }
                ?>
            </div>

    </nav>