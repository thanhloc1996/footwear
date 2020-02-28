<form id="addForm">
{{ csrf_field() }}
<div class="modal fade" id="add-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-solid box-primary">
                    <div class="box-header" style="cursor: pointer; text-align: center;" data-toggle="tooltip">
                        <h3 class="box-title">ADD PRODUCT DETAIL TO {{$product->name}}</h3>
                    </div>

                <div class="box-content">
                    <div class="row mt-10">
                        <div class="col-sm-12">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" style="width: 200px;" placeholder="Type name of product detail">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label">Price($)</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="price" class="form-control" style="width: 200px;" placeholder="Type price of product detail" id="inputprice" value="1">
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
                                    <label class="col-sm-3 control-label">Quantity</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="quantity" class="form-control" style="width: 200px;" placeholder="Type quantity of product detail" value="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="row">
                                    <label class="col-sm-3 control-label">Size</label>
                                    <div class="col-sm-9">
                                         <select name="size" class="form-control select2" style="width: 200px;">
                                        <option selected="" value="">Select Size</option>
                                        @for($i = 36; $i<=45; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
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
                                    <label class="col-sm-3 control-label">Color</label>
                                    <div class="col-sm-9">
                                         <select name="color" class="form-control select2" style="width: 200px;">
                                        <option selected="" value="">Select Color</option>
                                        @foreach($listColor as $color)
                                        <option value="{{$color->id}}">{{$color->name}}</option>
                                        @endforeach
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
                    </div>

                    <div class="row" style="margin-top:10px;">
                        <div class="col-sm-12" style="text-align: center;">
                        <div class="form-group">
                            <div class="row">
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
</form>