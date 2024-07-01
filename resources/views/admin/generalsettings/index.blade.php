@extends('layouts.admin')
@section('title', 'General setting')  
  @section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
       @yield('title')
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">General setting</li>
      </ol>
    </section>
    <section class="content">
      @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
            {{ $errors->first('email') }}
        </div>       
    @endif
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

      <div class="box box-default">


      <form method="post" id="add_product" autocomplete="off" enctype="multipart/form-data">
      @csrf 
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">

            <div class="col-md-12">
              
              <div class="form-group col-md-6">
                <label>App Name</label>
                <input name="site_title" id="site_title" placeholder="App Name" class="form-control" value="{{$data->site_title}}">
                <div>{{ $errors->first('site_title') }}</div>
              </div>

              <div class="form-group col-md-6">
                <label>Address</label>
                <input name="site_address" id="site_address" placeholder="Address" class="form-control" value="{{$data->site_address}}"> 
                <div>{{ $errors->first('site_address') }}</div>
              </div>

              <div class="form-group col-md-6">
                <label>Email</label>
                <input type="text" name="site_email" id="site_email" placeholder="Email" class="form-control" value="{{$data->site_email}}">
                <div> {{ $errors->first('site_email') }}</div>
              </div>
            
              <div class="form-group col-md-6">
                <label>Contact</label>
                <input type="text" name="site_conatct" id="site_conatct" placeholder="Contact" class="form-control" value="{{$data->site_conatct}}">
                <div> {{ $errors->first('site_conatct') }}</div>
              </div>

              <div class="form-group col-md-6">
                <label>Short Description</label>
                <input name="site_about_us" id="site_about_us" placeholder="About us" class="form-control" value="{{old('site_about_us')}}">
                <div>{{ $errors->first('site_about_us') }}</div>
              </div> 

              <div class="form-group col-md-6">
                <label>Copyright</label>
                <input type="text" name="site_copyright" id="site_copyright" placeholder="Copyright" class="form-control" value="{{$data->site_copyright}}">
                <div> {{ $errors->first('site_copyright') }}</div>
              </div>
            </div>
            <div class="col-md-12">
              <!-- /.form-group -->
              <div class="form-group col-md-6">
                <label>Fb Url</label>
                <input type="text" name="site_fb_url" id="site_fb_url" placeholder="Fb" class="form-control" value="{{$data->site_fb_url}}">
                <div> {{ $errors->first('site_fb_url') }}</div>
              </div>
              
              <div class="form-group col-md-6">
                <label>Instagram Url</label>
                <input type="text" name="site_instagram_url" id="site_instagram_url" placeholder="Instagram Url" class="form-control" value="{{$data->site_instagram_url}}">
                <div> {{ $errors->first('site_instagram_url') }}</div>
              </div>

              <div class="form-group col-md-6">
                <label>Youtube Url</label>
                <input type="text" name="site_youtube_url" id="site_youtube_url" placeholder="Youtube" class="form-control" value="{{$data->site_youtube_url}}">
                <div> {{ $errors->first('site_youtube_url') }}</div>
              </div>

              <div class="form-group col-md-6">
                <label>Skype Url</label>
                <input type="text" name="site_skype_url" id="site_skype_url" placeholder="Youtube" class="form-control" value="{{$data->site_skype_url}}">
                <div> {{ $errors->first('site_skype_url') }}</div>
              </div>

              <div class="form-group col-md-6">
                <label>Linkedin Url</label>
                <input type="text" name="site_linkedin_url" id="site_linkedin_url" placeholder="Youtube" class="form-control" value="{{$data->site_linkedin_url}}">
                <div> {{ $errors->first('site_linkedin_url') }}</div>
              </div>


              <div class="form-group col-md-6">
                <label>Home Title</label>
                <input type="text" name="home_title" id="home_title" placeholder="Home Title" class="form-control" value="{{$data->home_title}}">
                <div> {{ $errors->first('home_title') }}</div>
              </div>

              <div class="form-group col-md-6">
                <label>Home Description</label>
                <input type="text" name="home_description" id="home_description" placeholder="Home Description" class="form-control" value="{{$data->home_description}}">
                <div> {{ $errors->first('home_description') }}</div>
              </div>

              <div class="form-group col-md-6">
                <label>Home Banner</label>
                <input type="file" name="home_banner" id="home_banner" placeholder="Home Banner" class="form-control">
                <div> {{ $errors->first('home_banner') }}</div>

                <img src="{{asset('public/front_assets/img')}}/{{$data->home_banner}}" class="img-fluid" width="80px;" alt="{{$data->home_banner}}" title="Technology">
              </div>

            
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <button id="btnadd" type="submit" class="btn btn-primary">Sunmit</button>
        </div>
      <!-- </form> -->
        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@endsection

  <script type="text/javascript">
  </script>
 

