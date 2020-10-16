
                </div> <!-- end div.container-fluid -->
            </div> <!-- end  content -->
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a href="https://www.creative-tim.com">
                                    Creative Tim
                                </a>
                            </li>
                            <li>
                                <a href="https://creative-tim.com/presentation">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="http://blog.creative-tim.com">
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="https://www.creative-tim.com/license">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright float-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, made with <i class="material-icons">favorite</i> by
                        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
                    </div>
                </div>
            </footer>
        </div> <!-- end main-panel-->
    </div> <! -- end div.wrapper -->

    <!--   Core JS Files   -->
    <script src="<?=site_url('assets/material-dashboard-master')?>/js/core/jquery.min.js"></script>
    <script src="<?=site_url('assets/material-dashboard-master')?>/js/core/popper.min.js"></script>
    <script src="<?=site_url('assets/material-dashboard-master')?>/js/core/bootstrap-material-design.min.js"></script>
    <script src="<?=site_url('assets/bootstrap-notify/bootstrap-notify.min.js')?>"></script>
    <script src="<?=site_url('assets/custom/js/default.js')?>"></script>
    <!-- ----------------------------------------------------------------------- 
        Section (8) : ui_css        -> untuk sambungan file JS tambahan 
                * format penulisan  -> Berupa array 1 dimensi tanpa key
                * contoh penulisan  -> ['custom/js/default.js', 'custom/js/wizard.js'] 
    ------------------------------------------------------------------------------- -->
    <?php 
        if (isset($ui_js) && is_array($ui_js)) {
            foreach ($ui_js as $js) {
    ?>
    <script src="<?=site_url('assets/') . $js?>"></script>
    <?php 
            }
        }
    ?>
