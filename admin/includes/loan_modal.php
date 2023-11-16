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
            	<form class="form-horizontal" method="POST" action="loan_edit.php">
            		<input type="hidden" id="posid" name="id">
                    <div class="form-group">
                    <label for="id" class="col-sm-3 control-label">ID</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="id" name="id" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_amount" class="col-sm-3 control-label">Amount</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="edit_amount" name="edit_amount">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="edit_pay_per_month" class="col-sm-3 control-label">Pay(Per Month)</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="edit_pay_per_month" name="edit_pay_per_month">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_loan_type" class="col-sm-3 control-label">Loan Type</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_loan_type" name="edit_loan_type">
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
            	<form class="form-horizontal" method="POST" action="loan_delete.php">
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
          // Edit button click event
          $('.edit').click(function() {
            var id = $(this).data('id');
            var id = $(this).closest('tr').find('td:eq(0)').text();
            var amount = $(this).closest('tr').find('td:eq(2)').text(); 
            var pay_per_month = $(this).closest('tr').find('td:eq(4)').text(); 
            var loan_type = $(this).closest('tr').find('td:eq(5)').text(); 
            $('#posid').val(id);
            $('#id').val(id);
            $('#edit_amount').val(amount);
            $('#edit_pay_per_month').val(pay_per_month);
            $('#edit_loan_type').val(loan_type);
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
</script>