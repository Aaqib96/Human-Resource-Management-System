<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
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
        Employee List
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Employee List</li>
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
               <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat" style='border-radius:8px;background-color:#4680ff;'><i class="fa fa-plus"></i> New</a>
            </div>
            <div class="box-body table-responsive">
              <table style="width: 100%; table-layout: fixed;" class="dt table table-bordered ">
                <thead class="">
                  <tr>
                    <!-- <th>ID</th>                  -->
                    <th>User ID</th>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>CNIC No.</th>
                    <th>Gmail</th>
                    <th>Designation</th>
                    <th>Pay</th>
                    <th>Shift</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Salary</th>
                    <th>Advance</th>
                    <th>Working Days</th>
                    <th>Status</th>
                    <th style="width: 150px;text-align:center;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    //$sql = "SELECT *, employees.id AS empid FROM employees LEFT JOIN position ON position.id=employees.position_id LEFT JOIN schedules ON schedules.id=employees.schedule_id";
                    $sql = "call `StrProc_SelectUserProfileInfo`(0)";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                                                  
                          <td><?php echo $row['RecId']; ?></td>                         
                          <td><?php echo $row['Employee_Id']; ?></td>                         
                          <td><?php echo $row['PersonName']; ?></td>                         
                          <td><?php echo $row['CNIC']; ?></td>                         
                          <td><?php echo $row['Gmail']; ?></td>                         
                          <td><?php echo $row['designation_name']; ?></td>                         
                          <td><?php echo $row['pay_name']; ?></td>                         
                          <td><?php echo $row['shift_name']; ?></td>                         
                          <td><?php echo $row['Gender']; ?></td>
                          <td><?php echo $row['address']; ?></td>
                          <td><?php echo $row['contact']; ?></td>
                          <td><?php echo $row['salary']; ?></td>
                          <td><?php echo $row['Advance']; ?></td>
                          <td><?php echo $row['workingDays']; ?></td>
                          <td>
                            <?php 
                            if($row['isactive'] != 0){ echo "<span class='badge badge-success' style='background-color:green'>Active</span>";
                           }else {echo "<span class='badge badge-danger' style='background-color:Red'>Deactive</span>";}; 
                           ?>
                           </td>
                          <td>
                          <a class=" edit " title="Edit Employee" style='border-radius:8px;color:white;cursor: pointer;' data-id="<?php echo $row['RecId']; ?>"><button style="border-radius:8px;border:none;background-color:#4680ff;"><i class="fa fa-edit"></i></button></a>
                         
                          <a class=" advance " title="Add Advance"  style='border-radius:8px;color:white;cursor: pointer;' data-id="<?php echo $row['RecId']; ?>"><button style="border-radius:8px;border:none;background-color:orange;"><i class="fa fa-money"></i></button></a> 
                          
                          <a class=" payroll " title="Generate Special Payroll" style='border-radius:8px;color:white;cursor: pointer;' data-id="<?php echo $row['RecId']; ?>"><button style="border-radius:8px;border:none;background-color:#dd4b39;"><i class="fa fa-vcard"></i></button></a>  
                          </td>
                        </tr>
                      <?php
                    }
                    // $query->free();
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
  <?php include 'includes/employee_modal.php'; ?>
   <?php  include 'includes/advance_modal.php'; ?>
   <?php  include 'includes/specpayroll_modal.php';?>
   
</div>
<?php include 'includes/scripts.php'; ?>

<script scr="JS/jquery3.7.0.js"></script>

<script src="JS/datatable1.13.6.js"></script>

<script src="JS/button2.4.1.js"></script>

<script src="JS/ajax3.10.1.js"></script>

<script src="JS/ajax0.1.53pdf.js"></script>

<script src="JS/ajax0.1.53font.js"></script>

<script src="JS/button2.4.15.js"></script>

<script>


$(function(){

  $('.dt').DataTable({
    dom: "'<'row'l>Bfrtip'",
    "scrollX": true,
    "scrollY": '500px',
    
    // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
      buttons: [
                    {
                  extend: 'pdf',
                  title: 'Employee List',
                  orientation: 'landscape', // Set the orientation to landscape
                  customize: function(doc) {
                    // Customize the PDF document if needed
                    // For example, you can set the page size, margins, etc.
                    doc.pageSize = 'legal';
                    doc.pageMargins = [40, 60, 40, 60];

                          // Specify the column index you want to skip
                           var columnIndexToSkip = 15; // Change to the index of the column you want to skip

                          // Loop through all table rows
                          for (var i = 0; i < doc.content[1].table.body.length; i++) {
                            // Remove the content of the specified column
                            doc.content[1].table.body[i].splice(columnIndexToSkip, 16);
                          }

                  }
                },
                {
                          extend: 'excel',
                          title: 'Employee List',
                          customize: function(xlsx) {
                            // Specify the column index you want to hide (0-based index)
                            var columnIndexToHide = 15; // Change to the index of the column you want to hide
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
    });

  
    $(document).on('click','.edit', function(e){
      //e.preventDefault();
      $('#edit').modal('show');
      var id = $(this).data('id');
      getRow(id);
      //$(".Sex option[data-current|='Female']").attr('selected', 'selected');
      let tempGender = ($(this).closest('tr').find('td:eq(8)').text());
      let tempDes = ($(this).closest('tr').find('td:eq(5)').text());
      let tempSalaryType = ($(this).closest('tr').find('td:eq(6)').text());
      let tempShift = ($(this).closest('tr').find('td:eq(7)').text());
      let workingDays = ($(this).closest('tr').find('td:eq(13)').text());
      $(".Sex option:selected").removeAttr("selected");
      $(".DesID option:selected").removeAttr("selected");
      $(".PayId option:selected").removeAttr("selected");
      $(".ShiftID option:selected").removeAttr("selected");
      $(".workingDays option:selected").removeAttr("selected");
      setTimeout(function() { 
        $(`.Sex option[data-current|='${tempGender}']`).attr('selected', 'selected');
        $(`.DesID option[data-current|='${tempDes}']`).attr('selected', 'selected');
        $(`.PayId option[data-current|='${tempSalaryType}']`).attr('selected', 'selected');
        $(`.ShiftID option[data-current|='${tempShift}']`).attr('selected', 'selected');
        $(`.workingDays option[data-current|='${workingDays}']`).attr('selected', 'selected');
      }, 100); 
    })
  // $('.edit').click(function(e){
  //   e.preventDefault();
    
  // });
 
  $(document).on('click','.advance', function(e){
    e.preventDefault();
    let empID = $(this).data('id');
    $.ajax({
      type: 'POST',
      url: 'getPayableAmount.php',
      data: {id:empID},
      dataType: 'json',
      success: function(response){
        $('.UpId').val(empID);
        $('#UpId').val(response.UpId);
        $('#PayableAmount').val(response);
        $('#advance').modal('show');
      }
    });
    $.ajax({
      type: 'POST',
      url: 'getAdvanceData.php',
      data: { id: empID }, // Pass the employee ID
      dataType: 'json',
      success: function (data) 
      {
        var tbody = $('#employeeTable tbody');
        tbody.empty(); // Clear existing data
            
        if (data.length > 0) {
          $.each(data, function (index, row) {
            var newRow = '<tr>';
            newRow += '<td>' + row.firstname + '</td>';
            newRow += '<td>' + row.Amount + '</td>';
            newRow += '<td>' + row.AmountDate + '</td>';
            newRow += '</tr>';
            tbody.append(newRow);
          });
        } else {
          tbody.append('<tr><td colspan="4">No data found</td></tr>');
        }

        // Show the modal after populating the table
        $('#advance').modal('show');
      },
      error: function () {
        console.error('Error fetching data');
      }
    });
  })
  
  $(document).on('click','.payroll', function(e){
    e.preventDefault();
    let empID = $(this).data('id');
    $('#payroll').modal('show');
    $.ajax({
    type: 'POST',
    url: 'getSpecialPayrollEmpDetails.php',
    data: {id:empID},
    dataType: 'json',
    success: function(response){
      //debugger
      $('.posid').val(empID);
      $('#edit_Employee_Name').val(response.Employee_Name);
      $('#edit_designation_name').val(response.designation_name);
      $('#edit_shift_name').val(response.shift_name);
      $('#edit_pay_name').val(response.pay_name);
      $('#edit_time_in').val(response.time_in);
      $('#edit_time_out').val(response.time_out);
      $('#edit_payroll_type').val(response.payroll_type);
      $('#edit_salary').val(response.salary);
      $('#edit_deducted_days').val(response.deducted_days);
      $('#edit_late').val(response.late);
      $('#edit_absent').val(response.absent);
      $('#edit_Advance').val(response.Advance);
      $('#edit_M_Advance').val(response.M_Advance);
      $('#edit_Deduction').val(response.Deduction);
      $('#edit_M_Deducted').val(response.M_Deducted);
      $('#edit_M_Salary').val(response.M_Salary);
      $('#edit_Total_Pay').val(response.Total_Pay);
    }
  });
  })


  $('.addnew').click(function(e){
    e.preventDefault();
    $('#addnew').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'employee_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#posid').val(response.id);
      $('#edit_title').val(response.description);
      $('#edit_rate').val(response.rate);
      $('#del_posid').val(response.id);
      $('#del_position').html(response.description);
    }
  });
}
</script>


</body>
</html>