<?php
include "includes/conn.php";
// include 'includes/session.php';
// include "./employee.php";
?>

<?php 
     $sql = "SELECT * FROM `tbl_gender` WHERE isactive=1"; 
    //  $sql = "call `StrProc_getGenderInfo`()";
     $query = $conn->query($sql);
     $query1 = $conn->query($sql);
?>

<?php
    $sql = "SELECT * FROM `designation` WHERE isactive=1";
    // $sql = "call `StrProc_getDesignationInfo`()";
    $query2 = $conn->query($sql);
    $query3 = $conn->query($sql);
?>
<?php
     $sql = "SELECT * FROM `pay_scale` WHERE isactive=1";
     // $sql = "call `StrProc_SelectDesignationInfo`(0)";
     $query4 = $conn->query($sql);
     $query5 = $conn->query($sql);
?>
<?php
    $sql = "SELECT * FROM `shift` WHERE isactive=1";
    //  $ssql="Call `StrProc_SelectShiftInfo`(0)";  
    $query6 = $conn->query($sql);
    $query7 = $conn->query($sql);
?>


<!-- Add -->
<div class="modal fade" id="addnew">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><b>Add Employee</b></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="POST" action="employee_add.php" enctype="multipart/form-data" onsubmit="return validation()">
           
            <div class="form-group">
                  <label for="EmpID" class="col-sm-3 control-label">Employee ID</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="EmpID" name="EmpID" placeholder="Enter Employee ID" required>
                    <span id="EmpIDerror" style="color: red;"></span>
                  </div>
              </div>
              <div class="form-group">
                  <label for="Fname" class="col-sm-3 control-label">First Name</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="Fname" name="Fname" placeholder="Enter First Name" required>
                    <span id="Fnameerror" style="color: red;"></span>
                  </div>
              </div>
              <div class="form-group">
                  <label for="Lname" class="col-sm-3 control-label">Last Name</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="Lname" name="Lname" placeholder="Enter Last Name">
                    <span id="Lnameerror" style="color: red;"></span>
                  </div>
              </div>
              <div class="form-group">
                  <label for="CNIC" class="col-sm-3 control-label">CNIC</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control CNIC" id="CNIC" name="CNIC" placeholder="00000-0000000-0">
                      <span id="CNICerror" style="color: red;"></span>
                  </div>
              </div>
              <div class="form-group">
                  <label for="Gmail" class="col-sm-3 control-label">Gmail</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" id="Gmail" name="Gmail" placeholder="Enter Gmail Acount" required>
                      <span id="Gmailerror" style="color: red;"></span>
                  </div>
              </div>
              <div class="form-group">
                  <label for="Home" class="col-sm-3 control-label">Address</label>

                  <div class="col-sm-9">
                    <textarea class="form-control" name="Home" id="Home" style="resize:none;" placeholder="Enter Employee Address" required></textarea>
                    <span id="Homeerror" style="color: red;"></span> 
                  </div>
              </div>
              <div class="form-group">
                  <label for="Phone" class="col-sm-3 control-label">Contact</label>

                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="Phone" name="Phone" placeholder="0000-000000-0" required>
                    <span id="Phoneerror" style="color: red;"></span>
                  </div>
              </div>
              <div class="form-group">
                  <label for="Salary" class="col-sm-3 control-label">Salary</label>

                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="Salary" name="Salary" placeholder="Enter Salary Here" required>
                    <span id="Salaryerror" style="color: red;"></span> 
                  </div>
              </div>
              <div class="form-group">
                  <label for="workingDays" class="col-sm-3 control-label">WorkingDays</label>

                  <div class="col-sm-9">
                  <select  class="form-control workingDays" name="workingDays" id="workingDays" required>
                    <option value="" selected>Select Working Days</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                  </select>
                    <!-- <input type="number" class="form-control" id="WorkingDays" name="WorkingDays" placeholder="" required> -->
                  </div>
              </div>
              <div class="form-group">
                  <label for="Gender" class="col-sm-3 control-label">Gender*</label>

                  <div class="col-sm-9"> 
                    <select class="form-control" name="Sex" id="Sex" required>
                      <option value="" selected>Select Gender</option>
                      <?php
                        while($Grow = $query->fetch_assoc()){
                          echo "
                            <option value='".$Grow['RecId']."'>".$Grow['Gender']."</option>

                          ";
                        }
                        // $query->free();
                      ?>

                    </select>
                  </div>
              </div>
              <div class="form-group">
                  <label for="designation_name" class="col-sm-3 control-label">Designation</label>

                  <div class="col-sm-9">
                    <select class="form-control" name="DesID" id="DesID" required>
                      <option value="" selected>Select Designation</option>
                      <?php
                        while($drow2 = $query2->fetch_assoc()){
                          echo "
                            <option value='".$drow2['RecId']."'>".$drow2['designation_name']."</option>
                          ";
                        } 
                        // $query->free();
                      ?>
                    </select>
                  </div>
                  
              </div>
              <div class="form-group">
                  <label for="pay_name" class="col-sm-3 control-label">Salary Type</label>

                  <div class="col-sm-9">
                    <select class="form-control" name="PayId" id="PayId" required>
                      <option value="" selected>Select Salary Type</option>
                      <?php
                        while($prow4 = $query4->fetch_assoc()){
                          echo "
                            <option value='".$prow4['RecId']."'>".$prow4['pay_name']."</option>
                          ";
                        } 
                        // $query->free();
                      ?>
                    </select>
                  </div>
                  
              </div>
              <div class="form-group">
                  <label for="shift_name" class="col-sm-3 control-label">Shift</label>

                  <div class="col-sm-9">
                    <select class="form-control" id="ShiftID" name="ShiftID" required>
                      <option value="" selected>Select Shift</option>
                      <?php
                        while($srow6 = $query6->fetch_assoc()){
                          // echo "
                          //   <option value='".$srow6['RecId']."'>".$srow6['shift_name']."</option>
                          // ";
                           echo "
                            <option value='".$srow6['RecId']."'>".$srow6['shift_name']."'>".$srow6['time_in'].' - '.$srow6['time_out'].'-'.$srow6['grace_time']."</option>
                          ";
                        }
                      ?>
                    </select>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
            </form>
          </div>
      </div>
  </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="employee_edit.php" onsubmit="return editEmployeeValidation()">
            		<input type="hidden" class="empid" name="id">
                <div class="form-group">
        <label for="UpId" class="col-sm-3 control-label">User ID</label>
        <div class="col-sm-9">
            <input type="text" class="form-control UpId" id="UpId" name="UpId" required readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="EmpID" class="col-sm-3 control-label">Employee ID</label>
        <div class="col-sm-9">
            <input type="text" class="form-control EmpID" id="EmpID" name="EmpID" required readonly>
        </div>
    </div>
                <div class="form-group">
        <label for="Fname" class="col-sm-3 control-label">First Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control Fname" id="editFname" name="Fname" required>
            <span id="upFnameerror" style="color: red;"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="Lname" class="col-sm-3 control-label">Last Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control Lname" id="editLname" name="Lname">
            <span id="upLnameerror" style="color: red;"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="CNIC" class="col-sm-3 control-label">CNIC</label>
        <div class="col-sm-9">
            <input type="text" class="form-control CNIC" id="editCNIC" name="CNIC" required>
            <span id="upCNICerror" style="color: red;"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="gmail" class="col-sm-3 control-label">Gmail</label>
        <div class="col-sm-9">
            <input type="text" class="form-control gmail" id="editGmail" name="gmail" required>
            <span id="upGmailerror" style="color: red;"></span>
        </div>
    </div>
    
    <div class="form-group">
        <label for="Home" class="col-sm-3 control-label">Address</label>
        <div class="col-sm-9">
            <textarea class="form-control Home" name="Home" id="editHome" style="resize:none;"></textarea>
            <span id="upHomeerror" style="color: red;"></span>
        </div>
    </div>
    
    <div class="form-group">
        <label for="Phone" class="col-sm-3 control-label">Contact</label>
        <div class="col-sm-9">
            <input type="text" class="form-control Phone" id="editPhone" name="Phone">
            <span id="upPhoneerror" style="color: red;"></span>
        </div>
    </div>
    
    <div class="form-group">
        <label for="Salary" class="col-sm-3 control-label">Salary</label>
        <div class="col-sm-9">
            <input type="text" class="form-control Salary" id="editSalary" name="Salary">
            <span id="upSalaryerror" style="color: red;"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="Sex" class="col-sm-3 control-label">Gender</label>
        <!-- <input type="text" class="form-control" id="Sex" name="Sex"> -->
        <div class="col-sm-9">
                    <Select class="form-control Sex" name="Sex">
                          <?php   
                          while($Grow1 = $query1->fetch_assoc()){
                            echo "
                              <option value='".$Grow1['RecId']."' data-value='".$Grow1['RecId']."' data-current='".$Grow1['Gender']."'>".$Grow1['Gender']."</option>
                            ";
                          }
                          // $query->free();  
                        ?>              
            </Select>
        </div>
    </div>
    <div class="form-group">
        <label for="designation_name" class="col-sm-3 control-label">Designation</label>
        <div class="col-sm-9">
            <select class="form-control DesID" name="DesID" required>
                <?php
                          while($drow3 = $query3->fetch_assoc()){
                            echo "
                              <option value='".$drow3['RecId']."' data-value='".$drow3['RecId']."' data-current='".$drow3['designation_name']."'>".$drow3['designation_name']."</option>
                            ";
                          } 
                          // $query->free();
                        ?>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label for="pay_name" class="col-sm-3 control-label">Salary Type</label>
        <div class="col-sm-9">
            <select class="form-control PayId" name="PayId" required>
                <?php
                          while($prow5 = $query5->fetch_assoc()){
                            echo "
                              <option value='".$prow5['RecId']."' data-value='".$prow5['RecId']."' data-current='".$prow5['pay_name']."'>".$prow5['pay_name']."</option>
                            ";
                          } 
                          // $query->free();
                        ?>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label for="shift_name" class="col-sm-3 control-label">Shift</label>
        <div class="col-sm-9">
          <select class="form-control ShiftID"  name="ShiftID" required>
                <?php
                          while($srow7 = $query7->fetch_assoc()){
                            echo "
                              <option value='".$srow7['RecId']."' data-value='".$srow7['RecId']."' data-current='".$srow7['shift_name']."'>".$srow7['shift_name']."</option>
                            ";
                             echo "
                              <option value='".$srow7['RecId']."' data-value='".$srow7['RecId']."' data-current='".$srow7['shift_name']."'>".$srow7['shift_name']."</option>
                            ";
                          }
                        ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="workingDays" class="col-sm-3 control-label">Working Days</label>
        <div class="col-sm-9">
          <select  class="form-control workingDays" name="workingDays" id="workingDays">
            <option value="5">5</option>
            <option value="6">6</option>
          </select>
            <!-- <input type="text" class="form-control" id="workingDays" name="workingDays">  -->
        </div>
    </div>
          	</div>
          	      <div class="modal-footer">
            	      <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	      <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
                	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="employee_delete.php">
            		<input type="hidden" class="empid" name="id">
            		<div class="text-center">
	                	<p>DELETE EMPLOYEE</p>
	                	<h2 class="bold del_employee_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>


<script>

    $(document).ready(function() {
        // Edit button click event
        $(".empid").click((function(){
            $(".empid #DesID").submit()
        }));

        //$(".CNIC").mask("00000-0000000-0");

        $(document).ready(function() {
          // Function to open the edit modal and populate form fields
          $(document).on('click','.edit', async function() {

            let empID = $(this).closest('tr').find('td:eq(1)').text();

            const response = await fetchEmployeeInfo(empID);
            
            if (response.length >= 1) {
              // Get data from the row or wherever it's stored
              var UpId = response[0].RecId;
              var EmpID = response[0].Employee_Id;
              var Fname = response[0].firstname;
              var Lname = response[0].lastname;
              var CNIC = response[0].CNIC;
              var Gmail = response[0].Gmail;
              var DesID = response[0].firstname;
              var PayId = response[0].pay_name;   
              var ShiftID = response[0].shift_name;
              var Sex = response[0].Gender;
              var Home = response[0].address;
              var Phone = response[0].contact;
              var Salary = response[0].salary;
              var workingDays = response[0].workingDays;
              
              $('#edit .UpId').val(UpId);
              $('#edit .EmpID').val(EmpID);
              $('#edit .Fname').val(Fname);
              $('#edit .Lname').val(Lname);
              $('#edit .CNIC').val(CNIC);
              $('#edit .gmail').val(Gmail);
              $('#edit .DesID').val(DesID);
              $('#edit .PayId').val(PayId);
              $('#edit .ShiftID').val(ShiftID);
              $('#edit .Sex').val(Sex);
              $('#edit .Home').val(Home);
              $('#edit .Phone').val(Phone);
              $('#edit .Salary').val(Salary);
              $('#edit .workingDays').val(workingDays);
              // $('#edit #RId').val(roleId);
  
              // Open the edit modal
              $('#edit').modal('show');
            }

          });

    // Handle form submission (you may need additional validation)
    $('edit').submit(function(e) {
        e.preventDefault();

        // Get form data
        var formData = $(this).serialize();

        // Send the form data to the server using AJAX or form submission

        // Close the modal when the operation is successful
        $('#edit').modal('hide');
    });
});
  });

  function fetchEmployeeInfo(empID) {
    return new Promise(function(resolve, reject) {
      $.ajax({
        type: 'POST',
        url: 'includes/getEmpInfoByUserID.php',
        data: { id: empID },
        dataType: 'json',
        success: function (response) {
          resolve(response); // Resolve the Promise with the response data
        },
        error: function (xhr, status, error) {
          reject(error); // Reject the Promise with an error if AJAX fails
        }
      });
    });
  }

</script>


<!-- ------------------------------------------------CNIC --- ------------------------------------------------------------------------- -->
<script>
    const cnicInput = document.getElementById("CNIC");

    cnicInput.addEventListener("input", function (event) {
        let value = event.target.value;
        if (this.value.length >= 13) {
          this.blur(); // Input field ko disable kar dein
    }
        
        // Remove any existing hyphens
        value = value.replace(/-/g, "");
        
       // Add hyphens after every 4, 7, and 1 characters
        value = value.replace(/(\d{5})(\d{7})(\d{1})?/g, "$1-$2-$3");

        
        // Remove any trailing hyphen
        if (value.endsWith("-")) {
            value = value.slice(0, -1);
        }

        event.target.value = value;
    });



    const phoneInput = document.getElementById("Phone");

phoneInput.addEventListener("input", function (event) {
    let value = event.target.value;
    if (this.value.length >= 11) {
      this.blur(); // Input field ko disable kar dein
}

  // Remove any existing hyphens
  value = value.replace(/-/g, "");
        
        // Add hyphens after every 4, 3, and 4 characters
        //  value = value.replace(/(\d{4})(\d{3})(\d{4})?/g, "$1-$2-$3");
 
         
         // Remove any trailing hyphen
         if (value.endsWith("-")) {
             value = value.slice(0, -1);
         }
 
         event.target.value = value;

});

</script>
<!-- ----------------------------------------------Validation for add employee----------------------------------------------------------------- -->

<script>
        function validation()
        {
            //getting values from textboxes
            var e = document.getElementById("EmpID").value ;
            var fn = document.getElementById("Fname").value ;
            // var ln = document.getElementById("Lname").value ;
            var cn = document.getElementById("CNIC").value ;
            var g = document.getElementById("Gmail").value ;
            var h = document.getElementById("Home").value ;
            var p = document.getElementById("Phone").value ;
            var s = document.getElementById("Salary").value ;
            // validate/check values are correct or not
            var EmpIDcheck = /^[0-9]{1,20}$/ ;
            var Fnamecheck = /^[a-zA-Z ]{3,}$/ ;
            // var Lnamecheck = /^[a-zA-Z ]{3,}$/ ;
            var CNICcheck = /^[0-9]{5}-[0-9]{7}-[0-9]{1}$/;
            var Gmailcheck = /^[a-zA-Z_]{3,}@[a-zA-Z]{3,}[.]{1}[a-zA-Z.]{2,6}$/ ;
            var Homecheck = /^[a-zA-Z., /0-9]{3,20}$/ ;
            var Phonecheck = /^[0-9]{11}$/;
            var Salarycheck = /^[0-9]{1,20}$/ ;
            
            if(EmpIDcheck.test(e) )
            {
                document.getElementById("EmpIDerror").innerHTML = "";
            }
            else
            {
                document.getElementById("EmpIDerror").innerHTML = " Invalid  Employee ID " ;
                return false;
            }
            if(Fnamecheck.test(fn) )
            {
                document.getElementById("Fnameerror").innerHTML = "";
            }
            else
            {
                document.getElementById("Fnameerror").innerHTML = "First Name Should Be Consist On Only Text " ;
                return false;
            }
            // if(Lnamecheck.test(ln) )
            // {
            //     document.getElementById("Lnameerror").innerHTML = "";
            // }
            // else
            // {
            //     document.getElementById("Lnameerror").innerHTML = "Last Name Should Be Consist On Only Text " ;
            //     return false;
            // }
          
            if(CNICcheck.test(cn) )
            {
                document.getElementById("CNICerror").innerHTML = "";
            }
            else
            {
                document.getElementById("CNICerror").innerHTML = " Invalid CNIC " ;
                return false;
            }
            if(Gmailcheck.test(g) )
            {
                document.getElementById("Gmailerror").innerHTML = "";
            }
            else
            {
                document.getElementById("Gmailerror").innerHTML = " Invalid Email " ;
                return false;
            }
            if(Homecheck.test(h) )
            {
                document.getElementById("Homeerror").innerHTML = "";
            }
            else
            {
                document.getElementById("Homeerror").innerHTML = " Invalid Address " ;
                return false;
            }
            if(Phonecheck.test(p) )
            {
                document.getElementById("Phoneerror").innerHTML = "";
            }
            else
            {
                document.getElementById("Phoneerror").innerHTML = " Invalid Phone Number " ;
                return false;
            }
            if(Salarycheck.test(s) )
            {
                document.getElementById("Salaryerror").innerHTML = "";
            }
            else
            {
                document.getElementById("Salaryerror").innerHTML = " Please Write Correct Value " ;
                return false;
            }
           
      

        }
</script>






<!-- ----------------------------------------------Validation for edit employee----------------------------------------------------------------- -->

<script>
        function editEmployeeValidation()
        {
            //getting values from textboxes
            
            var upfn = document.getElementById("editFname").value ;
            // var upln = document.getElementById("editLname").value ;
            var upcn = document.getElementById("editCNIC").value ;
            var upg = document.getElementById("editGmail").value ;
            var uph = document.getElementById("editHome").value ;
            var upp = document.getElementById("editPhone").value ;
            var ups = document.getElementById("editSalary").value ;
            // validate/check values are correct or not
            
            var upFnamecheck = /^[a-zA-Z ]{3,}$/ ;
            // var upLnamecheck = /^[a-zA-Z ]{3,}$/ ;
            var upCNICcheck = /^[0-9]{5}-[0-9]{7}-[0-9]{1}$/;
            var upGmailcheck = /^[a-zA-Z_]{3,}@[a-zA-Z]{3,}[.]{1}[a-zA-Z.]{2,6}$/ ;
            var upHomecheck = /^[a-zA-Z., /0-9]{3,20}$/ ;
            var upPhonecheck = /^[0-9]{11}$/;
            var upSalarycheck = /^[0-9]{1,20}$/ ;
            
           
            if(upFnamecheck.test(upfn) )
            {
                document.getElementById("upFnameerror").innerHTML = "";
            }
            else
            {
                document.getElementById("upFnameerror").innerHTML = " It Contain Only Text " ;
                return false;
            }
            // if(upLnamecheck.test(upln) )
            // {
            //     document.getElementById("upLnameerror").innerHTML = "";
            // }
            // else
            // {
            //     document.getElementById("upLnameerror").innerHTML = " It Contain Only Text " ;
            //     return false;
            // }
          
            if(upCNICcheck.test(upcn) )
            {
                document.getElementById("upCNICerror").innerHTML = "";
            }
            else
            {
                document.getElementById("upCNICerror").innerHTML = " Invalid CNIC " ;
                return false;
            }
            if(upGmailcheck.test(upg) )
            {
                document.getElementById("upGmailerror").innerHTML = "";
            }
            else
            {
                document.getElementById("upGmailerror").innerHTML = " Invalid Email " ;
                return false;
            }
            if(upHomecheck.test(uph) )
            {
                document.getElementById("upHomeerror").innerHTML = "";
            }
            else
            {
                document.getElementById("upHomeerror").innerHTML = " Invalid Address " ;
                return false;
            }
            if(upPhonecheck.test(upp) )
            {
                document.getElementById("upPhoneerror").innerHTML = "";
            }
            else
            {
                document.getElementById("upPhoneerror").innerHTML = " Invalid Phone Number " ;
                return false;
            }
            if(upSalarycheck.test(ups) )
            {
                document.getElementById("upSalaryerror").innerHTML = "";
            }
            else
            {
                document.getElementById("upSalaryerror").innerHTML = " It Contain Only Number " ;
                return false;
            }
           
     
        }
    </script>



<!-- ------------------------------------------------CNIC for edit --- ------------------------------------------------------------------------- -->
<script>
    const ecnicInput = document.getElementById("editCNIC");

    ecnicInput.addEventListener("input", function (event) {
        let value = event.target.value;
        if (this.value.length >= 13) {
          this.blur(); // Input field ko disable kar dein
    }
        
        // Remove any existing hyphens
        value = value.replace(/-/g, "");
        
       // Add hyphens after every 4, 7, and 1 characters
        value = value.replace(/(\d{5})(\d{7})(\d{1})?/g, "$1-$2-$3");

        
        // Remove any trailing hyphen
        if (value.endsWith("-")) {
            value = value.slice(0, -1);
        }

        event.target.value = value;
    });



    const ephoneInput = document.getElementById("editPhone");

ephoneInput.addEventListener("input", function (event) {
    let value = event.target.value;
    if (this.value.length >= 11) {
      this.blur(); // Input field ko disable kar dein
}
});

</script>