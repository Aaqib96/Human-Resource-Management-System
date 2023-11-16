<div class="modal fade" id="advance">
  <div class="modal-dialog">
      <div class="modal-content">
           <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title"><b>Advance</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="advance_add.php" id="advanceForm" enctype="multipart/form-data">
                        
                    <div class="form-group">

                    <div class="col-sm-4 hidden">
                        <label for="UpId" class="col-sm-10 control-label">ID</label>
                        <input type="text" class="form-control UpId" id="UpId" name="UpId" value="<?php echo $UpId ?>">
                        </div>

                        <div class="col-sm-4">
                        <label for="PayableAmount" class="col-sm-10 control-label">Payable Amount</label>
                        <input type="text" class="form-control" id="PayableAmount" disabled>
                        </div>

                        <div class="col-sm-4">
                        <label for="Amount" class="col-sm-10 control-label">Advance Amount</label>
                        <input type="number" class="form-control" id="Amount" name="Amount" placeholder="Enter Amount Here" required>
                        <span id="Amounterror" style="color: red;"></span>
                        </div>
                        
                        <div class="col-sm-4">
                            
                            <label for="AmoutDate" class="col-sm-9 control-label">Amount Date</label>
                            <input type="date" class="form-control" id="AmountDate" name="AmountDate" required>
                            <span id="AmountDateerror" style="color: red;"></span>                           
                        </div>
                        <div class="col-sm-2 pull-right">
                            <button class="btn btn-success btn-sm advance btn-flat" value="submit" name="addadvance" id="addadvance" type="submit"  style='border-radius:8px;margin-top:27px;'><i class="fa fa-edit"></i> Add</button>
                        </div>
                    </div>
                 
                </form>
              
                <table class="table AdvanceData" id="employeeTable">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Advance Amount</th>
                            <th>Advance Amount Date</th>
                        </tr>
                    </thead>
                    <tbody id="employeeTable tbody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    $(document).ready(function () {
    $('#addadvance').click(function (event) {
        event.preventDefault(); // Prevent the default form submission behavior
        $('#advanceForm').submit(); // Assuming the form has an id of "advanceForm"
    });
});

</script> -->
<script>
    $(document).ready(function () {
    $('#addadvance').click(function (event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Perform required field validation
        if ($('#Amount').val() === '' ) {
            // Show an error message or handle validation failure
            // alert('Please fill in all required fields.');
            // return; // Stop form submission if validation fails

            document.getElementById("Amounterror").innerHTML = " Please Fill This Field " ;
                return false;
        }
        else{
            document.getElementById("Amounterror").innerHTML = "" ;
        }
        if ( $('#AmountDate').val() === '') {
            // Show an error message or handle validation failure
            // alert('Please fill in all required fields.');
            // return; // Stop form submission if validation fails

            document.getElementById("AmountDateerror").innerHTML = " Please Fill This Field " ;
                return false;
        }

        $('#advanceForm').submit(); // Assuming the form has an id of "advanceForm"
    });
});

</script>