<div class="modal fade" id="spec-modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body" style="text-align: center;">
				<form id="editSpec">
				{{ csrf_field() }}
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col" colspan="2" style="text-align: center;"><h4 style="font-weight: bolder;">Specification</h4></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">Material</th>
							<td id="specram">
								<select class="select2" style="text-align: center;width: 100%;" name="material">
									<option value="0">N/A</option>
									<option value="1" @if($product->specification->material == 1) {{"selected"}} @endif>Leather</option>
									<option value="2"  @if($product->specification->material == 2) {{"selected"}} @endif>Canvas</option>
									<option value="3"  @if($product->specification->material == 3) {{"selected"}}  @endif>Other</option>
								</select>
							</td>
						</tr>
						<tr>
							<th scope="row">Gender</th>
							<td id="specdisplay">
								<select class="select2" style="text-align: center;width: 100%;" name="gender">
									<option value="0">N/A</option>
									<option value="1" @if($product->specification->gender == 1) {{"selected"}} @endif>Male</option>
									<option value="2"  @if($product->specification->gender == 2) {{"selected"}} @endif>Female</option>
									<option value="3"  @if($product->specification->gender == 3) {{"selected"}}  @endif>Unisex</option>
								</select>
							</td>
						</tr>
						<tr>
							<th scope="row">Trendy</th>
							<td id="specos">
								<select class="select2" style="text-align: center;width: 100%;" name="trendy">
									<option value="0">N/A</option>
									<option value="1" @if($product->specification->trendy == 1) {{"selected"}} @endif>Street Wear</option>
									<option value="2"  @if($product->specification->trendy == 2) {{"selected"}} @endif>Vintage</option>
									<option value="3"  @if($product->specification->trendy == 3) {{"selected"}}  @endif>High-end</option>
									<option value="4"  @if($product->specification->trendy == 4) {{"selected"}}  @endif>Other</option>
								</select>
							</td>
						</tr>
						<tr>
							<th scope="row">Weight</th>
							<td id="speccpu">
								<div class="input-group">
									<input class="form-control" style="text-align: center; width: 100%" type="text" name="weight" value="{{$product->specification->weight}}" placeholder="N/A">
									<span class="input-group-addon">Kg</span>
								</div>
							</td>
						</tr>						
					</tbody>
				</table>
				<button class="btn btn-success" type="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>