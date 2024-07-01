@extends('layouts.admin')
@section('title', 'Manage Requirement')  
@section('pagespecificstyles')  
@stop
  @section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Manage Requirement
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Manage Requirement</li>
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
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile number</th>
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
 <div id="user-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog"> 
      <div class="modal-content">                  
         <div class="modal-header"> 
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">*</button> 
             <h4 class="modal-title">
             <i class="glyphicon glyphicon-user"></i> Employee Details
             </h4> 
         </div>          
         <div class="modal-body">                       
             <div id="user_image">
                 
             </div>                       
             <div id="employee-detail">                                        
                 <div class="row"> 
                     <div class="col-md-12">                         
                     <div class="table-responsive">                             
                     <table class="table table-striped table-bordered">
                     <tr>
                     <th>EmpID</th>
                     <td id="user_id"></td>
                     </tr>                                     
                     <tr>
                     <th>Name</th>
                     <td id="user_name"></td>
                     </tr>                                         
                     <tr>
                     <th>Email</th>
                     <td id="user_email"></td>
                     </tr>
                     <tr>
                     <th>Mobile</th>
                     <td id="user_mobile"></td>
                     </tr>
                     <tr>
                     <th>Experiance</th>
                     <td id="user_experiance"></td>
                     </tr>
                     <tr>
                     <th>Position</th>
                     <td id="user_position"></td>
                     </tr>
                     <tr>
                     <th>Qualification</th>
                     <td id="user_qualification"></td>
                     </tr>
                     
                     <tr>
                     <th>Vocation</th>
                     <td id="user_vocation"></td>
                     </tr>

                     <tr>
                     <th>Join</th>
                     <td id="user_join"></td>
                     </tr>

                     <tr>
                     <th>Message</th>
                     <td id="user_msg"></td>
                     </tr>

                                                                                              
                     </table>                                
                     </div>                                       
                   </div> 
              </div>                       
             </div>                              
         </div>           
       <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
       </div>              
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
      "url": "manage_requirement",
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
          url: "delete_requirement",
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

$(document).on('click','.view',function(){
  $('#user-modal').modal('show');
  var id = $(this).attr('id');
  $.ajax({
          type: "GET",
          url: "view_requirement",
          data:{id:id},
          dataType: "json",
          success: function(result){
           $('#user_id').html(result[0].id);
           $('#user_name').html(result[0].user_name);
           $('#user_email').html(result[0].user_email);
           $('#user_mobile').html(result[0].user_mobile);
           $('#user_experiance').html(result[0].user_experiance);
           $('#user_position').html(result[0].user_position);
           $('#user_qualification').html(result[0].user_qualification);
           $('#user_vocation').html(result[0].user_vocation);
           $('#user_join').html(result[0].user_join);
           $('#user_msg').html(result[0].user_msg);
           if(result[0].user_resume){
            $('#user_image').css('display','block');
            $('#user_image').html("<i class='fa fa-file-text-o'></i>  <a title='Download' href=../public/uploads/user_resume/" + result[0].user_resume + " download>Resume Document</a>");
           }else{ 
            $('#user_image').css('display','none');
           } 
          },
        });
});
</script>
@stop







