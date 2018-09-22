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
            <!-- Content Header (Page header) -->
        <div class="container">
                @if($userdata->role == 1)           
                    <div>
                      <label for="name"> Name : </label>
                      {{ $userdata->name}}
                    </div>
                      <div >           
                        <label for="email"> Email : </label>
                        {{ $userdata->email}}
                      </div>
                    <div > 
                       <label for="mobile"> Mobile Number : </label>
                       {{ $userdata->contactno}}
                    </div>
                      <div>          
                        <label for="dob"> Date Of Birth: </label>
                        {{ $userdata->dob}}
                      </div>
                    <div >           
                      <label for="practice_start_date "> Practise Start Date : </label>
                      {{ $userdata->practice_start_date }}
                    </div>
                      <div >           
                        <label for="  licence">   Licence : </label>
                        {{ $userdata->  licence}}
                      </div>
                    <div>           
                      <label for="certificate"> Certificate: </label>
                      {{ $userdata->certificate}}
                    </div>
                      <div>           
                        <label for="address"> Address: </label>
                        {{ $userdata->address}}
                      </div>
                    <div>           
                      <label for="education"> Education: </label>
                      {{ $userdata->education}}
                    </div>
                      <div>           
                        <label for="hospital_name"> Hospital Name: </label>
                        {{ $userdata->hospital_name}}
                      </div>
                    <div>           
                      <label for="payment_preference"> Payment Preference: </label>
                      {{ $userdata->payment_preference}}
                    </div>
                      <div>           
                        <label for="fee_bmct"> Fee Bmct: </label>
                        {{ $userdata->fee_bmct}}
                      </div>
                    <div>          
                      <label for="fee_cash_wallet"> Fee Cash Wallet: </label>
                      {{ $userdata->fee_cash_wallet}}
                    </div>
                      <div>           
                        <label for="status"> Status: </label>
                        {{ $userdata->status}}
                      </div>
                    <div>            
                      <label for="discount"> Discount: </label>
                      {{ $userdata->discount}}
                    </div>
                      <div>           
                        <label for="image"> Image: </label>
                        {{ $userdata->image}}
                      </div>
                    <div>           
                      <label for="role"> Role: </label>
                      {{ $userdata->role}}
                    </div> 
                @elseif($userdata->role == 2) 
                    <div>
                       <label for="name"> Name : </label>
                       {{ $userdata->name}}
                    </div>
                      <div >           
                        <label for="email"> Email : </label>
                        {{ $userdata->email}}
                      </div>
                    <div > 
                       <label for="mobile"> Mobile Number : </label>
                      {{ $userdata->contactno}}
                    </div>
                      <div>          
                        <label for="dob"> Date Of Birth : </label>
                        {{ $userdata->dob}}
                      </div>
                    <div>           
                      <label for="address"> Address: </label>
                      {{ $userdata->address}}
                    </div>
                      <div>           
                        <label for="discount"> Discount: </label>
                        {{ $userdata->discount}}
                      </div>
                    <div>          
                      <label for="image"> Image: </label>
                      {{ $userdata->image}}
                    </div>
                @elseif($userdata->role == 3)
                    <div>
                       <label for="name"> Name : </label>
                       {{ $userdata->name}}
                    </div>
                      <div >           
                        <label for="email"> Email : </label>
                        {{ $userdata->email}}
                      </div>
                    <div > 
                       <label for="mobile"> Mobile Number : </label>
                       {{ $userdata->contactno}}
                    </div>
                      <div>          
                        <label for="dob"> Date Of Birth : </label>
                        {{ $userdata->dob}}
                      </div>
                    <div>           
                      <label for="address"> Address: </label>
                      {{ $userdata->address}}
                    </div>
                      <div>           
                        <label for="discount"> Discount: </label>
                        {{ $userdata->discount}}
                      </div>
                    <div>          
                      <label for="image"> Image: </label>
                      {{ $userdata->image}}
                    </div>                         
                @elseif($userdata->role == 4)                    
                    <div>
                       <label for="name"> Name : </label>
                       {{ $userdata->name}}
                    </div>
                      <div >           
                        <label for="email"> Email : </label>
                        {{ $userdata->email}}
                      </div>
                    <div > 
                       <label for="mobile"> Mobile Number : </label>
                       {{ $userdata->contactno}}
                    </div>
                      <div>          
                        <label for="dob">  Date Of Birth : </label>
                        {{ $userdata->dob}}
                      </div>
                    <div >           
                      <label for="practice_start_date "> Practise Start date : </label>
                      {{ $userdata->practice_start_date }}
                    </div>
                      <div >            
                        <label for="  licence">   licence : </label>
                        {{ $userdata->  licence}}
                      </div>
                    <div>           
                      <label for="certificate"> certificate: </label>
                      {{ $userdata->certificate}}
                    </div>
                      <div>           
                        <label for="address"> address: </label>
                        {{ $userdata->address}}
                      </div>
                    <div>           <!--  form start -->
                      <label for="education"> education: </label>
                      {{ $userdata->education}}
                    </div>
                      <div>           
                        <label for="hospital_name"> hospital_name: </label>
                        {{ $userdata->hospital_name}}
                      </div>
                    <div>
                      <label for="payment_preference"> payment_preference: </label>
                      {{ $userdata->payment_preference}}
                    </div>
                      <div>           
                         <label for="fee_bmct"> fee_bmct: </label>
                         {{ $userdata->fee_bmct}}
                      </div>
                    <div>           
                        <label for="fee_cash_wallet"> fee_cash_wallet: </label>
                        {{ $userdata->fee_cash_wallet}}
                    </div>
                      <div>           
                        <label for="status"> status: </label>
                        {{ $userdata->status}}
                      </div>
                    <div>           
                      <label for="discount"> discount: </label>
                      {{ $userdata->discount}}
                    </div>
                      <div>           
                        <label for="image"> image: </label>
                        {{ $userdata->image}}
                      </div>
                    <div>          
                      <label for="role"> Rle: </label>
                      {{ $userdata->role}}
                    </div>               
                @endif                
        </div>                      
      </div>
    </div>
                          <!-- /.content -->
                       </div>
         
              </div>
        </div>
        </div>
                @yield('content')
  
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
    </body>
</html>
 





