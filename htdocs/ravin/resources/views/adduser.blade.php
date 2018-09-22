<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{asset('admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('admin/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="{{asset('admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('admin/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('admin/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('admin/build/css/custom.min.css')}}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
             @include('admin.partial.sidebar')
            @include('admin.partial.header')
 

            <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
             
                <div class="box-header with-border">
                <h1>Add </h1>
                <form id="registration"  action="{{route('save_data')}}" enctype="multipart/form-data" class="custom_form pt-3" method="get" >
                {{csrf_field()}}
                      <div class="box-body">
                <div class="form-group">
                  <label for="user">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="name" maxlength="30" minlength="2"  required>

                </div>
                <div class="form-group">
                  <label for="pass">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="email" maxlength="30" required>
                </div>
                 <div class="form-group">
                  <label for="add">MobileNo</label>
                  <input type="text" class="form-control" id=" contactno" name="contactno" placeholder=" contactno"  required>
                </div>
                <div class="form-group">
                  <label for="add"> Location</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="address" maxlength="20" required>
                
                </div>
                <div class="form-group">
                  <label for="add"> Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="password" maxlength="16" required>
                
                </div>

        
                <div class="form-group" >
                  <label for="role"  > Role </label>
                  <select name="role" class="form-control"  >
                  <option value="" selected >select option</option>
                    <option value="1" >admin</option>
                        <option value="2" >doctor</option>
                        <option value="3" >Laboratory</option>
                        <option value="4" >Patient</option>
                        <option value="5" >Pharmacist</option>

                        
                </select>
             </div>

              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" value="ADD ACCOUNT"  name="submit" class="btn btn-primary">
              </div>
          
        </div>
        </form>
  </div>
  </div>
        
    </div>
  </div>    
@yield('content') 

  @include('admin.partial.footer')

    </div>
    </div>
    <!-- jQuery -->

    <script src="{{asset('admin/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('admin/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('admin/vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{asset('admin/vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{asset('admin/vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('admin/vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{asset('admin/vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{asset('admin/vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('admin/vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('admin/vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('admin/vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('admin/vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{asset('admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{asset('admin/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{asset('admin/vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{asset('admin/vendors/DateJS/build/date.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('admin/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{asset('admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('admin/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('admin/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('admin/build/js/custom.min.js')}}"></script>
  
  </body>
</html>
