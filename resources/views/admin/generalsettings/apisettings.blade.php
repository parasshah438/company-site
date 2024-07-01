@extends('admin.includes.layouts')
@section('title', 'Currency Converter setting')  
  <!-- Content Wrapper. Contains page content -->
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       @yield('title')
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Currency Converter setting</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">

     <!--  <div id='app'>   -->
      <form method="post" id="add_product" autocomplete="off" enctype="multipart/form-data">
      @csrf 
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">

           

            <div class="col-md-12">
              <div class="form-group col-md-6">
                <label>Charges (fee)</label>
                <input type="number" name="charges_amount" id="charges_amount" placeholder="Charges" class="form-control" value="{{$data['charges_amount']}}">
                <div> {{ $errors->first('charges_amount') }}</div>
              </div>
              <!-- /.form-group -->
              <div class="form-group col-md-6">
                <label>Charges text</label>
                <input type="text" name="charges_text" id="charges_text" placeholder="text" class="form-control" value="{{$data['charges_text']}}">
                <div> {{ $errors->first('charges_text') }}</div>
              </div>
              <!-- /.form-group -->
            </div>

             <div class="col-md-12">
              <div class="form-group col-md-6">
                <label>User save text</label>
                <input type="text" name="user_save_text" id="user_save_text"  class="form-control" value="{{$data['user_save_text']}}">
                <div> {{ $errors->first('user_save_text') }}</div>
              </div>
              <!-- /.form-group -->
              <div class="form-group col-md-6">
                <label>Use save amount text</label>
                <input type="text" name="user_save_amount" id="user_save_amount"  class="form-control" value="{{$data['user_save_amount']}}">
                <div> {{ $errors->first('user_save_amount') }}</div>
              </div>
              <!-- /.form-group -->
            </div>

             <div class="col-md-12">
              <div class="form-group col-md-6">
                <label>Arrive text</label>
                <input type="text" name="arrive_text" id="arrive_text"  class="form-control" value="{{$data['arrive_text']}}">
                <div> {{ $errors->first('arrive_text') }}</div>
              </div>
              <!-- /.form-group -->
              <div class="form-group col-md-6">
                <label>Charges time</label>
                <input type="text" name="arrive_date" id="arrive_date" class="form-control" value="{{$data['arrive_date']}}">
                <div> {{ $errors->first('arrive_date') }}</div>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->

           
            <!-- /.col -->
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


 

