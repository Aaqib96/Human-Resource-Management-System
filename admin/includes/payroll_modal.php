<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Pay Scale</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="payscale_add.php">
          		  	<div class="form-group">
                  		<label for="title" class="col-sm-3 control-label">Payscale Title</label>

                  		<div class="col-sm-9">
                    		<input type="text" class="form-control" id="title" name="title" required>
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
<div class="modal fade" id="payrolledit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Genrate Payroll</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal payrollFormSubmit" method="POST" action="payroll_edit.php">
                                <input type="hidden" id="posid" name="id">
                            <div class="form-group">
                                <label for="edit_RecId" class="col-sm-3 control-label">User Id</label>

                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="edit_RecId" name="RecId" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_Employee_Name" class="col-sm-3 control-label">Employee Name</label>

                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="edit_Employee_Name" name="Employee_Name" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_designation_name" class="col-sm-3 control-label">Designation Name</label>

                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="edit_designation_name" name="designation_name" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_shift_name" class="col-sm-3 control-label">Shift Name</label>

                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="edit_shift_name" name="shift_name" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_pay_name" class="col-sm-3 control-label">Pay Name</label>

                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="edit_pay_name" name="pay_name" disabled>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="edit_time_in" class="col-sm-3 control-label">Time In</label>
                                
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="edit_time_in" name="time_in" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_time_out" class="col-sm-3 control-label">Time Out</label>

                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="edit_time_out" name="time_out" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_payroll_type" class="col-sm-3 control-label">Payroll Type</label>

                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="edit_payroll_type" name="payroll_type" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_salary" class="col-sm-3 control-label">Salary</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="edit_salary" name="salary" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_deducted_days" class="col-sm-3 control-label">Deducted Days</label>

                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="edit_deducted_days" name="deducted_days" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="edit_late" class="col-sm-3 control-label">Late</label>

                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="edit_late" name="late" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit_absent" class="col-sm-3 control-label">Absent</label>
                            
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="edit_absent" name="absent" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit_Deduction" class="col-sm-3 control-label">Deduction</label>
                            
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="edit_Deduction" name="Deduction" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit_M_Deducted" class="col-sm-3 control-label">Modify Deduction</label>
                            
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="edit_M_Deducted" name="M_Deducted">
                                <input type="hidden" class="form-control" id="prv_M_Deducted" name="prv_M_Deducted">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit_advance" class="col-sm-3 control-label">Advance</label>

                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_advance" name="advance" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit_M_Advance" class="col-sm-3 control-label">Modify Advance</label>

                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_M_Advance" name="M_Advance">
                            <input type="hidden" class="form-control" id="prv_M_Advance" name="prv_M_Advance">
                            </div>
                        </div>
                            <div class="form-group">
                                <label for="edit_M_Salary" class="col-sm-3 control-label">Modify Salary</label>

                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="edit_M_Salary" name="M_Salary" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_Total_Pay" class="col-sm-3 control-label">Total Pay</label>

                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="edit_Total_Pay" name="Total_Pay" disabled>
                                </div>
                            </div>
                                <?php
                                // include 'conn.php';
                                //     $sql = "SELECT pr.M_Deducted FROM payroll pr WHERE pr.UserP_Id = $id ";
                                //     $query = $conn->query($sql);
                                //     while($row = $query->fetch_assoc()){
                                //         echo "
                                           
                                //         <input type='text' class='form-control' id='editrem' value='". $row['M_Deducted']."' >
                                //         ";
                                //     }                                
                                
                                ?>
                                 
                                <!-- <input type="text" class="form-control" id="editrem" name="" hidden> -->

                                                
                            <!-- <input type="submit" name="submitRemarks" value="Submit Remarks"> -->
                                    <?php
                            
                                        if ('deduction' === 'mdeduction' && 'totalpay' === 'mtotalpay') {
                                            echo '<form method="post" action="">
                                                    <textarea name="remarks" rows="4" cols="50" disabled></textarea>
                                                    <br>
                                                    
                                                </form>';
                                        } else {
                                            echo '<form method="post" action="payroll_edit.php">
                                            <div class="form-group">
                                                            <label for="label" name="label" class="col-sm-3 control-label">Remarks</label>

                                                            <div class="col-sm-9">
                                                            <textarea name="remarks" id="remarks" rows="4" cols="50" required placeholder="Enter Remarks"></textarea>
                                                            <span id="remarkserror" style="color: red;"></span>
                                                            <br>
                                                            </div>
                                                        </div>
                                                
                                                    
                                                </form>';
                                        }

                                        if (isset($_POST['submitRemarks'])) {
                                            // Yeha par aap submit button par click hone par aapke remarks ko handle kar sakte hain
                                            $submittedRemarks = $_POST['remarks'];
                                            // Yahan par aap kuch aur actions kar sakte hain, jaise ki remarks ko database mein save karna
                                        }
                                    ?>

                        </div>
                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                            <button type="submit" class="payrollFormSubmit-btn btn btn-success btn-flat" name="edit" ><i class="fa fa-check-square-o"></i> Edit Payroll</button>
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
            	<h4 class="modal-title"><b>Deleting...</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="payscale_delete.php">
            		<input type="hidden" id="del_posid" name="id">
            		<div class="text-center">
	                	<p>DELETE PAY SCALE</p>
	                	<h2 id="del_payscale" class="bold"></h2>
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
<!-- <script>
        function validateForm() {
            var remarks = document.forms["remarks"].value;
            if (remarks == "") {
                alert("Remarks must be filled out");
                return false; // Form submit nahi hoga
            }
            return true; // Form submit hoga
        }
    </script> -->

<script>
               
    $(document).ready(function() {
        // Edit button click event
        $(".payrollFormSubmit-btn").click((function(){
            var remarks = document.getElementById("remarks").value;
            var prv_madv = document.getElementById('prv_M_Advance').value;
            var madv = document.getElementById('edit_M_Advance').value;
            var prv_mdec =document.getElementById("prv_M_Deducted").value;
            var mdec =document.getElementById("edit_M_Deducted").value;
            var tp =document.getElementById("edit_Total_Pay").value;
            var mtp =document.getElementById("edit_M_Salary").value;
               
            
            if (mdec === prv_mdec && madv === prv_madv){
               
                $(".payrollFormSubmit").submit();
            }
            
            else if (remarks == "") {
                document.getElementById("remarkserror").innerHTML = " Please given Remarks..." ;
                return false; // Form submit nahi hoga
            }
            else{
                // return true; // Form submit hoga
            $(".payrollFormSubmit").submit()
            }
          
        }))
        $('.edit').click(function() {
            var id = $(this).data('id');
            var RecId = $(this).closest('tr').find('td:eq(0)').text(); // Extract UserP_Id from table
            var Employee_Name = $(this).closest('tr').find('td:eq(1)').text(); // Extract Designation_Id from table
            var designation_name = $(this).closest('tr').find('td:eq(2)').text(); // Extract Shift_Id from table
            var shift_name = $(this).closest('tr').find('td:eq(3)').text(); // Extract Pay_Id from table
            var pay_name = $(this).closest('tr').find('td:eq(4)').text(); // Extract Deduction from table
            var time_in = $(this).closest('tr').find('td:eq(5)').text(); // Extract Deduction from table
           
            var time_out = $(this).closest('tr').find('td:eq(6)').text(); // Extract salary from table
            var payroll_type = $(this).closest('tr').find('td:eq(7)').text(); // Extract salary from table
            var salary = $(this).closest('tr').find('td:eq(8)').text(); // Extract Total_Pay from table
            var deducted_days = $(this).closest('tr').find('td:eq(9)').text(); // Extract M_Deduction from table
            var late = $(this).closest('tr').find('td:eq(10)').text(); // Extract late from table
            var absent = $(this).closest('tr').find('td:eq(11)').text(); // Extract absent from table
            var advance = $(this).closest('tr').find('td:eq(14)').text(); // Extract advance from table
            var M_Advance = $(this).closest('tr').find('td:eq(15)').text(); // Extract M_Advance from table
            var Deduction = $(this).closest('tr').find('td:eq(12)').text(); // Extract Deduction from table
            var M_Deducted = $(this).closest('tr').find('td:eq(13)').text(); // Extract M_Deducted from table
            var M_Salary = $(this).closest('tr').find('td:eq(16)').text(); // Extract M_Salary from table
            var Total_Pay = $(this).closest('tr').find('td:eq(17)').text(); // Extract Total_Pay from table
            var prv_M_Deducted = $(this).closest('tr').find('td:eq(13)').text(); // Extract M_Deducted from table
            var prv_M_Advance = $(this).closest('tr').find('td:eq(15)').text(); // Extract M_Advance from table
            $('#posid').val(id);
            $('#edit_RecId').val(RecId);
            $('#edit_Employee_Name').val(Employee_Name);
            $('#edit_designation_name').val(designation_name);
            $('#edit_shift_name').val(shift_name);
            
            $('#edit_pay_name').val(pay_name);
            $('#edit_time_in').val(time_in);
            $('#edit_time_out').val(time_out);
            $('#edit_payroll_type').val(payroll_type);
            $('#edit_salary').val(salary);

            $('#edit_deducted_days').val(deducted_days);
            $('#edit_late').val(late);
            $('#edit_absent').val(absent);
            $('#edit_advance').val(advance);
            $('#edit_M_Advance').val(M_Advance);
            $('#prv_M_Advance').val(prv_M_Advance);
            $('#edit_Deduction').val(Deduction);
            $('#edit_M_Deducted').val(M_Deducted);
            $('#prv_M_Deducted').val(prv_M_Deducted);
            $('#edit_M_Salary').val(M_Salary);
            $('#edit_Total_Pay').val(Total_Pay);
            $('#edit').modal('show');
        });
    });
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var prv_AdvanceInput = document.getElementById('prv_M_Advance');
    var mAdvanceInput = document.getElementById('edit_M_Advance');
    var prv_deductionInput = document.getElementById('prv_M_Deducted');
    var mDeductionInput = document.getElementById('edit_M_Deducted');
    var totalpayinput = document.getElementById('edit_Total_Pay');
    var mtotalpayinput = document.getElementById('edit_M_Salary');
    var label = document.querySelector('label[name="label"]');
    var remarksTextarea = document.querySelector('textarea[name="remarks"]');
    
    function checkShowTextarea() {
        
        if (mDeductionInput.value === prv_deductionInput.value && mAdvanceInput.value === prv_AdvanceInput.value) {
            label.style.display = 'none';
            remarksTextarea.style.display = 'none';
        } else {
            label.style.display = 'block';
            remarksTextarea.style.display = 'block';
        }
    }
    
    // deductionInput.addEventListener('keyup', checkShowTextarea);
    mAdvanceInput.addEventListener('keyup', checkShowTextarea);
    mDeductionInput.addEventListener('keyup', checkShowTextarea);
    totalpayinput.addEventListener('keyup', checkShowTextarea);
    mtotalpayinput.addEventListener('keyup', checkShowTextarea);
    
    // Call the function initially to set the initial display state
    checkShowTextarea();
});
</script>

<!-- To calculate Total_Pay by subtracting M_Deducted from salary and updating the corresponding input field when the user enters a value for M_Deducted, you can use JavaScript. Here's a script to achieve this: -->

<!-- html -->
<!-- Copy code -->
<script>
    // Function to update M_Salary when M_Deducted or M_Advance input changes
    function updateMSalary() {
        // Get the values from the input fields
        var salary = parseFloat(document.getElementById("edit_salary").value) || 0;
        var mDeducted = parseFloat(document.getElementById("edit_M_Deducted").value) || 0;
        var mAdvance = parseFloat(document.getElementById("edit_M_Advance").value) || 0;

        // Calculate M_Salary
        var totalPay = salary - mDeducted - mAdvance;

        // Update the M_Salary input field
        document.getElementById("edit_M_Salary").value = totalPay.toFixed(2); // Assuming you want two decimal places
    }

    // Attach the updateMSalary function to the change event of M_Deducted or M_Advance input
    document.getElementById("edit_M_Deducted").addEventListener("keyup", updateMSalary);
    document.getElementById("edit_M_Advance").addEventListener("keyup", updateMSalary);
</script>





     