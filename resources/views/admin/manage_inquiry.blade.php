@extends('layouts.admin')
@section('title', 'Manage Inquiry')  
@section('pagespecificstyles')  
@stop
  @section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Manage Inquiry
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Manage Inquiry</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <button class="btn btn-default" ><span class="glyphicon glyphicon-dashboard"></span> Dashboard</button>
             <button class="btn btn-primary" onclick="reload_table();" id="some"><span class="glyphicon glyphicon-refresh"></span> Reload</button>
             
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Services</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile number</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Register At</th>
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

$(document).ready(function()
{
$('#example1').dataTable({
    "processing": true,
    "ajax": {
      "url": "manage_inquiry",
      "type": "GET",        
    },
  });
});

$(document).on('click', '.delete', function(){ 
    var id = $(this).attr("id");  
    var remove = $(this).parent().parent();
    bootbox.confirm({ 
    message: "Are you sure want to delete this record ?",
    buttons: {
      'cancel': {
      label: 'Cancel',
      className: 'btn-danger'
      },
      'confirm': {
      label: 'Confirm',
      className: 'btn-success'
      } 
     }, 
    callback: function(result){
      if(result){
        $.ajax({
          type: "GET",
          url: "delete_inquiry",
          data:{id:id},
          success: function(result){
           $.notify({message:result},{type:'success',placement:{from:"bottom",align:"right"},delay: 500,timer: 500});
            remove.fadeOut().remove();
            reload_table();
          },
        });
      }
    }
})       
});
</script>
@stop







