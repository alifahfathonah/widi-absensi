
<?php $this->view('now-ui/header'); ?>

<div class="page-header clear-filter" filter-color="orange">
    <div class="page-header-image" data-parallax="true" style="background-image:url('<?=site_url('assets/now-ui-kit-master')?>/img/header.jpg');">
    </div>
    <div class="container">
        <div class="content-center brand">
            <img class="n-logo" src="<?=site_url('assets/now-ui-kit-master')?>/img/now-logo.png" alt="">
            <h1 class="h1-seo pt-4 mb-1">E-Learning STIKI Malang.</h1>
            <h5>Lebih mudah belajar secara daring dengan platform khusus STIKI E-learning.</h5>
        </div>
    </div>
</div> <!-- end div.page-header -->


<div class="section section-images">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="hero-images-container">
                    <img src="<?=site_url('assets/now-ui-kit-master/')?>img/hero-image-1.png" alt="">
                </div>
                <div class="hero-images-container-1">
                    <img src="<?=site_url('assets/now-ui-kit-master/')?>img/hero-image-2.png" alt="">
                </div>
                <div class="hero-images-container-2">
                    <img src="<?=site_url('assets/now-ui-kit-master/')?>img/hero-image-3.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->view('now-ui/js_script'); ?>
<?php $this->view('now-ui/footer'); ?>