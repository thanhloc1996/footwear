<div class="modal fade" id="add-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body" style="text-align: center;">
                <div class="row searchbox">
                    <form id="myForm" class="form-inline" action="" method="POST">
                        {{ csrf_field() }}
                        <div class="col-xs-12">
                            <div class="box box-solid box-primary">
                                {{-- box header--}}
                                <div class="box-header" style="cursor: pointer;" data-toggle="tooltip" >
                                    <h3 class="box-title">SEND MAIL PANEL</h3>
                                </div>
                                {{-- /box header--}}
                                {{-- box body--}}
                                <div class="box-body">
                                    {{--row--}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="col-md-4 col-xs-12">To</label>
                                            <input id="toUserInput" type="text" readonly name="" style="width: 450px;">
                                            <input id="emailInput" type="hidden" name="usermail">
                                            <input id="usernameInput" type="hidden" name="username">
                                            <input id="feedbackIdInput" type="hidden" name="feedback_id">
                                        </div>

                                        <div class="col-md-12" style="margin-top: 8px;">
                                            <label class="col-md-4 col-xs-12">Content</label>
                                            <textarea name="content" placeholder="Type content" rows="10" style="width: 450px;">
                                                
                                            </textarea>
                                        </div>
                                    </div>

                                        {{--row--}}
                                        <div class="row text-center" style="margin-top: 15px;">
                                            <div class="col-xs-12">
                                                <button type="submit" class="btn btn-success">Submit</button>
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