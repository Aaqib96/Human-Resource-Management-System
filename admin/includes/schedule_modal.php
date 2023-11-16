<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Schedule</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="schedule_add.php">
					<div class="form-group">
						<label for="shift_name" class="col-sm-3 control-label">Shift Name</label>

						<div class="col-sm-9">
						<div class="bootstrap-timepicker">
							<input type="text" class="form-control " id="shift_name" name="shift_name" required placeholder="Enter Shift Name">
						</div>
						</div>
					</div>
          		 	<div class="form-group">
						<label for="time_in" class="col-sm-3 control-label">Time In</label>

						<div class="col-sm-9">
						<div class="bootstrap-timepicker">
							<input type="text" class="form-control timepicker" id="time_in" name="time_in" required value="null">
						</div>
						</div>
               		</div>
					<div class="form-group">
						<label for="time_out" class="col-sm-3 control-label">Time Out</label>

						<div class="col-sm-9">
						<div class="bootstrap-timepicker">
							<input type="text" class="form-control timepicker" id="time_out" name="time_out" required value="null">
						</div>
						</div>
					</div>
					<div class="form-group">
						<label for="grace_time" class="col-sm-3 control-label">Grace Time</label>

						<div class="col-sm-9">
						<div class="bootstrap-timepicker">
							<input type="text" class="form-control " id="grace_time" name="grace_time" required placeholder="Enter Grace Time">
						</div>
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
            	<h4 class="modal-title"><b>Update Schedule</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="schedule_edit.php">
            		<input type="hidden" id="timeid" name="id">
						<div class="form-group">
							<label for="edit_shift_name" class="col-sm-3 control-label">Shift Name</label>

							<div class="col-sm-9">
							<div class="bootstrap-timepicker">
								<input type="text" class="form-control " id="edit_shift_name" name="edit_shift_name">
							</div>
							</div>
						</div>
						<div class="form-group">
							<label for="edit_time_in" class="col-sm-3 control-label">Time In</label>

							<div class="col-sm-9">
							<div class="bootstrap-timepicker">
								<input type="text" class="form-control timepicker" id="edit_time_in" name="edit_time_in">
							</div>
							</div>
						</div>
						<div class="form-group">
							<label for="edit_time_out" class="col-sm-3 control-label">Time out</label>

							<div class="col-sm-9">
							<div class="bootstrap-timepicker">
								<input type="text" class="form-control timepicker" id="edit_time_out" name="edit_time_out">
							</div>
							</div>
						</div>
						<div class="form-group">
							<label for="edit_grace_time" class="col-sm-3 control-label">Grace Time</label>

							<div class="col-sm-9">
							<div class="bootstrap-timepicker">
								<input type="text" class="form-control" id="edit_grace_time" name="edit_grace_time">
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
            	<form class="form-horizontal" method="POST" action="schedule_delete.php">
            		<input type="hidden" id="del_timeid" name="id">
            		<div class="text-center">
	                	<p>DELETE SCHEDULE</p>
	                	<h2 id="del_schedule" class="bold"></h2>
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
        $('.edit').click(function() {
            var id = $(this).data('id');
            var shiftName = $(this).closest('tr').find('td:eq(1)').text();
            var timeIn = $(this).closest('tr').find('td:eq(2)').text();
            var timeOut = $(this).closest('tr').find('td:eq(3)').text();
            var graceTime = $(this).closest('tr').find('td:eq(4)').text();
            $('#timeid').val(id);
            $('#edit_shift_name').val(shiftName);
            $('#edit_time_in').val(timeIn);
            $('#edit_time_out').val(timeOut);
            $('#edit_grace_time').val(graceTime);
            $('#edit').modal('show');
        });

        // Delete button click event
        $('.delete').click(function() {
            var id = $(this).data('id');
            var scheduleTitle = $(this).closest('tr').find('td:eq(1)').text();
            $('#del_timeid').val(id);
            $('#del_schedule').text(scheduleTitle);
            $('#delete').modal('show');
        });
    });
</script>




     