@extends('layouts.admin')
@section('title', 'CMS Pages')  
@section('pagespecificstyles')  
@stop
  @section('content')
   <div class="content-wrapper">
    <section class="content-header">
      <h1>
        CMS Pages
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">CMS Pages</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
            {{ $errors->first('email') }}
        </div>       
    @endif
    @foreach($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
              {{ $error }}
          </div>
    @endforeach
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Profile</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="settings">
                <form class="form-horizontal" method="post" autocomplete="off" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">{{ __('Page Name') }}</label>
                    <div class="col-sm-10">
                      <input id="title" type="text" class="form-control" name="title" placeholder="Page Name" value="">
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">{{ __('Banner Title') }}</label>
                    <div class="col-sm-10">
                      <input id="banner_title" type="text" class="form-control" name="banner_title" placeholder="Page slug" value="">
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">{{ __('Page slug') }}</label>
                    <div class="col-sm-10">
                      <input id="url" type="text" class="form-control" name="url" placeholder="Page slug" value="">
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">{{ __('Page short Description') }}</label>
                    <div class="col-sm-10">
                      <textarea id="short_description" name="short_description" class="form-control" rows="10" cols="80">
                        Short Description
                    </textarea>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">{{ __('Page Description') }}</label>
                    <div class="col-sm-10">
                      <textarea name="description" id="description" class="ckeditor" 
                ></textarea>
                    </div>
                  </div>
                  
                  
                  
                  <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">{{ __('Image') }}</label>
                    <div class="col-sm-10">
                     <input id="image" type="file" class="form-control" name="image">
                     
                  @error('image')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror

                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-success">{{ __('submit') }}</button>
                          <button type="reset" class="btn  btn-warning">{{ __('Reset') }}</button>
                          <a href="{{route('admin.dashboard')}}" class="btn btn-primary">Back</a>
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
        $("#password").focus(function() {
            $('.msg').css('display','block');
        }).blur(function() {
            $('.msg').css('display','none');
        }); 
    }); 
    $(".btn-refresh").click(function(){
      $.ajax({
         type:'GET',
         url:'refresh_captcha',
         success:function(data){
            $(".captcha span").html(data.captcha);
         }
      });
    });


</script>
@stop

 

