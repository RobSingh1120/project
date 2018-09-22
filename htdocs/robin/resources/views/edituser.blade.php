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
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/css/sweetalert.css')}}">
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
        <!-- Content Header (Page header) -->
       

        
 

Profile Picture: <img src="{{url('images/'.$teacher_dataedit->image)}}"" class="img-circle" width="100" height="100" />
          <div class="box box-primary">
            <div class="box-header with-border">
                <h1>Add User Details</h1>
         <form id="registration"  action="{{route('update',$teacher_dataedit->id)}}" enctype="multipart/form-data" class="custom_form pt-3" method="post" >
          {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="user">Name</label>
                  <input type="text" class="form-control" id="Name"  value="{{$teacher_dataedit->Name}}"  name="Name" placeholder="name" maxlength="30" minlength="2" >

                </div>
                <div class="form-group">
                  <label for="pass">Email</label>
                  <input type="text" class="form-control" id="Email" name="Email" value="{{$teacher_dataedit->Email}}"  placeholder="Email" maxlength="30">
                </div>
                 <div class="form-group">
                  <label for="add">MobileNo</label>
                  <input type="text" class="form-control" id="MobileNo" name="MobileNo" value="{{$teacher_dataedit->MobileNo}}" placeholder="Mobile" maxlength="10">
                </div>
                <div class="form-group">
                  <label for="add"> Location</label>
                  <input type="text" class="form-control" id="Location" name="Location" value="{{$teacher_dataedit->Location}}" placeholder="Location" maxlength="30">
                
                </div>
                <div class="form-group">
                  <label for="add"> Password</label>
                  <input type="password" class="form-control" id="Password" name="Password" value="{{$teacher_dataedit->Password}}" placeholder="Password" maxlength="10">
                
                </div>
                <div>
                   <label for="image">Upload Image</label>
                  <input type="file" name="image" >
                  <span class="error"></span>
                </div>

                <div class="form-group">
                <label for="add"> Marital_status</label>
                <br>
                @if($teacher_dataedit->Marital_status =='Single')
                  <input type="radio" name="Marital_status" value="Single" checked>Single<br>
                  <input type="radio" name="Marital_status" value="Married"> Married  
                @else
                <input type="radio" name="Marital_status" value="Single">Single<br>
                  <input type="radio" name="Marital_status" value="Married" checked> Married  
                  @endif
                </div>
                <div class="form-group">
                  <label for="Gender"> GENDER </label>
                  <select name="Gender" class="form-control" >
                  @if($teacher_dataedit->Gender =='None')
                  <option value="None" selected >None</option>
                    <option value="male">Male</option>
                        <option value="female">Female</option>
                         <option value="Other">Other</option>

                         @elseif($teacher_dataedit->Gender =='male')
                  <option value="None">None</option>
                    <option value="male" selected>Male</option>
                        <option value="female">Female</option>
                         <option value="Other">Other</option>
                        
                        @elseif($teacher_dataedit->Gender =='female')
                  <option value="None" >None</option>
                    <option value="male">Male</option>
                        <option value="female">Female</option>
                         <option value="Other" selected >Other</option>
                        @elseif($teacher_dataedit->Gender =='Other')
                  <option value="None" >None</option>
                    <option value="male">Male</option>
                        <option value="female">Female</option>
                         <option value="Other" selected >Other</option>

                        @endif
                </select>
             </div>

              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit"  name="submit" class="btn btn-primary">Update Account</button>
              </div>
            </form>
          </div>
          </div>
            </div>
        </div>
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->`

    <!-- Footer -->
    @include('admin.partial.footer')

</div><!-- ./wrapper -->

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

<script src="{{asset('admin/dist/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/dist/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('admin/dist/js/jquery.validate.js')}}"></script>

</body>
</html>
