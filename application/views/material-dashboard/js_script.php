
                </div> <!-- end div.container-fluid -->
            </div> <!-- end  content -->
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
