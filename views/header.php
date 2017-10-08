<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $conf->site_title;?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $conf->css_url;?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $conf->css_url;?>css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        <?php echo $conf->site_title;?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $conf->site_url;?>">Home</a>
                </li>
                <li>
                    <a href="<?php echo $conf->site_url;?>home/produk/list_all">Daftar Produk</a>
                </li>
                <li>
                    <a href="<?php echo $conf->site_url;?>home/transaksi">Daftar Transaksi</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">