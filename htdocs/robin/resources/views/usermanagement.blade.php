<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User Management</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <meta name="csrf_token" content="{{ csrf_token() }}" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/sweetalert.css')}}">

  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/bootstrap3-wysihtml5.all.js')}}">
  <link rel="stylesheet" href="{{asset('admin/dist/css/bootstrap3-wysihtml5.all.min.js')}}">
  <link rel="stylesheet" href="{{asset('admin/dist/css/bootstrap3-wysihtml5.css')}}">
  <link rel="stylesheet" href="{{asset('admin/dist/css/bootstrap3-wysihtml5.min.css')}}">
  

  <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic')}}">
</head>
<body class="skin-blue">
     @include('admin.partial.header')
  <div class="content-wrapper">

        <ol class="breadcrumb">

    <div>
            <form action="{{route('user_search')}}" method="get" role = "search">

                    {{ csrf_field() }}             
                     <input type="text" name="search"  placeholder="search">          
                    
  
                <select name="selectrole">
                  <option value = "" >Select Role </option>
                  <option value='1'>Doctor</option>
                  <option value='2'>Laboratory</option>
                  <option value='3'>Patient</option>
                  <option value='4'>Pharmacist</option>
                </select>   
                 <input type="submit" value="search" class="btn-primary">         
              

            </form>
            </div>
              <!-- Content Header (Page header) -->
              <section class="content-header">
                <h3>User Management
              </section>
          @include('admin.partial.sidebar')
  
          @if(isset($manage_data))
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover" id="mytable">
                    <thead>
                      <tr>
                         <th>S.No</th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Contact No</th>
                         <th>status</th>    
                         <th>Role</th>
                         <th>Action</th>
                      </tr>
                    </thead>

                      @php
                      $page=1;
                      if(Request::input('page'))
                      $page=Request::input('page');
                      $sort=7;
                      

                      @endphp

                      @foreach($manage_data as $index=>$row)
                        <tr>
                            <th>{{$sort*($page-1)+($index+1) }}</th>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->contactno}}</td>
                                <td>{{$row->status}}</td>
                              @if($row->role == 1)
                                <td>{{'Doctor'}}</td>
                              @elseif($row->role == 2)
                                <td>{{'Laboratory'}}</td>
                              @elseif($row->role == 3)
                                <td>{{'Patient'}}</td>
                              @elseif($row->role == 4)
                                <td>{{'Pharmacist'}}</td>
                              @endif
                            <td>                              
                            
                                 <a href="{{ url('viewdata_management', [$row->id]) }}" class="btn btn-success">View</a>   
                                 <a href="#" class="btn btn-danger" onclick="datadelete('{{$row->id}}')">Delete</a>
                                <!--   <button class="button"> <a href="#"  onclick="datadelete('{{$row->id}}')" > delete</a></button> -->
                                    @if($row->status==0)
                                        <a href="#" class="btn btn-success"  onclick="UnBlock('{{$row->id}}')">UnBlock</a>
                                    @elseif($row->status==1)
                                   <a href="#" class="btn btn-danger" onclick="Block('{{$row->id}}')"> Block</a>
                             
                                    @endif 
                                    @if($row->approved == 1)
                                     
                                      <a href="#" class="btn btn-primary">send mail</a>
                                      <a href="#" class="btn btn-danger" onclick="datadelete('{{$row->id}}')">Delete</a>
                                       <a href="{{url('/approves/'.$row->id)}}" class="btn btn-primary">Disapprove</a> 
                                       @else($row->approved == 0)
                                       
                                       <a href="#" class="btn btn-primary">send mail</a>
                                     
                                       <a href="{{url('/approves/'.$row->id)}}" class="btn btn-success">Approve</a>
                                      <a href="#" class="btn btn-danger">reject</a> 
                                     @endif

                            </td>
                        </tr>
                                    @endforeach 
                </table>

                @php echo $manage_data->appends(request()->input())->links() @endphp
                @elseif (!isset($manage_data))
                <h3>{{ $message }} </h3>
                @endif
            </div>
  </div>   <!-- ... wraper -->
     
      
    @include('admin.partial.footer')

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Morris.js charts -->
    <script src="{{asset('admin/bower_components/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/morris.js/morris.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap -->
    <script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('admin/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('admin/bower_components/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- datepicker -->
    <script src="{{asset('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <!-- Slimscroll -->
    <script src="{{asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('admin/dist/js/pages/dashboard.js')}}"></script>
    <script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin/dist/js/demo.js')}}"></script>
    <script src="{{asset('admin/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('admin/js/sweetalert.js')}}"></script>

    <script >

    var public_url="<?php echo URL::to('/');?>";
    </script>
    <script>
    function datadelete(id) {

            swal({
              title: "Are you sure?",
              text: "This data can not be recover.",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#069edb",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: false
            }, function() {
             // alert($('meta[name="csrf-token"]').attr('content'));
              $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                }
              });

              $.ajax({
                type: 'DELETE',
                data: {
                  '_method': 'DELETE'
                },

                url: public_url + "/destroy/" + id,
                success: function(data) {
                  swal({
                      title: "Deleted!",
                      text: "Teacher Content was successfully deleted!",
                      type: "success",
                     
                    },
                    function() {
                      window.location.href = public_url + '/usermanagement';
                    });
                }
              });
            });
        }
            </script>

            <script>
    function Block(id) {

            swal({
              title: "Are you sure?",
              text: "This User will be Block.",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#069edb",
              confirmButtonText: "Yes, block it!",
              closeOnConfirm: false
            }, function() {
             // alert($('meta[name="csrf-token"]').attr('content'));
              $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                }
              });

              $.ajax({
                type: 'get',
                data: {
                  '_method': 'get'
                },

                url: public_url + "/userstatus/" + id,
                success: function(data) {
                  swal({
                      title: "Block!",
                      text: "User Block successfully !",
                      type: "success",
                     
                    },
                    function() {
                      window.location.href = public_url + '/usermanagement';
                    });
                }
              });
            });
        }
            </script>

             <script>
    function UnBlock(id) {

            swal({
              title: "Are you sure?",
              text: "This User will be UnBlock.",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#069edb",
              confirmButtonText: "Yes, UnBlock it!",
              closeOnConfirm: false
            }, function() {
             // alert($('meta[name="csrf-token"]').attr('content'));
              $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                }
              });

              $.ajax({
                type: 'get',
                data: {
                  '_method': 'get'
                },

                url: public_url + "/userstatus/" + id,
                success: function(data) {
                  swal({
                      title: "UnBlock!",
                      text: "User UnBlock successfully !",
                      type: "success",
                     
                    },
                    function() {
                      window.location.href = public_url + '/usermanagement';
                    });
                }
              });
            });
        }
            </script>
</body>
