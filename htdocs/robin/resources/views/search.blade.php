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
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
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
  <link rel="stylesheet" href="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}">

 

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
                               <h3> Teachers Search List</h3>


                       <!--  <button class="btn-info"> <a href="{{URL('robin')}}"> <i class="fa fa-plus" style="font-size:15px;color:yellow" ></i>  ADD TEACHER</a></button> -->
 
    </section>   
   
              
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

                            <?php
$count = 1;
?>
                    @foreach($datam as $row)
                 <tr>
                     <td>{{$count}}</td>
                    <td>{{$row->Name}}</td>
                    <td>{{$row->Email}}</td>
                    <td>{{$row->MobileNo}}</td>
                    <td>{{$row->Location}}</td>
                    <td>{{$row->Password}}</td>
                    <td>{{$row->Marital_status}}</td>
                    <td>{{$row->Gender}}</td>
              
                           <td>
                       
                        <form method="get" action="{{ route('data.destroy', [$row->id]) }}">
                    {{ csrf_field() }}
                 {{ method_field('DELETE') }}
              <button  type="submit" id="btn-delete" data-target="#" data-toggle="modal"  class="btn btn-danger" ><i class="fa fa-trash-o" style="font-size:20px;color:blue" ></i>Delete</button>

            </form>
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
                 
                   <?php
$count++;
?>
                   @endforeach 
                   
                  @yield('content')
  
            </table>
    </div>
  </div>
              <!-- Footer -->
              @include('admin.partial.footer')

                          <!-- ./wrapper -->

                        <!-- REQUIRED JS SCRIPTS -->

                        <!-- jQuery 2.1.3 -->
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
              <!-- AdminLTE for demo purposes -->
              <script src="{{asset('admin/dist/js/demo.js')}}"></script>
              <script src="{{asset('admin/js/sweetalert.js')}}"></script>
              <script src="{{asset('admin/js/sweetalert.min.js')}}"></script>

</body>

