<?php
include 'includes/conn.php';
// include 'includes/session.php';
?>
<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span id="employee_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="attendance_edit.php">
            		<input type="hidden" id="attid" name="id">
               
				<div class="form-group">
                    <label for="edit_EmpId" class="col-sm-3 control-label">ID</label>
                    <div class="col-sm-9"> 
                      <div class="bootstrap">
                        <input type="text" class="form-control" id="edit_EmpId" name="EmpId" readonly>
                      </div>
                    </div>
                </div>

				<div class="form-group">
                    <label for="edit_check_in" class="col-sm-3 control-label">Check In</label>
                    <div class="col-sm-9"> 
                      <div class="bootstrap">
                        <input type="text" class="form-control" id="edit_check_in" name="check_in">
                      </div>
                    </div>
                </div>
				
                <div class="form-group">
                  	<label for="edit_check_out" class="col-sm-3 control-label">Check Out</label>
                  	<div class="col-sm-9">
                  		<div class="bootstrap">
                    		<input type="text" class="form-control" id="edit_check_out" name="check_out">
                    	</div>
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

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        // Edit button click event
        $('.edit').click(function() {
            var id = $(this).data('id');
            var EmpId = $(this).closest('tr').find('td:eq(0)').text(); // Extract title from table
            var check_in = $(this).closest('tr').find('td:eq(4)').text(); // Extract title from table
            var check_out = $(this).closest('tr').find('td:eq(6)').text(); // Extract title from table
            $('#attid').val(id);
            $('#edit_EmpId').val(EmpId);
            $('#edit_check_in').val(check_in);
            $('#edit_check_out').val(check_out);
            $('#edit').modal('show');
        });
    });
</script>