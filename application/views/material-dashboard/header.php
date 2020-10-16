<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?=site_url('assets/material-dashboard-master')?>/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?=site_url('assets/material-dashboard-master')?>/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- ----------------------------------------------------------------------- 
        Lihat section (2) dan section (5)
    ------------------------------------------------------------------------------- -->
    <title>
        <?=((isset($ui_title) ? $ui_title : '(ui_title) : Tidak ada Judul'))?> <?=((isset($ui_brand) ? $ui_brand : '(ui_title) : Tidak ada Judul'))?>
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="<?=site_url('assets/fontawesome-free-5.14.0-web/css/all.min.css')?>">
    <!-- CSS Files -->
    <link href="<?=site_url('assets/custom/css/default.css')?>" rel="stylesheet" />
    <link href="<?=site_url('assets/material-dashboard-master')?>/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />

    <!-- ----------------------------------------------------------------------- 
        Section (1) : ui_css        -> untuk penulisan CSS tambahan 
                * format penulisan  -> Berupa array 1 dimensi tanpa key
                * contoh penulisan  -> ['custom/css/default.css', 'custom/css/wizard.css'] 
    ------------------------------------------------------------------------------- -->
    <?php 
        if (isset($ui_css) && is_array($ui_css)) {
            foreach ($ui_css as $css) {
    ?>
    <link rel="stylesheet" type="text/css" href="<?=site_url('assets/') . $css?>">
    <?php 
            }
        }
    ?>
</head>

<body class="">
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="<?=site_url('assets/material-dashboard-master')?>/img/sidebar-1.jpg">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                    <!-- ---------------------------------------------------------- 
                        Section (2) : ui_title  -> untuk Judul pada pojok kiri atas
                            * format penulisan  -> string biasa 
                            * contoh penulisan  -> "Awokawkwk App" 
                    ---------------------------------------------------------- -->
                    <?=((isset($ui_title) ? $ui_title : '(ui_title) : Tidak ada Judul'))?>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">

                    <!-- ------------------------------------------------------------------------------- 
                        Section (3) : ui_sidebar_item   -> untuk menambahkan daftar link sidebar kiri
                                * format penulisan      -> Array berisi string dengan delimiter --- 'Nama Link|Ikon|Link'
                                                           Lebih baik Gunakan site_url() untuk penulisan link dalam CodeIgniter ini
                                * contoh penulisan      -> ['Menu 1|fas fa-home|' . site_url('data/user'), 'Menu 1|fas fa-home|' . site_url('data/user')]
                    -------------------------------------------------------------------------------- -->  

                    <!-- -------------------------------------------------------------------------------
                        Section (4) : ui_sidebar_active)-> Menentukan link sidebar mana yang aktif 
                                * format penulisan      -> Berupa String biasa berisi nama link yang sesuai dengan $ui_sidebar_item
                                * contoh penulisan      -> 'Menu 1' 
                    -------------------------------------------------------------------------------- -->
                    <?php 
                        if (isset($ui_sidebar_item) && is_array($ui_sidebar_item)) {
                            // gk tau mau ngapain disini
                        }
                        else {
                            $ui_sidebar_item = array(
                                'Menu 1|fas fa-home|#',
                                'Menu 2|fas fa-user|#',
                                'Menu 3|fas fa-table|#',
                                'Menu 4|fas fa-heading|#',
                                'Menu 5|fas fa-grip-horizontal|#',
                                'Menu 6|fas fa-map|#',
                                'Menu 7|fas fa-bell|#'
                            );
                        }

                        if (isset($ui_sidebar_active)) {
                            // gk tau mau ngapain disini
                        }
                        else {
                            $ui_sidebar_active = '';
                        }
                        foreach ($ui_sidebar_item as $sidebar_item) {
                            $item_array = explode('|', $sidebar_item);
                    ?>
                    <li class="nav-item <?=((isset($item_array[0]) && $item_array[0] != '') ? (($ui_sidebar_active == $item_array[0]) ? 'active' : '') : 'Tidak ada nama link')?>">
                        <a class="nav-link" href="<?=((isset($item_array[2]) && $item_array[2] != '') ? $item_array[2] : 'No link')?>">
                            <i class="<?=((isset($item_array[1]) && $item_array[1] != '') ? $item_array[1] : 'wn-error-icon-sidebar')?>"></i>
                            <p><?=((isset($item_array[0]) && $item_array[0] != '') ? $item_array[0] : 'gk ada nama link ajg')?></p>
                        </a>
                    </li>
                    <?php 
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <!-- ---------------------------------------------------------- 
                            Section (5) : ui_brand     -> untuk menambahkan judul pada navbar brand
                                    * format penulisan -> String 
                                    * contoh penulisan -> 'Laporan' 
                        ---------------------------------------------------------- -->
                        <a class="navbar-brand" href="javascript:;"><?=((isset($ui_brand) && $ui_brand != '') ? $ui_brand : '(ui_brand) : Tidak ada judul')?></a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            <!-- ---------------------------------------------------------- 
                                Section (6) : ui_nav_item       -> untuk menambahkan daftar link navbar atas
                                            * format penulisan  -> Array berisi string dengan delimiter --- 'Nama Link|Ikon|Link'
                                                                   * Gunakan site_url() untuk penulisan link dalam CodeIgniter ini
                                                                   formatnya SAMA SEPERTI ui_sidebar_item
                                            * contoh penulisan  -> ['Nav Menu 1|fas fa-home|' . site_url('data/user'), 'Nav Menu 2|fas fa-home|' . site_url('data/user')] -->
                            <!------------------------------------------------------------ 
                                Section (7) : ui_nav_active     -> Menentukan link navbar atas mana yang aktif 
                                            * format penulisan  -> Berupa String biasa berisi nama link yang sesuai dengan $ui_sidebar_item
                                            * contoh penulisan  -> 'Nav Menu 1' -->
                            <!------------------------------------------------------------ -->
                            <?php
                                if (isset($ui_nav_item) && is_array($ui_nav_item)) {
                                    // gk tau mau ngapain disini
                                }
                                else {
                                    $ui_nav_item = array(
                                        'Nav Menu 1|fas fa-home|#',
                                        'Nav Menu 2|fas fa-user|#',
                                        'Nav Menu 3|fas fa-table|#',
                                    );
                                }

                                if (isset($ui_nav_active)) {
                                    // gk tau mau ngapain disini
                                }
                                else {
                                    $ui_nav_active = '';
                                }

                                foreach ($ui_nav_item as $nav_item) {
                                    $item = explode('|', $nav_item);
                            ?>
                            <li class="nav-item <?=((isset($item[0]) && $item[0] != '') ? (($ui_nav_active == $item[0]) ? 'active' : '') : 'Tidak ada nama link')?>">
                                <a class="nav-link" href="<?=((isset($item[2]) && $item[2] != '') ? $item[2] : 'No link')?>">
                                    <i class="<?=((isset($item[1]) && $item[1] != '') ? $item[1] : 'wn-error-icon-sidebar')?>"></i>
                                    <span class="d-none d-xl-inline"><?=((isset($item[0]) && $item[0] != '') ? $item[0] : 'gk ada nama link ajg')?></span>
                                </a>
                            </li>
                            <?php 
                                }
                            ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle='dropdown' href="javascript:;" data-toggle='dropdown'>
                                    <!------------------------------------------------------------ -->                   
                                    <!-- SYSTEM DATABASE : Logged User data
                                            * atribut data yang dibutuhkan adalah Nama lengkap dan avatar/foto profil dari user 
                                            * nama lengkap di representasikan dengan    : $logged_user->nama 
                                            * Avatar di representasikan dengan          : $logged_user->avatar 
                                            * Rubah variabel tersebut jika dibutuhkan 
                                        contoh data: 
                                        $logged_user = new stdClass();
                                        $logged_user->nama = 'Badar Wildanie';
                                        $logged_user->avatar = 'assets/custom/images/user/Annotation 2020-04-02 2208172.png';
                                    ------------------------------------------------------------- -->
                                    <img class="rounded-circle" src="<?=site_url(((isset($logged_user->avatar) && $logged_user->avatar != '') ? $logged_user->avatar : 'assets/custom/images/img_unavailable.png'))?>">
                                    <span><?=((isset($logged_user->nama) && $logged_user->nama != '') ? $logged_user->nama : 'Anonymous')?></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><i class="fas fa-user-edit"></i>Edit profil</a></li>
                                    <li><a href="#"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div> <!-- end div.container-fluid navbar -->
            </nav>
            <div class="content">
                <div class="container-fluid">
                    