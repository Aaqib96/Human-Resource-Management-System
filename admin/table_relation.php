<?php include 'includes/conn.php'; ?>
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<link rel="stylesheet" href="style/datatable1.13.6.css">
<link rel="stylesheet" href="style/datatable2.4.1.css">

<!-- _______________Body section atart -->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>

<!-- _______________Contant Wrapper. Contains page content start -->
<div class="content-wrapper">
<!-- ________________________Contant header page start -->
<section class="content-header">
<h1>
    Table Relarion
</h1>
<ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Table Relarion</li>
</ol>
</section>
<!-- _________________________Main Contant start -->
<section>
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
            </div>
            <div class="box-body table-responsive">
              <table style="width: 100%; table-layout: fixed;" id="Tablerelation" class="table table-bordered table-responsive">
                <thead>
                  <th>ID</th>
                  <th></th>
                  <th></th>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</section>
<!-- ___________________Main Contant end -->
</div>
<!-- ___________________Contant Wrapper. Contains page content end-->

<?php include 'includes/footer.php'; ?>
</div>    
<?php include 'includes/scripts.php'; ?>
<script src="JS/datatable1.13.6.js"></script>
<script>
   $(document).ready( function () {
    $('#Tablerelation').DataTable({
        dom: "'<'row'l>Bfrtip'",
        "scrollX": true,
        "scrollY": '500px',
    });
} );
</script>
</body>
<!-- _______________Body section end -->
