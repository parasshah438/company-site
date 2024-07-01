@extends('layouts.admin')
@section('title', 'Manage Products')  
@section('pagespecificstyles')  
@stop
  @section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Manage Product
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage User</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <button class="btn btn-default" ><span class="glyphicon glyphicon-dashboard"></span> Dashboard</button>
             <button class="btn btn-primary" onclick="reload_table();" id="some"><span class="glyphicon glyphicon-refresh"></span> Reload</button>
             <button id="btnExporttoExcel" class="btn btn-danger clearfix"><span class="fa fa-file-excel-o"></span> Export to Excel</button>
              
             <button class="btn btn-success add_new_user"><span class="glyphicon glyphicon-user"></span> Add User</button>

            <button class="btn deleteall btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th><input type="checkbox" id="select_all" class="remove"></th>
                  <th>Id</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>SKU</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
              <table id="example2" class="table table-bordered table-striped example2" style="display: none;">
                <thead>
                <tr>
                  <th><input type="checkbox" id="select_all" class="remove"></th>
                  <th>Id</th>
                  <th>Product Name</th>
                  <th>SKU</th>
                  <th>Price</th>
                  <th>Weight</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
@section('pagespecificscripts')
<script type="text/javascript">
function reload_table(){  
  $('#example1').dataTable().api().ajax.reload();
}
$("#btnExporttoExcel").click(function(){
  $('<table>')
     .append(
        $("#example2").dataTable().$('tr').clone()
     )
      $(".example2").remove(".remove").table2excel({
         exclude: ".delete,.remove",
        name: "Worksheet Name",
        filename: "Users"
     });
});
$("#table_id").dataTable();


$(document).ready(function(){
$('#example1').dataTable({
    "processing": true,
    "ajax": {
      "url": "manage_product", 
      "type": "GET",        
    },
  });
  //hide section
  $('#example2').dataTable({
    bFilter: false,
    bInfo: false,
    paging: false,
    "processing": true,
    "ajax": {
      "url": "manage_product",
      "type": "GET",        
    },
  });
});
</script>
@stop







