 <!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo"><b>ADMIN</b>LTE</a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
               <!-- /.messages-menu -->

                <!-- Notifications Menu -->
               
                <!-- Tasks Menu -->
                              <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                   <a href="{{route('logout')}}" >logout</a>
 
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
                            <p>
                                ROBIN
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                      
                        <!-- Menu Body -->
                      
                        <!-- Menu Footer-->
                        
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>