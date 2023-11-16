<?php include 'includes/session.php'; ?>
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="style/datatable1.13.6.css">
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css"> -->
<link rel="stylesheet" href="style/datatable2.4.1.css">
<?php
  include '../timezone.php';
  $range_to = date('m/d/Y');
  $range_from = date('m/d/Y', strtotime('-30 day', strtotime($range_to)));
?>

<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Payroll
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Payroll</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box-header with-border">
          <button class="btn btn-sm btn-flat" style="border-radius:8px;background-color:#4680ff;"><a href="payroll_genereate.php" name="paygn" style="color:white;">Generate PayRoll</a></button>
             </div>
            <div class="box-body table-responsive">
              <table style="width: 100%; table-layout: fixed;" id="example1" class="table table-bordered">
                <thead>
                  <th>ID</th>
                  <th>Employee Name</th>
                  <th>Designation</th>
                  <th>Shift</th>
                  <th>Pay Name</th>
                  <th>Time In</th>
                  <th>Time Out</th>
                  <th>Payroll Type</th>
                  <th>Salary</th>
                  <th>Deducted Days</th>
                  <th>Late</th>
                  <th>Absent</th>
                  <th>Deduction</th>
                  <th>M Deducted</th>
                  <th>Advance</th>
                  <th>M Advance</th>
                  <th>M Salary</th>
                  <th>Total_Pay</th>
                </thead>
                <tbody>
                   <?php
                   
                  //  $sql = "SELECT * FROM payroll";
                   $sql = "call `sp_Cursor_PayrollGenerator`";
                   $query = $conn->query($sql);
                   while($row = $query->fetch_assoc()){
                     echo "
                        <tr>
                         <td>".$row['RecId']."</td>
                         <td>".$row['Employee_Name']."</td>
                         <td>".$row['designation_name']."</td>
                         <td>".$row['shift_name']."</td>
                         <td>".$row['pay_name']."</td>
                         <td>".$row['time_in']."</td>
                         <td>".$row['time_out']."</td>
                         <td>".$row['payroll_type']."</td>
                         <td>".$row['salary']."</td>
                         <td>".$row['deducted_days']."</td>
                         <td>".$row['late']."</td>
                         <td>".$row['absent']."</td>
                         <td>".$row['Deduction']."</td>
                         <td>".$row['M_Deducted']."</td>
                         <td>".$row['Advance']."</td>
                         <td>".$row['M_Advance']."</td>
                         <td>".$row['M_Salary']."</td>
                         <td>".$row['Total_Pay']."</td>
                        </tr>
                     ";
                   }
                   ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
  
  <?php include 'includes/specpayroll_modal.php'; ?>
  <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?> 
<!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> -->
<script scr="JS/jquery3.7.0.js"></script>
<!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> -->
<script src="JS/datatable1.13.6.js"></script>
<!-- <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script> -->
<script src="JS/button2.4.1.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script> -->
<script src="JS/ajax3.10.1.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> -->
<script src="JS/ajax0.1.53pdf.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> -->
<script src="JS/ajax0.1.53font.js"></script>
<!-- <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script> -->
<script src="JS/button2.4.15.js"></script>

<script>
$(function(){
  $('#example1').DataTable().destroy();
  $('#example1').DataTable( {
    dom: "'<'row'l>Bfrtip'",
        // "pageLength": 90,
        "scrollX": true,
        "scrollY": '450px',

        buttons: [
                    {
                  extend: 'pdf',
                  title: 'Payroll',
                  orientation: 'landscape', // Set the orientation to landscape
                  customize: function(doc) {
                    // Customize the PDF document if needed
                    // For example, you can set the page size, margins, etc.
                    doc.pageSize = 'legal';
                    doc.pageMargins = [40, 60, 40, 60];
                  }
                },
            'copy', 'csv', 'excel', 'print'
        ]
    } );
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $("#reservation").on('change', function(){
    var range = encodeURI($(this).val());
    window.location = 'payroll.php?range='+range;
  });

  $('#payroll').click(function(e){
    e.preventDefault();
    $('#payForm').attr('action', 'payroll_generate.php');
    $('#payForm').submit();
  });

  $('#payslip').click(function(e){
    e.preventDefault();
    $('#payForm').attr('action', 'payslip_generate.php');
    $('#payForm').submit();
  });

});

</script>
<style>

.myButton {
	background-color:#2dabf9;
	-webkit-border-radius:23px;
	-moz-border-radius:23px;
	border-radius:23px;
	border:2px solid #0b0e07;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:4px 8px;
	text-decoration:none;
	text-shadow:-2px 2px 0px #263666;
}
.myButton:hover {
	background-color:#0688fa;
}
.myButton:active {
	position:relative;
	top:1px;
}
</style>
<script>
window.addEventListener('load', function() {
    var payrollButton = document.getElementById('payrollButton');
    // payrollButton.disabled = true; // Button ko disable kardo
});
</script>
</body>
</html>