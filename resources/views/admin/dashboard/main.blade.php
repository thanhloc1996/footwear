@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

          <div class="row">
            <div class="col-lg-12">
              <div class="col-lg-4">
                @include('admin.dashboard.product')
              </div>
              <div class="col-lg-4">
                @include('admin.dashboard.product2')
              </div>
              <div class="col-lg-4">
                @include('admin.dashboard.user')
              </div>
              <div class="col-lg-12">
                @include('admin.dashboard.order')
              </div>
            </div>
        </div>
        <!-- Main content -->
        
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @endsection
