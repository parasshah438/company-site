@extends('admin.includes.layouts')
@section('title', 'Import')  
@section('pagespecificstyles')  

@stop
  <!-- Content Wrapper. Contains page content -->
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Import
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Import</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">      
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <div class="tab-content">
               
              <div id="settings">
                <form class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
                   @csrf
                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">{{ __('File') }}</label>

                    <div class="col-sm-10">

                      <input type="file" name="file" class="form-control" id="file" placeholder="Title">
                        @error('file')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                       <button type="submit" class="btn btn-primary">
                                    {{ __('submit') }}
                                </button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  @endsection
  <!-- /.content-wrapper -->
  
@section('pagespecificscripts')
<script>
    $(document).ready(function(){
        $('#password').focus(function(){
            $('.msg').show();
        });
        $('#password').keyup(function(){
            $('.msg').css('display','none');
        });
    });  
</script>
@stop

 

