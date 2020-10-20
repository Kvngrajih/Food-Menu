


       <?php
        unset($_SESSION['success']);
           
       ?>

       
        <script src="assets/js/codebase.core.min.js"></script>

        <!--
            Codebase JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
        <script src="assets/js/codebase.app.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
        <script src="assets/js/plugins/es6-promise/es6-promise.auto.min.js"></script>
        <script src="assets/js/plugins/sweetalert2/sweetalert2.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/be_ui_activity.min.js"></script>

        <!-- Page JS Helpers (BS Notify Plugin) -->
        <script>jQuery(function(){ Codebase.helpers('notify'); });</script>

    </body>
</html>