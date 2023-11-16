<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Holiday</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="holiday_add.php">
          		  	<div class="form-group">
                  		<label for="Title" class="col-sm-3 control-label">Title</label>

                  		<div class="col-sm-9">
                    		<input type="text" class="form-control" id="add_Title" name="Title" required>
                  		</div>
                    </div>
                <div class="form-group">
                    <label for="Holiday_Date" class="col-sm-3 control-label">Holiday Date</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="add_Holiday_Date" name="Holiday_Date"  placeholder="Enter Holiday" required>
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
            	<h4 class="modal-title"><b>Update Holiday</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="holiday_edit.php">
            		<input type="hidden" id="posid" name="id">
                    <div class="form-group">
                    <label for="RecId" class="col-sm-3 control-label">ID</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="RecId" name="RecId" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Title" class="col-sm-3 control-label">Title</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="Title" name="Title">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="Holiday_Date" class="col-sm-3 control-label">Holiday Date</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="Holiday_Date" name="Holiday_Date">
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="edit_rate" class="col-sm-3 control-label">Rate per Hr</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_rate" name="rate">
                    </div>
                </div> -->
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
            	<form class="form-horizontal" method="POST" action="holiday_delete.php">
            		<input type="hidden" id="del_postid" name="id">
            		
                    <div class="text-center">
	                	<p>DELETE HoliDay</p>
	                	<h2 id="del_Title" name="RecId" class="bold"></h2>
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
          // Add button click event
        $('.addnew').click(function() {

            $('#posid').val(id);
            $('#add_Title').val(Title);
            $('#add_Holiday_Date').val(Holiday_Date);
            $('#add').modal('show');
        });

        // Edit button click event
        $('.edit').click(function() {
            var id = $(this).data('id');
            var RecId = $(this).closest('tr').find('td:eq(0)').text(); // Extract title from table
            var Title = $(this).closest('tr').find('td:eq(1)').text(); // Extract title from table
            var Holiday_Date = $(this).closest('tr').find('td:eq(2)').text(); // Extract title from table
            $('#posid').val(id);
            $('#RecId').val(RecId);
            $('#Title').val(Title);
            $('#Holiday_Date').val(Holiday_Date);
            $('#edit').modal('show');
        });

        // Delete button click event
		$('.delete').click(function() 
        {
            var id = $(this).data('id');
            var Title = $(this).closest('tr').find('td:eq(1)').text(); // Extract payscale title from table
            $('#del_postid').val(id);
            $('#del_Title').text(Title);
            $('#delete').modal('show');
        });

    });
</script>