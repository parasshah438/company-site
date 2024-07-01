@extends('layouts.admin')
@section('title', 'Manage services')  
@section('pagespecificstyles')  
@stop
  @section('content')
   <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Manage services
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage services</li>
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
                    <label for="name" class="col-sm-2 control-label">{{ __('Service category') }}</label>
                    <div class="col-sm-10">
                      <select name="category_id" class="form-control" id="category_id">
                        <option value="">Service Category</option>
                        @foreach($category as $sval)
                          <option value="{{$sval->id}}">{{$sval->title}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">{{ __('Page short Description') }}</label>
                    <div class="col-sm-10">
                      <textarea id="short_description" class="form-control" name="short_description" rows="10" cols="80">
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
                    <label for="image" class="col-sm-2 control-label">{{ __('Development Title') }}</label>
                    <div class="col-sm-10">
                     <input id="title1" type="text" class="form-control" name="title1" maxlength="100">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">{{ __('Development Description') }}</label>
                    <div class="col-sm-10">
                      <textarea name="description1" id="description1" class="ckeditor">
                      
                    </textarea>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">{{ __('Why Choose Title') }}</label>
                    <div class="col-sm-10">
                     <input id="title2" type="text" class="form-control" name="title2" maxlength="100">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">{{ __('Why Choose Description') }}</label>
                    <div class="col-sm-10">
                      <textarea name="description2" id="description2" class="ckeditor">
                
                      </textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Services</label>
                    <div class="col-sm-10">
                      <div class="photo_item">
                    <div class="row photo_for_count">
                      <div class="col-md-1">
                        <span class="btn btn-success add_photo_more"><i class="fa fa-plus"></i></span>
                      </div>
                    </div>
                  </div>
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


<div class="d_n" style="display:none;">
  <div id="add_photo">
    <div class="delete_photo">
      <div class="row photo_for_count">
        <div class="col-md-12">
          <div class="form-group">
            <input type="file" name="services_image[]">
          </div>
          <div class="form-group">
                  <input type="text" name="services_title[]" placeholder="Title" class="form-control">
                </div>
                  <div class="form-group">
                  <input type="number" name="services_description[]" placeholder="Description" class="form-control">
                </div>
        </div>
        <div class="col-md-1">
          <span class="btn btn-danger remove_photo_more"><i class="fa fa-minus"></i></span>
        </div>
      </div>
    </div>
  </div>
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

$(document).on("click",".add_photo_more",function() {
    var add_photo = $("#add_photo").html();
      $(this).closest(".photo_item").append(add_photo);
});
$(document).on("click",".remove_photo_more",function(event){
  $(this).closest(".delete_photo").remove();
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

 

