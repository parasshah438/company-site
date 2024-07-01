@extends('layouts.admin')
@section('title', 'Home')  
@section('pagespecificstyle')
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$all_users}}</h3>
              <p>Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="../admin/requirement" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$all_inquiry}}</h3>

              <p>Inquiry</p>
            </div>
            <div class="icon">
              <i class="icon ion-ios-telephone"></i>
            </div>
            <a href="../admin/inquiry" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        <!-- ./col -->
       

        
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        
      </div>
      <!-- /.row (main row) -->
    </section>
    <div id="user-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
       <div class="modal-dialog"> 
          <div class="modal-content">                  
             <div class="modal-header"> 
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">*</button> 
                 <h4 class="modal-title">
                 <i class="fa fa-user" aria-hidden="true"></i> User Details
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
                         <th>Name</th>
                         <td id="user_name"></td>
                         </tr>                                         
                         <tr>
                         <th>Email</th>
                         <td id="user_emails"></td>
                         </tr>
                         <tr>
                         <th>Mobile</th>
                         <td id="user_mobile"></td>
                         </tr>
                         <tr>
                         <th>Last Login At</th>
                         <td id="last_login_at"></td>
                         </tr>
                         <tr>
                         <th>Register At</th>
                         <td id="user_created_at"></td>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@section('pagespecificscripts')
<script type="text/javascript">
  $(document).ready(function(){
    $('.userinfo').css('cursor', 'pointer');  
    $(document).on('click','.userinfo',function(){
        $('#user-modal').modal('show');
        var id = $(this).attr('id');
        $.ajax({
          type: "GET",
          url: "view_user_details",
          data:{id:id},
          dataType: "json",
          success: function(result){
           $('#user_name').html(result[0].name);
           $('#user_emails').html(result[0].email);
           $('#user_mobile').html(result[0].mobile);
           var created_at = result[0].created_at;
           var last_login_at = result[0].last_login_at;
           var created_at_date = moment(created_at).format('DD-MM-YYYY h:mm:ss A');
           $('#user_created_at').html(created_at_date);
           if(last_login_at == null){
            $('#last_login_at').html('Not Login');
           }else{
           var last_login_date = moment(last_login_at).format('DD-MM-YYYY h:mm:ss A');
           $('#last_login_at').html(last_login_date);
           }
           if(result[0].image){
             $('#user_image').css('display','block');
           $('#user_image').html("<img src=../public/profile/" + result[0].image + " width='20%'>");
           }else{
              $('#user_image').css('display','none');
           } 
          },
        });
    });
  });
</script>
@endsection
@endsection