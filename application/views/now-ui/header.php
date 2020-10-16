<!--
=========================================================
* Now UI Kit - v1.3.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-kit
* Copyright 2019 Creative Tim (http://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/now-ui-kit/blob/master/LICENSE.md)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?=site_url('assets/now-ui-kit-master')?>/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?=site_url('assets/now-ui-kit-master')?>/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- ----------------------------------------------------------------------- 
    Section (6) : $ui_brand             
        -> untuk menambahkan judul pada navbar brand
            * format penulisan  
                String 
            * contoh penulisan  
                'Laporan' 
    ------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------- 
        Lihat section (6) diatas dan section (2)
    ------------------------------------------------------------------------------- -->
    <title>
        <?=((isset($ui_title) ? $ui_title : '(ui_title) : Tidak ada Judul'))?> <?=((isset($ui_brand) ? $ui_brand : '(ui_title) : Tidak ada Judul'))?>
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!--     Fonts and icons     -->
    <link href="<?=site_url('assets/now-ui-kit-master')?>/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=site_url('assets/now-ui-kit-master')?>/css/now-ui-kit.css?v=1.3.0" rel="stylesheet" />
    <link rel="stylesheet" href="<?=site_url('assets/fontawesome-free-5.14.0-web/css/all.min.css')?>">
    <link rel="stylesheet" href="<?=site_url('assets/custom/css/default.css')?>">


    <!-- ----------------------------------------------------------------------- 
        Section (1) : ui_css        
        untuk penulisan CSS tambahan 
            * format penulisan  
                Berupa array 1 dimensi tanpa key
            * contoh penulisan  
                    ['custom/css/default.css', 'custom/css/wizard.css'] 
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

<body class="index-page sidebar-collapse">
    <!-- Navbar -->
    <!-- ----------------------------------------------------------------
        Section (2) : ui_jumbotron_enable 
        Untuk mengaktifkan jumbotron, karena kelas dan atribut khusus diperlukan agar jumbotron bekerja semestinya
            * format penulisan 
                terserah 
            * contoh penulisan 
                true 
    ---------------------------------------------------------- -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top <?=((isset($ui_jumbotron_enable)) ? 'navbar-transparent' : 'navbar-dark')?>" <?=((isset($ui_jumbotron_enable)) ? 'color-on-scroll="400"' : '')?>>
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="#" rel="tooltip" title="" data-placement="bottom" target="_blank">
                    <!-- ---------------------------------------------------------- 
                        Section (3) : ui_title
                        untuk Judul pada navigasi atas
                            * format penulisan  -> 
                                string biasa 
                            * contoh penulisan  -> 
                                "Awokawkwk App" 
                    ---------------------------------------------------------- -->
                    <?=((isset($ui_title) ? $ui_title : '(ui_title) : Tidak ada Judul'))?>
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar top-bar"></span>
                    <span class="navbar-toggler-bar middle-bar"></span>
                    <span class="navbar-toggler-bar bottom-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="<?=site_url('assets/now-ui-kit-master')?>/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <!-- ------------------------------------------------------------------------------- 
                        Section (4) : ui_nav_item 
                        untuk menambahkan daftar link nav kiri
                            * format penulisan      -> 
                                Array berisi string dengan delimiter --- 'Nama Link|Ikon|Link'
                                Lebih baik Gunakan site_url() untuk penulisan link dalam CodeIgniter ini
                            * contoh penulisan      -> 
                                ['Menu 1|fas fa-home|' . site_url('data/user'), 'Menu 1|fas fa-home|' . site_url('data/user')]
                    -------------------------------------------------------------------------------- -->  

                    <!-- -------------------------------------------------------------------------------
                        Section (5) : ui_nav_active
                        Menentukan link nav mana yang aktif 
                            * format penulisan  -> 
                                Berupa String biasa berisi nama link yang sesuai dengan $ui_nav_item
                            * contoh penulisan  -> 
                                'Menu 1' 
                    -------------------------------------------------------------------------------- -->
                    <?php 
                        if (isset($ui_nav_item) && is_array($ui_nav_item)) {
                            // gk tau mau ngapain disini
                        }
                        else {
                            $ui_nav_item = array(
                                'Menu 1|fas fa-home|#',
                                'Menu 2|fas fa-user|#',
                                'Menu 3|fas fa-table|#',
                                'Menu 4|fas fa-heading|#',
                                'Menu 5|fas fa-grip-horizontal|#',
                                'Menu 6|fas fa-map|#',
                                'Menu 7|fas fa-bell|#'
                            );
                        }

                        if (isset($ui_nav_active)) {
                            // gk tau mau ngapain disini
                        }
                        else {
                            $ui_nav_active = '';
                        }
                        foreach ($ui_nav_item as $nav_item) {
                            $item_array = explode('|', $nav_item);
                    ?>
                    <li class="nav-item <?=((isset($item_array[0]) && $item_array[0] != '') ? (($ui_nav_active == $item_array[0]) ? 'active' : '') : 'Tidak ada nama link')?>">
                        <a class="nav-link" href="<?=((isset($item_array[2]) && $item_array[2] != '') ? $item_array[2] : 'No link')?>">
                            <i class="fa-lg <?=((isset($item_array[1]) && $item_array[1] != '') ? $item_array[1] : 'wn-error-icon-nav')?>" style="position: relative; left: -4px;"></i>
                            <p><?=((isset($item_array[0]) && $item_array[0] != '') ? $item_array[0] : 'gk ada nama link ajg')?></p>
                        </a>
                    </li>
                    <?php 
                        }
                    ?>
                    <li class="nav-item dropdown nav-login">
                        <a class="nav-link dropdown-toggle" data-toggle='dropdown' href="javascript:;" data-toggle='dropdown'>
                            <!------------------------------------------------------------ -->                   
                            <!-- SYSTEM DATABASE : Logged User data
                                    * atribut data yang dibutuhkan adalah Nama lengkap dan avatar/foto profil dari user 
                                    * nama_lengkap lengkap di representasikan dengan    : $logged_user->nama_lengkap 
                                    * Avatar di representasikan dengan          : $logged_user->avatar 
                                    * Rubah variabel tersebut jika dibutuhkan 
                                contoh data: 
                                $logged_user = new stdClass();
                                $logged_user->nama_lengkap = 'Badar Wildanie';
                                $logged_user->avatar = 'assets/custom/images/user/Annotation 2020-04-02 2208172.png';
                            ------------------------------------------------------------- -->
                            <img class="rounded-circle" src="<?=site_url(((isset($logged_user->avatar) && $logged_user->avatar != '') ? $logged_user->avatar : 'assets/custom/images/img_unavailable.png'))?>">
                            <span><?=((isset($logged_user->nama_lengkap) && $logged_user->nama_lengkap != '') ? $logged_user->nama_lengkap : 'Login')?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right p-0">
                            <?php  
                                if (isset($logged_user)) {
                            ?>
                            <li><a href="#"><i class="fas fa-user-edit"></i>Edit profil</a></li>
                            <li><a href="#"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                            <?php 
                                }
                                else {
                            ?>
                            <li><a href="<?=site_url('auth/login')?>"><i class="fas fa-user-edit"></i>Login</a></li>
                            <?php 
                                }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
         
        