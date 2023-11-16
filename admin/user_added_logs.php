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
<!-- _______________Contant header page start -->
<section class="content-header">
<h1>
    User Added Logs
</h1>
<ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User Added Logs</li>
</ol>
</section>
<!-- _________________Main Contant start -->
<section>
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
            </div>
            <div class="box-body table-responsive">
              <table style="width: 100%; table-layout: fixed;" id="logTable" class="table table-bordered table-responsive">
                <thead>
                  <th class="col-sm-1">ID</th>
                  <th class="col-xs-7">Description</th>
                  <th class="col-sm-2">Table Name</th>
                </thead>
                <tbody>
                  <?php
                   $sql = "SELECT `RecID`, `Log_Description`, `TBL_Name`, `isactive`, `created_by`, `created_on` FROM `logs` WHERE 1";
                  //  $sql = "call `StrProc_SelectLogsInfo`"; 
                   $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                       //$status = ($row['status'])?'<span class="label label-warning pull-right">ontime</span>':'<span class="label label-danger pull-right">late</span>';
                      echo "
                        <tr>
                          <td>".$row['RecID']."</td>
                          <td>".$row['Log_Description']."</td>
                          <td>".$row['TBL_Name']."</td>
                        </tr>
                      ";
                    }
                    // <button class='btn btn-danger btn-sm btn-flat delete' style='border-radius:8px;' data-id=''><i class='fa fa-trash'></i> Delete</button>
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</section>
<!-- _____________________Main Contant end -->
</div>
<!-- _____________________Contant Wrapper. Contains page content end-->

<?php include 'includes/footer.php'; ?>
</div>    
<?php include 'includes/scripts.php'; ?>
<script src="JS/datatable1.13.6.js"></script>
<script>
   $(document).ready( function () {
    $('#logTable').DataTable({
        dom: "'<'row'l>Bfrtip'",
        "scrollX": true,
        "scrollY": '500px',
    });
} );
</script>
</body>
<!-- _______________Body section end -->
