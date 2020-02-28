<form id="editForm">
{{ csrf_field() }}
<div class="modal fade" id="edit-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-solid box-primary">
                   <div class="box-header" style="cursor: pointer; text-align: center;" data-toggle="tooltip">
                    <h3 class="box-title" id="headerEdit">Edit Product</h3>
                    </div>
                <div class="box-content">
                    <div class="row mt-10">
                        <div class="col-sm-12">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" style="width: 200px;" placeholder="Type name of category">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6" id="parentEdit">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label">Category Level 1</label>
                                    <div class="col-sm-9">
                                        <select name="parent" class="form-control select2" style="width: 200px;">
                                            <option value="">Category Level 1</option>
                                            @foreach($listCategoryParent as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                 
       <div class="row" style="margin-top:10px;">
        <div class="col-sm-12" style="text-align: center;">
            <div class="form-group">
                <div class="row">
                    <input type="hidden" name="category_id">
                   <button type="submit" class="btn btn-success" id="save">Submit</button>
               </div>
           </div>
       </div>
   </div> 
</div>
</div>
</div>
</div>
</div>
</div>
</form>