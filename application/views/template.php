<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $headernya; ?>
    <![endif]-->
    <?php echo $jsnya; ?>
</head>
<body>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Aplikasi Produksi</a>
        </div>
        <!-- /.navbar-header -->
        <?php echo $topbarnya; ?>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <?php echo $sidebarnya; ?>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $judul; ?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <?php echo $contentnya; ?>
        </div>
        <!-- /.row -->
        <div class="row">
                    <!-- /.panel-footer -->
                </div>
                <!-- /.panel .chat-panel -->
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
    });
    $.validate({
        form: '#form',
        validateOnBlur: true,
        showHelpOnFocus: true,
        addSuggestions: true,
        onSuccess: function($form) {
            console.log("success")
            return true;
        },
        onError: function() {
            console.log("Error")
        }
    });
</script>

</body>
</html>
