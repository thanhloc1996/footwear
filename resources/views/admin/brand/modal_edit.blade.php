<form id="editForm">
{{ csrf_field() }}
<div class="modal fade" id="edit-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-solid box-primary">
                   <div class="box-header" style="cursor: pointer; text-align: center;" data-toggle="tooltip">
                    <h3 class="box-title" id="headerEdit">EDIT BRAND</h3>
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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label">Image</label>
                                   <div class="col-sm-9">
                                       <input type="file" name="image" class="form-control file-upload" style="width: 200px;" id="avatarfile">
                                       <img id="avatarEdit" src="#" class="avatar img-thumbnail" alt="thumnail" style="max-width: 200px; margin-top: 2px;">
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
                    <input type="hidden" name="brand_id">
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