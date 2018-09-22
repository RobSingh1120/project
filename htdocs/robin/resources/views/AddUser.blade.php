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
       

        
 


          <div class="box box-primary">
            <div class="box-header with-border">
                <h1>Add Teacher Details</h1>
         <form id="registration"  action="{{route('abc')}}" enctype="multipart/form-data" class="custom_form pt-3" method="post" >
          {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="user">Name</label>
                  <input type="text" class="form-control" id="Name" name="Name" placeholder="name" maxlength="30" minlength="2"  required>

                </div>
                <div class="form-group">
                  <label for="pass">Email</label>
                  <input type="text" class="form-control" id="Email" name="Email" placeholder="Email" maxlength="30" required>
                </div>
                 <div class="form-group">
                  <label for="add">MobileNo</label>
                  <input type="text" class="form-control" id="MobileNo" name="MobileNo" placeholder="Mobile"  required>
                </div>
                <div class="form-group">
                  <label for="add"> Location</label>
                  <input type="text" class="form-control" id="Location" name="Location" placeholder="Location" maxlength="20" required>
                
                </div>
                <div class="form-group">
                  <label for="add"> Password</label>
                  <input type="password" class="form-control" id="Password" name="Password" placeholder="Password" maxlength="16" required>
                
                </div>

                <div>
                   <label for="image">Upload Image</label>
                  <input type="file" name="image" >
                  <span class="error"></span>
                </div>


                <div class="form-group">
                <label for="add"> Marital_status</label>
                <br>
                  <input type="radio" name="Marital_status" value="Single" required>Single<br>
                  <input type="radio" name="Marital_status" value="Married" required> Married  
                
                </div>
                <div class="form-group" >
                  <label for="Gender"  > Gender </label>
                  <select name="Gender" class="form-control"  >
                  <option value="None" selected >None</option>
                    <option value="male" >Male</option>
                        <option value="female" >Female</option>
                         <option value="Other" >Other</option>
                        
                </select>
                <label for="description">description</label>
                <textarea id="article-ckeditor"></textarea>
             </div>


              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" value="ADD ACCOUNT"  name="submit" class="btn btn-primary">
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
<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>

</body>
</html>
    