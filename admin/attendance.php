<?php include 'includes/conn.php'; ?>
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<!-- <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet"/> -->
<!-- <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css"> -->
<link rel="stylesheet" href="style/datatable1.13.6.css">
<link rel="stylesheet" href="style/datatable2.4.1.css">
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Attendance
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Attendance</li>
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
              <!-- <a href="#edit" data-toggle="modal" class="btn btn-primary btn-sm btn-flat" style="border-radius:8px;background-color:#4680ff;"><i class="fa fa-plus"></i> New</a> -->
              <!-- <button class="btn btn-primary btn-sm btn-flat btn-success glyphicon glyphicon-print" style="border-radius:8px;"> Print</button> -->
            </div>
            <div class="box-body table-responsive">
              <table style="width: 100%; table-layout: fixed;" id="attendanceTable" class="table table-bordered table-responsive">
                <thead>
                  <th class="hidden">Record ID</th>
                  <th>Employee ID</th>
                  <th>Person Name</th>
                  <th>Shift Name</th>
                  <th>Check In</th>
                  <th>Date</th>
                  <th>Check Out</th>
                  <!-- <th>Earlier Departure</th> -->
                  <th>Late Coming</th>
                  <th>Over Time</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                   // $sql = "SELECT *, employees.employee_id AS empid, attendance.id AS attid FROM attendance LEFT JOIN employees ON employees.id=attendance.employee_id ORDER BY attendance.date DESC, attendance.time_in DESC";
                   $sql = "call `StrProc_SelectAttendanceInfo`"; 
                   $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                       //$status = ($row['status'])?'<span class="label label-warning pull-right">ontime</span>':'<span class="label label-danger pull-right">late</span>';
                      echo "
                        <tr>
                          <td class='hidden'>".$row['RecId']."</td>
                          <td>".$row['Employee_Id']."</td>
                          <td>".$row['PersonName']."</td>
                          <td>".$row['Shift_Name']."</td>
                          <td>".$row['Check_In']."</td>
                          <td>".$row['Check_In_Date']."</td>
                          <td>".$row['Check_Out']."</td>
                          <td>".$row['Late_Coming']."</td>
                          <td>".$row['Over_Time']."</td>
                          <td>".$row['Status']."</td>
                          <td>
                            <button class='btn btn-success btn-sm btn-flat edit' style='border-radius:8px;' data-id=''><i class='fa fa-edit'></i> Edit</button>  
                          </td>
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
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/attendance_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>

<!-- <script src="https://cdn.datatables.net/plug-ins/1.13.6/filtering/row-based/range_dates.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script> -->
<script scr="JS/jquery3.7.0.js"></script>

<script src="JS/datatable1.13.6.js"></script>

<script src="JS/button2.4.1.js"></script>

<script src="JS/ajax3.10.1.js"></script>

<script src="JS/ajax0.1.53pdf.js"></script>

<script src="JS/ajax0.1.53font.js"></script>

<script src="JS/button2.4.15.js"></script>

<script>
$(function(){
   table = $("#attendanceTable").DataTable( {
    dom: "'<'row'l>Bfrtip'",
        "scrollX": true,
        "scrollY": '500px',

        // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],

        buttons: [
                    {
                  extend: 'pdf',
                  title: 'Attendance',
                  orientation: 'landscape', // Set the orientation to landscape
                  customize: function(doc) {
                    // Customize the PDF document if needed
                    // For example, you can set the page size, margins, etc.
                    doc.pageSize = 'a4';
                    doc.pageMargins = [40, 60, 40, 60];

                             // Specify the column index you want to skip
                              var columnIndexToSkip = 10; // Change to the index of the column you want to skip

                            // Loop through all table rows
                            for (var i = 0; i < doc.content[1].table.body.length; i++) {
                              // Remove the content of the specified column
                              doc.content[1].table.body[i].splice(columnIndexToSkip, 11);
                            }
                  }
                },
                {
                          extend: 'excel',
                          title: 'Attendance',
                          customize: function(xlsx) {
                            // Specify the column index you want to hide (0-based index)
                            var columnIndexToHide = 10; // Change to the index of the column you want to hide
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
      table.reload();
    //Data Table Reload On Date Range Filter
    // $(function(){
    //   table.reload();
    // });

  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  // $('.delete').click(function(e){
  //   e.preventDefault();
  //   $('#delete').modal('show');
  //   var id = $(this).data('id');
  //   getRow(id);
  // });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'attendance_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#datepicker_edit').val(response.edit);
      $('#attendance_date').html(response.date);
      $('#edit_time_in').val(response.time_in);
      $('#edit_time_out').val(response.time_out);
      $('#attid').val(response.attid);
      $('#employee_name').html(response.firstname+' '+response.lastname);
      $('#del_attid').val(response.attid);
      $('#del_employee_name').html(response.firstname+' '+response.lastname);
    }
  });
}
</script>
<script>
$(function(){

    // Add a custom date range filter input
    $('<div class="date-range-filter">From: <input type="date" id="start_date" /><br>To: <input type="date" id="end_date" /></div>')
    .appendTo($("#attendanceTable_filter"));


 // Add a change event listener to the start_date and end_date inputs
 $("#start_date, #end_date").on("change", function () {
    var start_date = $("#start_date").val();
    var end_date = $("#end_date").val();

    // Use DataTable's API to apply the filter
    table.draw();
  });

  // Extend DataTable's search functionality to filter based on date range
  $.fn.dataTable.ext.search.push(
    function (settings, data, dataIndex) {
      var start_date = $("#start_date").val();
      var end_date = $("#end_date").val();
      var currentDate = data[5]; // Assuming the date column is the 6th column (index 5)

      if ((start_date === "" && end_date === "") ||
          (start_date === "" && currentDate <= end_date) ||
          (start_date <= currentDate && end_date === "") ||
          (start_date <= currentDate && currentDate <= end_date)) {
        return true;
      }
      return false;
    }
  );
});
</script>
</body>
</html>