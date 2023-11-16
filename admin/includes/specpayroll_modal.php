<div class="modal fade" id="payroll">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Genrate Payroll</b></h4>
          	</div>
              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          	<div class="modal-body">
            	<form class="form-horizontal payrollFormSubmit" method="POST" action="payroll_edit.php">
                                <input type="hidden" class="posid" name="id">
                            <div class="form-group">
                                <label for="edit_RecId" class="col-sm-3 control-label">User Id</label>

                                <div class="col-sm-9">
                                <!-- <input type="text" class="form-control" id="edit_RecId" name="RecId" disabled> -->
                                <input type="text" class="form-control posid" id="posid" name="RecId" value="<?php echo $RecId; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_Employee_Name" class="col-sm-3 control-label">Employee Name</label>

                                <div class="col-sm-9">
                                <!-- <input type="text" class="form-control" id="edit_Employee_Name" name="Employee_Name" disabled> -->
                                <input type="text" class="form-control" id="edit_Employee_Name" name="Employee_Name" value="<?php echo isset($Employee_Name) ? $Employee_Name : 'Data Not Found'; ?>" disabled>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_designation_name" class="col-sm-3 control-label">Designation Name</label>

                                <div class="col-sm-9">
                                <!-- <input type="text" class="form-control" id="edit_designation_name" name="designation_name" disabled> -->
                                <input type="text" class="form-control" id="edit_designation_name" name="designation_name" value="<?php echo isset( $designation_name) ? $designation_name : 'Data Not Found' ; ?>" disabled>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_shift_name" class="col-sm-3 control-label">Shift Name</label>

                                <div class="col-sm-9">
                                <!-- <input type="text" class="form-control" id="edit_shift_name" name="shift_name" disabled> -->
                                <input type="text" class="form-control" id="edit_shift_name" name="shift_name" value="<?php echo isset($shift_name) ? $shift_name : 'Data Not Found'; ?>" disabled>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_pay_name" class="col-sm-3 control-label">Pay Name</label>

                                <div class="col-sm-9">
                                <!-- <input type="text" class="form-control" id="edit_pay_name" name="pay_name" disabled> -->
                                <input type="text" class="form-control" id="edit_pay_name" name="pay_name" value="<?php echo isset($pay_name) ? $pay_name : 'Data Not Found'; ?>" disabled>
                                
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label for="edit_time_in" class="col-sm-3 control-label">Time In</label>

                                <div class="col-sm-9">
                                <!-- <input type="text" class="form-control" id="edit_time_in" name="time_in" disabled> -->
                                <input type="text" class="form-control" id="edit_time_in" name="time_in" value="<?php echo isset($time_in) ? $time_in : 'Data Not Found'; ?>" disabled>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_time_out" class="col-sm-3 control-label">Time Out</label>

                                <div class="col-sm-9">
                                <!-- <input type="text" class="form-control" id="edit_time_out" name="time_out" disabled> -->
                                <input type="text" class="form-control" id="edit_time_out" name="time_out" value="<?php echo isset($time_out) ? $time_out : 'Data Not Found'; ?>" disabled>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_payroll_type" class="col-sm-3 control-label">Payroll Type</label>

                                <div class="col-sm-9">
                                <!-- <input type="text" class="form-control" id="edit_time_out" name="time_out" disabled> -->
                                <input type="text" class="form-control" id="edit_payroll_type" name="payroll_type" value="<?php echo isset($payroll_type) ? $payroll_type : 'Data Not Found'; ?>" disabled>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_salary" class="col-sm-3 control-label">Salary</label>

                                <div class="col-sm-9">
                                <!-- <input type="text" class="form-control" id="edit_salary" name="salary" disabled> -->
                                <input type="text" class="form-control" id="edit_salary" name="salary" value="<?php echo isset($salary) ? $salary : 'Data Not Found'; ?>" disabled>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_deducted_days" class="col-sm-3 control-label">Deducted Days</label>

                                <div class="col-sm-9">
                                <!-- <input type="text" class="form-control" id="edit_deducted_days" name="deducted_days" disabled> -->
                                <input type="text" class="form-control" id="edit_deducted_days" name="deducted_days" value="<?php echo isset($deducted_days) ? $deducted_days : 'Data Not Found'; ?>" disabled>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_late" class="col-sm-3 control-label">Late</label>

                                <div class="col-sm-9">
                                <!-- <input type="text" class="form-control" id="edit_late" name="late" disabled> -->
                                <input type="text" class="form-control" id="edit_late" name="late" value="<?php echo isset($late) ? $late : 'Data Not Found'; ?>" disabled>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_absent" class="col-sm-3 control-label">Absent</label>

                                <div class="col-sm-9">
                                <!-- <input type="text" class="form-control" id="edit_absent" name="absent" disabled> -->
                                <input type="text" class="form-control" id="edit_absent" name="absent" value="<?php echo isset($absent) ? $absent : 'Data Not Found'; ?>" disabled>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_Deduction" class="col-sm-3 control-label">Deduction</label>
                                
                                <div class="col-sm-9">
                                    <!-- <input type="text" class="form-control" id="edit_Deduction" name="Deduction" disabled> -->
                                    <input type="text" class="form-control" id="edit_Deduction" name="Deduction" value="<?php echo isset($Deduction) ? $Deduction : 'Data Not Found'; ?>" disabled>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_M_Deducted" class="col-sm-3 control-label">Modify Deduction</label>
                                
                                <div class="col-sm-9">
                                    <!-- <input type="text" class="form-control" id="edit_M_Deducted" name="M_Deducted"> -->
                                    <input type="text" class="form-control" id="edit_M_Deducted" name="M_Deducted" value="<?php echo isset($M_Deducted) ? $M_Deducted : 'Data Not Found'; ?>">
                                    <input type="hidden" class="form-control" id="prv_M_Deducted" name="prv_M_Deducted" value="<?php echo isset($M_Deducted) ? $M_Deducted : 'Data Not Found'; ?>">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_Advance" class="col-sm-3 control-label">Advance</label>

                                <div class="col-sm-9">
                                <!-- <input type="text" class="form-control" id="edit_Advance" name="Advance"> -->
                                <input type="text" class="form-control" id="edit_Advance" name="Advance" value="<?php echo isset($Advance) ? $Advance : 'Data Not Found'; ?>" disabled>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_M_Advance" class="col-sm-3 control-label">Modify Advance</label>

                                <div class="col-sm-9">
                                <!-- <input type="text" class="form-control" id="edit_Advance" name="Advance"> -->
                                <input type="text" class="form-control" id="edit_M_Advance" name="M_Advance" value="<?php echo isset($M_Advance) ? $M_Advance : 'Data Not Found'; ?>">
                                <input type="hidden" class="form-control" id="prv_M_Advance" name="prv_M_Advance" value="<?php echo isset($M_Advance) ? $M_Advance : 'Data Not Found'; ?>">

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_M_Salary" class="col-sm-3 control-label">Modify Salary</label>

                                <div class="col-sm-9">
                                <!-- <input type="text" class="form-control" id="edit_M_Salary" name="M_Salary" readonly> -->
                                <input type="text" class="form-control" id="edit_M_Salary" name="M_Salary" value="<?php echo isset($M_Salary) ? $M_Salary : 'Data Not Found'; ?>" readonly>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_Total_Pay" class="col-sm-3 control-label">Total Pay</label>

                                <div class="col-sm-9">
                                <!-- <input type="text" class="form-control" id="edit_Total_Pay" name="Total_Pay" disabled> -->
                                <input type="text" class="form-control" id="edit_Total_Pay" name="Total_Pay" value="<?php echo isset($Total_Pay) ? $Total_Pay : 'Data Not Found'; ?>" disabled>

                                </div>
                            </div>

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
                                            <button type="submit" class="payrollFormSubmit-btn btn btn-success btn-flat" name="edit" ><i class="fa fa-check-square-o"></i> Generate Payroll</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
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
    })
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