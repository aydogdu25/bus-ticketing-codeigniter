<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Paneli</title>

    <link href="assets/backend/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/backend/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/backend/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="assets/backend/assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="seferEkle">UmuttepeTurizm</a>
            </div>
            <div style="color: white;
                padding: 15px 50px 5px 50px;
                float: right;
                font-size: 16px;"><a href="logout" class="btn btn-danger square-btn-adjust">Logout</a>
            </div>
        </nav>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/backend/assets/img/find_user.png" class="user-image img-responsive" />
                    </li>


                    <li>
                        <a class="<?php if ($active_page == 'admin/seferEkle')
                            echo 'active'; ?>-menu" href="seferEkle"><i class="fa fa-edit fa-3x"></i> Sefer Ekle</a>
                    </li>
                    <li>
                        <a class="<?php if ($active_page == 'admin/seferDuzenle')
                            echo 'active'; ?>-menu" href="seferDuzenle"><i class="fa fa-desktop fa-3x"></i> Seferleri
                            Görüntüle</a>
                    </li>
                    <li>
                    <a class="<?php if ($active_page == 'admin/seferMesaj')
                        echo 'active'; ?>-menu" href="seferMesaj"><i class="fa fa-envelope fa-3x"></i>Mesajlar</a>
                    </li>
                    
                </ul>

            </div>

        </nav>