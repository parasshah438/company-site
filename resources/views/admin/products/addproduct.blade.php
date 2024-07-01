@extends('layouts.admin')
@section('title', 'Add Product')  
@section('pagespecificstyles')  

@stop
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
        <li><a href="#">Examples</a></li>
        <li class="active">Add Product</li>
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
               <div class="form-group col-md-12">
                <label>Category</label>
                <select class="form-control custom-select" id="category" name="category" data-msg="Please select Category." data-error-class="u-has-error" data-success-class="u-has-success" aria-invalid="true" aria-describedby="Category" required>
                    <option value="">Select Category</option>
                    @foreach($categoryList as $list)   
                    <option value="{{ $list->id }}" >{{ $list->name }}
                    </option>
                    @endforeach   
                </select>    
              </div>
            </div>

            <div class="col-md-12">
             <div class="form-group col-md-12"> 
                 <label>State</label>
                  <select id="subcategory" name="subcategory" class="form-control">
                    <option value=""> Choose Subcategory</option>
                      
                  </select>
                <div> {{ $errors->first('subcategory') }}</div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group col-md-6">
                <label>Product Name</label>
                <input type="text" name="name" id="name" placeholder="Enter Product Name" class="form-control" value="{{old('name')}}">
                <div>{{ $errors->first('name') }}</div>
              </div>
              <!-- /.form-group -->
                <div class="form-group col-md-6">
                <label>SKU</label>
                <input type="text" name="sku" id="sku" placeholder="Enter sku" class="form-control" value="{{ old('sku') }}">
                <div> {{ $errors->first('sku') }}</div>
              </div>
                          
              <!-- /.form-group -->
            </div>


            <!-- /.col -->
            <div class="col-md-12">
               <div class="form-group col-md-6">
                <label>Description</label>
                <textarea name="description" id="description" placeholder="Enter description" class="form-control"> {{old('description')}}
                </textarea>
                <div>{{ $errors->first('description') }}</div>
              </div> 
              <!-- /.form-group -->
              <div class="form-group col-md-6">
                <label>URL Key</label>
                <input type="text" name="url_key" id="url_key" placeholder="Enter URL Key" class="form-control" value="{{ old('url_key') }}">
                <div> {{ $errors->first('url_key') }}</div>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->

             <div class="col-md-12">
              <div class="form-group col-md-6">
                <label>Price</label>
                <input type="text" name="price" id="price" placeholder="Enter price" class="form-control" value="{{ old('price') }}">
                <div> {{ $errors->first('price') }}</div>
              </div>
              <!-- /.form-group -->
              <div class="form-group col-md-6">
                <label>Cost</label>
                <input type="text" name="cost" id="cost" placeholder="Enter cost" class="form-control" value="{{ old('cost') }}">
                <div> {{ $errors->first('cost') }}</div>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->

             <div class="col-md-12">
              <div class="form-group col-md-6">
                <label>Special Price</label>
                <input type="text" name="specialprice" id="specialprice" placeholder="Enter Special price" class="form-control" value="{{ old('specialprice') }}">
                <div> {{ $errors->first('specialprice') }}</div>
              </div>
             
              <div class="form-group col-md-6">
                <label>Qty</label>
                <input type="number" name="qty" id="qty" placeholder="Enter Quantity" class="form-control" value="{{ old('qty') }}">
                <div> {{ $errors->first('qty') }}</div>
              </div>
        
            </div>
            <!-- /.col -->

          <!--    <div class="col-md-12">
              <div class="form-group col-md-6">
                <label>Color</label>
                <input type="text" name="color" id="color" placeholder="Enter color" class="form-control" value="{{ old('color') }}">
                <div> {{ $errors->first('color') }}</div>
              </div>
              
              <div class="form-group col-md-6">
                <label>Color Label</label>
                <input type="text" name="colorlabel" id="colorlabel" placeholder="Enter colorlabel" class="form-control" value="{{ old('colorlabel') }}">
                <div> {{ $errors->first('colorlabel') }}</div>
              </div>              
            </div> -->
             <!-- /.col -->


            <!--  <div class="col-md-12">
              <div class="form-group col-md-6">
                <label>Size</label>
                <input type="text" name="size" id="size" placeholder="Enter size" class="form-control" value="{{ old('size') }}">
                <div> {{ $errors->first('size') }}</div>
              </div>
              
              <div class="form-group col-md-6">
                <label>Size Label</label>
                <input type="text" name="sizelabel" id="sizelabel" placeholder="Enter sizelabel" class="form-control" value="{{ old('sizelabel') }}">
                <div> {{ $errors->first('sizelabel') }}</div>
              </div>
              
            </div>
              -->
              
             <div class="col-md-12">

              <div class="form-group col-md-6">
                <label>Main Image</label>
                <input type="file" name="mainimage" id="mainimage" placeholder="Enter image" class="form-control" value="">
                <div> {{ $errors->first('mainimage') }}</div>
              </div>
              <!-- /.form-group -->
              <div class="form-group col-md-6">
                <label>Sub Images</label>
                <input type="file" name="subimage[]" id="subimage" placeholder="Enter subimage" class="form-control" value="{{ old('subimage') }}" multiple>
                <div> {{ $errors->first('subimage') }}</div>
              </div>
              <!-- /.form-group -->
            </div>
             <!-- /.col -->

             <div class="col-md-12">
              <div class="form-group col-md-6">               
                <input class="form-group" type="checkbox" id="featured" name="featured" value="1"> <label>Featured</label>
                <div> {{ $errors->first('featured') }}</div>
              </div>
              <!-- /.form-group -->
              <div class="col-md-6">                
                <input class="form-group" type="checkbox" name="setnew" value="1" id="setnew"> <label>New</label>
                <div> {{ $errors->first('setnew') }}</div>
              </div>
              <!-- /.form-group -->
            </div>
             <!-- /.col -->
             <div class="col-md-12">
             <div class="form-group col-md-6">               
                <input class="form-group" type="checkbox" id="status" name="status" value="1"> <label>Status</label>
                <div> {{ $errors->first('status') }}</div>
              </div>
              <!-- /.form-group -->
              <div class="col-md-6">                
               <!--  <input class="form-group" type="checkbox" name="setnew" value="" id="setnew"> <label>New</label>
                <div> {{ $errors->first('setnew') }}</div> -->
              </div>
              <!-- /.form-group -->
            </div>
             <!-- /.col -->

          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <button id="btnadd" type="submit" class="btn btn-primary">Add Product</button>
        </div>
      <!-- </form> -->
        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  @endsection
  <!-- /.content-wrapper -->
  
@section('pagespecificscripts')
<script>
    $(document).ready(function(){

        $("#category").change(function () {
           var category_id = $('#category').val();
           if(category_id != '')
           {
              //Ajax load subcategory:
              $.ajax({
                url: "{{url('admin/get-subcaetgory')}}",
                method: "POST",
                data: {
                    'category_id': category_id,                    
                    "_token": "{{ csrf_token() }}",
                },
                success: function (result) {                       
                      if(result){
                          $("#subcategory").empty();
                          $("#subcategory").append('<option>Select Subcategory</option>');
                          $.each(result,function(key,value){                            
                              $("#subcategory").append('<option value="'+value.id+'">'+value.name+'</option>');
                          });
                      }else{
                         $("#subcategory").empty();
                      }                                        
                },
            }); 
           }
        });

        $('#password').focus(function(){
            $('.msg').show();
        });
        $('#password').keyup(function(){
            $('.msg').css('display','none');
        });



    });  
</script>
@stop

 

