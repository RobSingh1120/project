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
                   @include('admin.partial.header')
                     @include('admin.partial.sidebar')
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
          <section class="content-header">
                <h3>User Lists
              </section>
        <div>
        <form action="#" method="get" role = "search">

                    {{ csrf_field() }}             
                     <input type="text" name="search"  placeholder="search">          
                    
  
                <select name="selectrole">
                  <option value = "" >Select Role </option>
                  <option value = "1" >admin</option>
                  <option value='2'>Doctor</option>
                  <option value='3'>Laboratory</option>
                  <option value='4'>Patient</option>
                  <option value='5'>Pharmacist</option>
                </select>   
                 <input type="submit" value="search" class="btn-primary">         
             

            </form>
             </div>
<div class="box-body table-responsive no-padding">
                <table class="table table-hover" id="mytable">
                    <thead>
                      <tr>
                         <th>S.No</th>
                         <th>Name</th>
                         <th>Email</th>
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
                               @if($row->role == 1)
                                <td>{{'Admin'}}</td>
                              @elseif($row->role == 2)
                                <td>{{'Doctor'}}</td>
                              @elseif($row->role == 3)
                                <td>{{'Laboratory'}}</td>
                              @elseif($row->role == 4)
                                <td>{{'Patient'}}</td>
                              @elseif($row->role == 5)
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
