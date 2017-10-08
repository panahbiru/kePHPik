</div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo $conf->css_url;?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo $conf->css_url;?>vendor/popper/popper.min.js"></script>
    <script src="<?php echo $conf->css_url;?>vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>