@extends('layouts.admin')
@section('title', 'Manage Job')  
@section('pagespecificstyles')  
@stop
  @section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Manage Job
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Manage Job</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <button class="btn btn-default" ><span class="glyphicon glyphicon-dashboard"></span> Dashboard</button>
             <button class="btn btn-primary" onclick="reload_table();" id="some"><span class="glyphicon glyphicon-refresh"></span> Reload</button>
             <button class="btn btn-success add_category"><span class="glyphicon glyphicon-plus"></span> Add Job</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Title</th>
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


<div id="add_edit_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="icon-paragraph-justify2"></i><span id="pop_title">Add</span> Job information</h4>
        </div>
        <form method="post" id="category_info" autocomplete="off">
           @csrf
          <div class="modal-body with-padding">
            
            <div class="form-group">
              <div class="row">
                <div class="col-sm-12">
                  <label>Title :</label>
                   <input type="text" name="title" id="title"  class="form-control" autocomplete="true">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-sm-12">
                  <label>Position :</label>
                   <input type="number" name="position" id="position"  class="form-control" autocomplete="true">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-sm-12">
                  <label>Experience :</label>
                   <input type="text" name="experience" id="experience"  class="form-control" autocomplete="true">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-sm-12">
                  <label>Qualification :</label>
                   <input type="text" name="qualification" id="qualification" class="form-control" autocomplete="true">
                </div>
              </div>
            </div>
    
          </div>  
          <div class="modal-footer">
            <button type="button" class="btn btn-warning Cancel" data-dismiss="modal">Cancel</button>
            <span id="add">
              <input type="hidden" name="id" value="" id="uid">
              <button type="submit" name="form_data" class="btn btn-primary">Submit</button>
            </span>
          </div>
        </form>
      </div>
    </div>
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
      "url": "manage_job",
      "type": "GET",        
    },
  });
});

$(document).on('click','.add_category',function(){
  $('#add_edit_modal').modal('show'); 
   $('#category_info')[0].reset();
   $("#pop_title").html("Add");
   $('#uid').val('');
   $('#user_image').hide();
});

$("#category_info").validate({
  rules: {
    title:{
      required: true,
    },
    position:{
      required: true,
    },
    experience:{
      required: true,
    },
    qualification:{
      required: true,
    },
  },
  messages: {
    title: {
      required: "Title is required",
    },
    position: {
      required: "Position is required",
    },
    experience: {
      required: "Experience is required",
    },
    qualification: {
      required: "Qualification is required",
    },
    
  },
  errorElement : 'div',
  errorLabelContainer: '.error',
  submitHandler: function() {
    var form = $('#category_info')[0]; 
    var data = new FormData(form);
    $.ajax({
      url: "add_edit_job",
      type: "POST",
      data: data,
      processData: false,
      contentType: false,
      success: function(result)
      {
        if(result.status == 'success')
        {
          $('#add_edit_modal').modal('hide'); 
          reload_table();
          $.notify({message:result.message},{type:'success',placement:{from:"bottom",align:"right"}});
        }else{  
          $.each(result.message, function(key,value) {
            $.notify({message:value},{type:'error',placement:{from:"bottom",align:"right"}});
          });
        }      
      },
      error:function(result)
      {
          alert(result);
      }, 
    });   
  }
});

$(document).on('click','.edit',function(){
  $('#add_edit_modal').modal('show');
  var id = $(this).attr('id');
  $('#uid').val(id);
  if(id)
  {
    $('#pop_title').html('Edit');
  }
  else
  {
    $('#pop_title').html('Add');
  }
  $.ajax({
        url: "view_job",
        dataType: 'json',
        method:"GET",
        data:{id:id},
        success: function(result)
        {
          $('#title').val(result[0].title);
          $('#position').val(result[0].position);
          $('#experience').val(result[0].experience);
          $('#qualification').val(result[0].qualification);
        }
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
          url: "delete_job",
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
