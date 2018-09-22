<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ROBIN | Dashboard</title>
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
<div class="wrapper">

    <!-- Header -->
    @include('admin.partial.header')

    <!-- Sidebar -->
    @include('admin.partial.sidebar')

    <!-- Content Wrapper. Contains page content -->



    <div class="content-wrapper">
     <h3> Teachers List</h3>
     <a href="{{URL('robin')}}" class="btn btn-success pull-right" > ADD TEACHER</a> 
    <!--  <button class="btn-info pull-right"> <a href="{{URL('robin')}}"> <i class="fa fa-plus" style="font-size:15px;color:yellow" ></i>  ADD TEACHER</a></button> -->
       <ol class="breadcrumb">
        <form action="{{route('searche')}}" method="get" role = "search" >
         {{ csrf_field() }}
                  
      <input type="text" name="Name" placeholder="enter name">
       <input type="text" name="Email" placeholder="enter email">
      <input type="submit" value="search" class="btn-primary">
      </form>
    
                  <table class="table table-hover" id="mytable">
                  <thead>
                  <tr>
                  <th>S.No.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>MobileNo</th>
                  <th>Location</th>
                  <th>Password</th>
                  <th>Marital_status</th>
                  <th>Gender</th>
                
                  <th>Action</th>
                  </tr>
                   </thead>
@php
$page=1;
if(Request::input('page'))
$page=Request::input('page');
$sort=7;
@endphp
                    @foreach($teacher_data as $index=>$row)
                                    <tr>
                                    <th>{{$sort*($page-1)+($index+1) }}</th>
                     
                    <td>{{$row->Name}}</td>
                    <td>{{$row->Email}}</td>
                    <td>{{$row->MobileNo}}</td>
                    <td>{{$row->Location}}</td>
                    <td>{{$row->Password}}</td>
                    <td>{{$row->Marital_status}}</td>
                    <td>{{$row->Gender}}</td>
              
                   <td>
                       
                        
                      <a href="#" class="btn btn-success pull-right" onclick="datadelete('{{$row->id}}')" > Delete </a> 
           <!-- <button class="btn-danger> <a href="#"  onclick="datadelete('{{$row->id}}')" " > delete</a></button> -->
               <form method="get" action="{{ route('viewdata', [$row->id]) }}">
                    {{ csrf_field() }}
                
              <button type="submit" id="btn-view" data-target="#" data-toggle="modal" class="btn-info "><i class="fa fa-eye" aria-hidden="true" style="font-size:15px;color:red" ></i>View</button>
            </form>
            <form method="get" action="{{ route('editdata', [$row->id]) }}">
                    {{ csrf_field() }}
              
              <button type="submit" id="btn-edit" data-target="#" data-toggle="modal" class="btn-success"><i class="fa fa-edit" style="font-size:20px;color:red"></i>Edit</button>
            </form>
                    </td>

                                           
                 
                        
                    
                </tr>

 @endforeach 
 
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
</table>
  @php echo $teacher_data->appends(request()->input())->links() @endphp
</div></div>

    <!-- Footer -->
    @include('admin.partial.footer')

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->

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


    <!-- s -->
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

            url: public_url + "/delete/" + id,
            success: function(data) {
              swal({
                  title: "Deleted!",
                  text: "Teacher Content was successfully deleted!",
                  type: "success",
                 
                },
                function() {
                  window.location.href = public_url + '/view';
                });
            }
          });
        });
    }
        </script>

</body>
</html>

