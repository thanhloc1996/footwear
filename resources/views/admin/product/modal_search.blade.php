<div class="modal fade" id="search-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body" style="text-align: center;">
                <div class="row searchbox">
                    <form id="myForm" class="form-inline" action="#" method="GET">
                        <div class="col-xs-12">
                            <div class="box box-solid box-primary">
                                {{-- box header--}}
                                <div class="box-header" style="cursor: pointer;" data-toggle="tooltip" >
                                    <h3 class="box-title">SEARCH PANEL</h3>
                                </div>
                                {{-- /box header--}}
                                {{-- box body--}}
                                <div class="box-body">
                                    {{--row--}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="col-md-4 col-xs-12">Brand</label>
                                            <select class="col-md-8 col-xs-12 form-control select2" style="width: 450px;" name="brand[]" id="math" multiple="multiple">
                                                @foreach($listBrand as $brand)
                                                <option value="{{$brand->id}}"
                                                    {{ isset($_GET['brand'])&& in_array($brand->id,$_GET['brand']) ? 'selected' : '' }}>{{$brand->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12" style="margin-top: 8px;">
                                                <label class="col-md-4 col-xs-12">Category</label>
                                                <select class="col-md-8 col-xs-12 form-control select2" style="width: 450px;" name="categories[]" multiple="multiple">
                                                    @foreach($listCategory as $category)
                                                    <option value="{{$category->id}}" {{ isset($_GET['categories'])&& in_array($category->id,$_GET['categories']) ? 'selected' : '' }}>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12" style="margin-top: 8px;">
                                                <label class="col-md-4 col-xs-12">Status</label>
                                                <select class="col-md-8 col-xs-12 form-control select2" style="width: 450px;" name="status[]" multiple="multiple">
                                                    <option value="1" {{ isset($_GET['status'])&& in_array('1', $_GET['status']) ? 'selected' : '' }}>Now</option>
                                                    <option value="2" {{ isset($_GET['status'])&& in_array('2', $_GET['status']) ? 'selected' : '' }}>End Of Life</option>
                                                    <option value="3" {{ isset($_GET['status'])&& in_array('3', $_GET['status']) ? 'selected' : '' }}>Soon</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12" style="margin-top: 8px;">
                                                <label class="col-xs-4">Name</label>
                                                <div class="col-xs-8" id="containerTen">
                                                    <input class="form-control" style="width: 450px;" placeholder="Type name of product..." name="name" id="tenspsearch" value="{{ isset($_GET['name']) ? $_GET['name'] : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <input id="inputsort" type="hidden" name="sort" value="">
                                        <input id="inputperpage" type="hidden" name="per_page" value="">
                                        <div class="row" style="margin-top: 35px;">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-7">
                                                <div class="row"></div>
                                                <label class="col-md-2">Price Range</label>
                                                <div class="col-md-10" id="keypress">
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <input class="col-md-2" type="number" name="min_price" id="input-with-keypress-0">
                                                    <input class="col-md-2 col-md-offset-5" type="number" name="max_price" id="input-with-keypress-1">
                                                </div>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>
                                        {{--row--}}
                                        <div class="row text-center" style="margin-top: 15px;">
                                            <div class="col-xs-12">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                                <a href="{{route('admin.product.list')}}" class="btn btn-danger" id="defaultvalue" href="">Reset</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>