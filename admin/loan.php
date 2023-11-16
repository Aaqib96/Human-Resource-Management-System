<?php
 include "includes/session.php"; 
?>
<?php
 include "includes/header.php"; 
 ?>
<!-- ___________Body Work start -->
<body class="hold-transition skin-blue sidebar-mini">
   <div class="wrapper">

   <?php 
   include "includes/navbar.php"; 
   ?>
   <?php include "includes/menubar.php"; ?>

   <!-- _________Content wrapper.Contains page Content start  -->
   <div class="content-wrapper">
    <!-- ________Content Header Page start -->
    <section class="content-header">
    <h1>
        Loan
    </h1>
    <ol class="breadcrumb">
    <li><a href="home.php"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active">Loan</li>
    </ol>
    </section>
    <!-- ________Content Header Page End -->

    <!-- ____________________________________ -->

    <!-- ________Main Content Start -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <!-- <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat" style='border-radius:8px;background-color:#4680ff;'><i class="fa fa-plus"></i>Add New Loan</a> -->
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="POST"  enctype="multipart/form-data">
                <div class="form-group">
                <div class="col-sm-2">
                <label for="employee_name" class="col-sm-9 control-label">Employee</label>
             <input type="text" class="form-control" id="employee_name" name="employee_name"  placeholder="Enter Employee" required>
                <!-- <select  class="form-control workingDays" name="workingDays" id="workingDays" required>
                <option value="" selected>Select Employee</option>
                <option value="5">5</option>
                <option value="6">6</option>
                </select> -->
            </div>
            <div class="col-sm-2">
            <label for="amount" class="col-sm-9 control-label">Amount</label>
             <input type="number" class="form-control" id="amount" name="amount"  placeholder="Enter Amount" required>
                    
            </div>
            <div class="col-sm-2">
            <label for="pay_per_month" class="col-sm-11 control-label">Pay(Per Month)</label>
            <input type="number" class="form-control" id="pay_per_month" name="pay_per_month"  placeholder="Enter Pay(Per Month)" required>

                <!-- <select  class="form-control workingDays" name="workingDays" id="workingDays" required>
                <option value="" selected>Pay(Per Month)</option>
                <option value="5">5</option>
                <option value="6">6</option>
                </select> -->
            </div>
            <div class="col-sm-2">
            <label for="loan_type" class="col-sm-9 control-label">Loan Type</label>
            <input type="text" class="form-control" id="loan_type" name="loan_type"  placeholder="Enter Loan Type" required>
                <!-- <select  class="form-control workingDays" name="workingDays" id="workingDays" required>
                <option value="" selected>Total duce</option>
                <option value="5">5</option>
                <option value="6">6</option>
                </select> -->
            </div>
            <div class="col-sm-2">
            <label for="due_date" class="col-sm-9 control-label">Due Date</label>
            <input type="date" class="form-control" id="due_date" name="due_date"  placeholder="Enter Due Date" required>
                <!-- <select  class="form-control workingDays" name="workingDays" id="workingDays" required>
                <option value="" selected>Loan Type</option>
                <option value="5">5</option>
                <option value="6">6</option>
                </select> -->
            </div>
            <div class="col-sm-2 pull-right">
                <button class="btn btn-success btn-sm loan btn-flat" value="submit" name="addloan" id="addloan" type="submit"  style='border-radius:8px;margin-top:30px;'><i class="fa fa-edit"></i> Add Loan</button>
            </div>
                </div>
                </form>
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>ID</th>
                  <th>Employee Name	</th>
                  <th>Amount</th>
                  <th>Time(Yr)</th>
                  <th>Pay(Per Month)</th>
                  <th>Loan Type</th>
                  <th>Due Date</th>
                  <th>Action</th>
                </thead>
                <tbody>
                 <?php 
                 $sql ="SELECT `id`, `employee_name`, `amount`, `time_Yr`, `pay_per_month`, `loan_type`, `due_date`, `isactive`, `created_on`, `updated_on`, `created_by`, `updated_by` FROM `loan` WHERE 1 ";
                 $query = $conn ->query($sql);
                 while($row = $query -> fetch_assoc()){
                  echo "
                  <tr>
                  <td>".$row['id']."</td>
                  <td>".$row['employee_name']."</td>
                  <td>".$row['amount']."</td>
                  <td>".$row['time_Yr']."</td>
                  <td>".$row['pay_per_month']."</td>
                  <td>".$row['loan_type']."</td>
                  <td>".$row['due_date']."</td>

                  <td>
                  <button class='btn btn-success btn-sm edit btn-flat' style='border-radius:8px;' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                  <button class='btn btn-danger btn-sm delete btn-flat' style='border-radius:8px;' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
                  </td>
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
    <!-- ________Main Content End -->
</div>
   <!-- _________Content wrapper.Contains page Content End  -->
   <?php include 'includes/loan_modal.php'; ?>
   <?php include 'includes/footer.php'; ?>
   </div>
<?php include 'includes/scripts.php'; ?>

<?php 
// if ($_SERVER["submit"] == "POST") {
//   // Retrieve form data
//   $employee_name = $_POST["employee_name"];
//   $amount = $_POST["amount"];
//   $pay_per_month = $_POST["pay(per_month)"];
//   $loan_type = $_POST["loan_type"];
//   $due_date = $_POST["due_date"];

//   // Optional: Sanitize and validate data

//   // Construct the SQL query
//   $sql = "INSERT INTO `loan`(`id`, `employee_name`, `amount`, `pay(per_month)`, `loan_type`, `due_date`) VALUES ('$id','$employee_name','$amount','$pay(per_month)','$loan_type','$due_date')";

//   // Execute the query
//   if (mysqli_query($conn, $sql)) {
//       echo "Record added successfully.";
//   } else {
//       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//   }

//   // Close the connection
//   mysqli_close($conn);
// }
?>

<!-- __________________________________________________________ -->

<?php
if(isset($_POST['addloan'])){
  $employee_name = $_POST['employee_name'];
  $amount = $_POST['amount'];
  $pay_per_month = $_POST['pay_per_month'];
  $loan_type = $_POST['loan_type'];
  $due_date = $_POST['due_date'];
  // $sql = "INSERT INTO schedules (time_in, time_out) VALUES ('$time_in', '$time_out')";
      $sql = "INSERT INTO `loan`(`employee_name`, `amount`, `pay_per_month`, `loan_type`, `due_date`) VALUES ('$employee_name','$amount','$pay_per_month','$loan_type','$due_date')";  
  if($conn->query($sql)){
    $_SESSION['success'] = 'Schedule added successfully';
  }
  else{
    $_SESSION['error'] = $conn->error;
  }
}	
else{
  $_SESSION['error'] = 'Fill up add form first';
}
?>


</body>
<!-- ___________Body Work start -->
