<?php include 'includes/session.php'; ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
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
        Work Sheet
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
            <!-- <div class="box-header with-border">
              <div class="pull-right">
                <form method="POST" class="form-inline" id="payForm"> -->
                <!-- <button type="button" class="btn btn-success btn-sm btn-flat" id="save" name="save" style='border-radius:8px;'>
                    <span class="fa fa-check"></span> Save
                </button> -->
                  <!-- <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range" value="<?php echo (isset($_GET['range'])) ? $_GET['range'] : $range_from.' - '.$range_to; ?>">
                  </div>
                  <button type="button" class="btn btn-success btn-sm btn-flat" id="payroll" style='border-radius:8px;'><span class="glyphicon glyphicon-print"></span> Payroll</button>
                  <button type="button" class="btn btn-primary btn-sm btn-flat" id="payslip" style='border-radius:8px;'><span class="glyphicon glyphicon-print"></span> Payslip</button>
                </form>
              </div>
            </div> -->
            <div class="box-body table-responsive">
              <table style="width: 100%; table-layout: fixed;" id="example1" class="table table-bordered">
                <thead>
                  <th>ID</th>
                  <th>Employee Name</th>
                  <th>Designation</th>
                  <th>Shift name</th>
                  <th>Pay name</th>
                  <th>Time in</th>
                  <th>Time out</th>
                  <th>Payroll Type</th>
                  <th>Salary</th>
                  <th>Deducted days</th>
                  <th>Late</th>
                  <th>Absent</th>
                  <th>Deduction</th>
                  <th>M Deducted</th>
                  <th>Advance</th>
                  <th>M Advance</th>
                  <th>M Salary</th>
                  <th>Total Pay</th>
                  <th>Action</th>
                  
                </thead>
                <tbody>
                   <?php
                   
                  //  $sql = "SELECT * FROM payroll";
                   $sql = "call `sp_Cursor_PayrollGenerator`";
                  //  $sql = "call `sp_PayrollGenerator` (0)";
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
                         <td>". "<button class='btn btn-success btn-sm edit btn-flat edit-button' style='border-radius:8px;' data-id='".$row['RecId']."'><i class='fa fa-edit'></i> Edit</button>" . "
                         </td>
                        </tr>
                     ";
                     
                   }


                  //  _||_
                  //  \  /
                  //   \/
                  //  <td>". ($row['updated_on'] != null ? ""  : "<button class='btn btn-success btn-sm edit btn-flat edit-button' style='border-radius:8px;' data-id='".$row['RecId']."'><i class='fa fa-edit'></i> Edit</button>") . "
                  //  </td>

                   
              
                   
                   // $sql = "SELECT *, SUM(amount) as total_amount FROM deductions";
                  // $sql = "call StrProc_SelectPayRollInfo"; 
                   //$query = $conn->query($sql);
                    //$drow = $query->fetch_assoc();
                    //$deduction = $drow['total_amount'];
  
                    
                    //$to = date('Y-m-d');
                    //$from = date('Y-m-d', strtotime('-30 day', strtotime($to)));

                    //if(isset($_GET['range'])){
                      //$range = $_GET['range'];
                      //$ex = explode(' - ', $range);
                      //$from = date('Y-m-d', strtotime($ex[0]));
                      //$to = date('Y-m-d', strtotime($ex[1]));
                    //}

                    //$sql = "SELECT *, SUM(num_hr) AS total_hr, attendance.employee_id AS empid FROM attendance LEFT JOIN employees ON employees.id=attendance.employee_id LEFT JOIN position ON position.id=employees.position_id WHERE date BETWEEN '$from' AND '$to' GROUP BY attendance.employee_id ORDER BY employees.lastname ASC, employees.firstname ASC";
                   // $sql = "call StrProc_SelectPayRollInfo";  
                   // $query = $conn->query($sql);
                    // $total = 0;
                    //while($row = $query->fetch_assoc()){
                      //$empid = $row['empid'];
                      
                      //$casql = "SELECT *, SUM(amount) AS cashamount FROM cashadvance WHERE employee_id='$empid' AND date_advance BETWEEN '$from' AND '$to'";
                      //$sql = "call StrProc_SelectPayRollInfo";
                      //$caquery = $conn->query($casql);
                     // $carow = $caquery->fetch_assoc();
                      //$cashadvance = $carow['cashamount'];

                      //$gross = $row['rate'] * $row['total_hr'];
                      //$total_deduction = $deduction + $cashadvance;
                      //$net = $gross - $total_deduction;

                      // echo "
                      //   <tr>
                      //     <td>".$row['UserP_Id']."</td>
                      //     <td>".$row['Designation_Id']."</td>
                      //     <td>".$row['Shift_Id']."</td>
                      //     <td>".$row['Pay_Id']."</td>
                      //     <td>".$row['Deduction']."</td>
                      //     <td>".$row['salary']."</td>
                      //     <td>".$row['Total_Pay']."</td>
                          
                      //   </tr>
                      // ";
                   // }
                     
                  
                   
                

                   ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
  

    
  <?php include 'includes/payroll_modal.php'; ?>
  <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?> 

<!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

<script>
$(function(){
  $('#example1').DataTable().destroy(); 
  $('#example1').DataTable( {
    dom: "'<'row'l>Bfrtip'",
        // "pageLength": 90,
        "scrollX": true,
        "scrollY": '500px',

        buttons: [
                      {
                        extend: 'pdf',
                        title: 'Payroll Generate',
                        orientation: 'landscape', // Set the orientation to landscape
                        customize: function(doc) {
                          // Customize the PDF document if needed
                          // For example, you can set the page size, margins, etc.
                          doc.pageSize = 'legal';
                          doc.pageMargins = [40, 60, 40, 60];

                              // Specify the column index you want to skip
                              var columnIndexToSkip = 18; // Change to the index of the column you want to skip

                              // Loop through all table rows
                              for (var i = 0; i < doc.content[1].table.body.length; i++) {
                                // Remove the content of the specified column
                                doc.content[1].table.body[i].splice(columnIndexToSkip, 19);
                              }
                        },
                      },
                      {
                          extend: 'excel',
                          title: 'Payroll Generate',
                          customize: function(xlsx) {
                            // Specify the column index you want to hide (0-based index)
                            var columnIndexToHide = 18; // Change to the index of the column you want to hide
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];

                            // Loop through all rows in the sheet
                            $('row c', sheet).each(function () {
                              // Remove the content of the specified column
                              if ($(this).index() == columnIndexToHide) {
                                $(this).text('');
                              }
                            });
                          }
                        },
                                        
            'copy', 'csv', 'print'
        ]
    } );
  $('.edit').click(function(e){
    e.preventDefault();
    $('#payrolledit').modal('show');
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

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'payroll_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
            $('#posid').val(id);
            $('#edit_userpid').val(userPId);
            $('#edit_designationid').val(designationId);
            $('#edit_shiftid').val(shiftId);
            $('#edit_payid').val(payId);
            
            $('#edit_salary').val(salary);
            $('#edit_totalpay').val(totalPay);
            $('#edit_deduction').val(deduction);
            $('#edit_mdeduction').val(mDeduction);

            $('#edit_mtotalpay').val(mTotalPay);
            


    }
  });
}


</script>
<script>
$(function(){
  // Rest of your existing code
  
  $('#save').click(function(e){
    e.preventDefault();
    $('.edit-button').prop('disabled', true);
    $('#save').prop('disabled', true);
    window.location.href = 'payroll.php';
    // $('#payForm').submit();
    
  });
});
</script>

</body>
</html>
