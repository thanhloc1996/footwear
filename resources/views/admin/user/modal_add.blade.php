<form id="addForm">
{{ csrf_field() }}
<div class="modal fade" id="add-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-solid box-primary">
                   <div class="box-header" style="cursor: pointer; text-align: center;" data-toggle="tooltip">
                    <h3 class="box-title">ADD USER</h3>
                    </div>
                <div class="box-content">
                    <div class="row mt-10">
                        <div class="col-sm-12">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label">First Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="first_name" class="form-control" style="width: 200px;" placeholder="Type First Name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label">Last Name</label>
                                    <div class="col-sm-9">
                                       <input type="text" name="last_name" class="form-control" style="width: 200px;" placeholder="Type Last Name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-sm-12">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label">Username</label>
                                    <div class="col-sm-9">
                                         <input type="text" name="username" class="form-control" style="width: 200px;" placeholder="Type Username">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="email" class="form-control" style="width: 200px;" placeholder="Type Email">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="row mt-10">
                        <div class="col-sm-12">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="address" class="form-control" style="width: 200px;" placeholder="Type Address">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label">Phone</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="phone" class="form-control" style="width: 200px;" placeholder="Type Phone">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="row mt-10">
                        <div class="col-sm-12">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" class="form-control" style="width: 200px;" placeholder="Type Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label">Password Confirm</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password_confirmation" class="form-control" style="width: 200px;" placeholder="Type Password Again">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>


            <div class="row mt-10">
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label">Gender</label>
                                <div class="col-sm-9">
                                    <select name="gender" class="form-control select2" style="width: 200px;">
                                        <option selected="" value="">Select Gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label">Thumbnail</label>
                            <div class="col-sm-9">
                             <input type="file" name="image" class="form-control file-upload" style="width: 200px;" id="avatarfile">
                             <img id="avatar" src="#" class="avatar img-thumbnail" alt="thumnail" style="max-width: 200px; margin-top: 2px;">
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
                   <button type="submit" class="btn btn-success">Submit</button>
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