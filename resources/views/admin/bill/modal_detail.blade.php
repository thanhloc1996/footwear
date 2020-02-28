<div class="modal fade" id="detail-modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body" style="text-align: center;">
				<div class="box box-solid box-primary">
					<div class="box-header" style="cursor: pointer; text-align: center;" data-toggle="tooltip">
						<h3 class="box-title" id="headerBill" style="float: left;">BILL DETAIL</h3>
						<a style="float: right;" id="downloadBill"><i class="fa fa-download"></i> Download</a>
					</div>
					<form id="editForm" method="POST" action="{{route('admin.bill.update')}}">
					{{ csrf_field() }}
					<div class="box-content">
						<div class="row mt-10">
							<div class="col-lg-12">
								<div class="col-lg-6">
									<div class="form-group">
										<div class="row">
											<label class="col-sm-3 control-label">Phone</label>
											<div class="col-sm-9">
												<input type="text" name="name" class="form-control" style="width: 200px;" placeholder="Type name of product" disabled="" id="phoneInput">
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<div class="row">
											<label class="col-sm-3 control-label">Address</label>
											<div class="col-sm-9">
												<input type="text" name="name" class="form-control" style="width: 200px;" placeholder="Type name of product" disabled="" id="addressInput">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-10">
							<div class="col-lg-12">
								<div class="col-lg-6">
									<div class="form-group">
										<div class="row">
											<label class="col-sm-3 control-label">Date Delivery</label>
											<div class="col-sm-9">
												<input type="text" name="name" class="form-control" style="width: 200px;" placeholder="Type name of product" disabled="" id="dateDeliInput">
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<div class="row">
											<label class="col-sm-3 control-label">Date Receive</label>
											<div class="col-sm-9">
												<input type="text" name="name" class="form-control" style="width: 200px;" placeholder="Type name of product" disabled="" id="dateReInput">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-10">
							<div class="col-lg-12">
								<div class="col-lg-12">
									<div class="form-group">
										<div class="row">
											<label class="col-sm-12 control-label">Note</label>
											<div class="col-sm-12">
												<textarea style="width: 100%;" disabled="" id="noteInput">
													
												</textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-10">
							<div class="col-lg-12">
								<div class="form-group">
									<div class="row">
										<input type="hidden" name="status">
										<input type="hidden" name="bill_id">
										<p style="font-weight: bolder;">Status</p>
										<a class="btn btn-success statusBtn" data-status="2">Complete</a>
										<a class="btn btn-danger statusBtn" data-status="3">Cancel</a>
										<div id="error-message" style="margin-top: 5px; color: red; font-weight: bold; font-size: 13px;">
											Errors...
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					</form>
				</div>

				<div class="box box-solid box-primary">
					<div class="box-header" style="cursor: pointer; text-align: center;" data-toggle="tooltip">
						<h3 class="box-title">LIST PRODUCT</h3>
					</div>
					<div class="box-content">
						<div class="row">
							<div class="col-lg-12">
								<table class="table table-hover middle-table-text" style="margin-top: 15px;">
									<thead>
										<tr>
											<th class="text-center" style="border: 1px solid #cccccc;">No</th>
											<th class="text-center" style="border: 1px solid #cccccc;">Product (Detail)</th>
											<th class="text-center" style="border: 1px solid #cccccc;">Price</th>
											<th class="text-center" style="border: 1px solid #cccccc;">Quantity</th>
											<th class="text-center" style="border: 1px solid #cccccc;">SubTotal</th>
										</tr>
									</thead>
									<tbody id="table-product">

									</tbody>
									<tfoot>
										<tr>
											<td colspan="5"><b>Total: </b><a style="color: black;" id="totalInput"></a></td>
										</tr>
									</tfoot>
								</table>	
							</div>
						</div>			
					</div>
				</div>
			</div>
		</div>
	</div>
</div>