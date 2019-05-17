<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel - Fontys Alumni</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ URL::asset('public/css/bootstrap.css') }}">
    <link href="{{URL::asset('public/admin/css/admin.css')}}" rel="stylesheet">


    <!-- Custom CSS -->
    <!--     <link rel="stylesheet" href="{{ URL::asset('public/admin/css/sb-admin-2.css') }}"> -->

    <!-- Morris Charts CSS -->
    <!-- <link href="{{URL::asset('public/admin/css/morris.css')}}" rel="stylesheet"> -->

    <!-- Custom Fonts -->
    <!-- <link href="{{URL::asset('public/admin/font-awesome/css/fontawesome.min.css')}}" rel="stylesheet"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->


</head>

<body>

    <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <nav class="navbar navbar-fixed-top" id="sidebar-wrapper" role="navigation">

            <ul class="nav sidebar-nav">
                <li>
                    <a style="padding:20%;">
                        <img src="{{ URL::asset('public/images/logo.png') }}" style="width:100%;">
                    </a>
                </li>

                <!-- <li>
                    <a href="#">
                    AAAAAAAA
                    </a>
                </li> -->


                <li>
                    <a href="{{ url('admin') }}">Dashboard</a>
                </li>
                <li>
                    <a href="{{ url('admin/member') }}" class="dropdown-toggle">Members</span></a>
                </li>
                <li>
                    <a href="{{ url('admin/news') }}" class="dropdown-toggle">News</span></a>
                </li>
                <li>
                    <a href="{{ url('/') }}" class="dropdown-toggle">Back to Main Page</span></a>
                </li>
                <li>
                    <a href="{{ url('/logout') }}" class="dropdown-toggle">Logout</span></a>
                </li>
                <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">News <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-header">News Menu</li>
                        <li><a href="#">Post News</a></li>
                        <li><a href="#">News List</a></li>

                    </ul>
                </li> -->

                <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">News <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-header">Discussions Menu</li>
                        <li><a href="#">Post News</a></li>
                        <li><a href="#">News List</a></li>

                    </ul>
                </li> -->


            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>
            <div class="container">
                <div id="yield-content">
                    @yield('content')
                </div>

            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Navigation -->



    <!-- jQuery -->
    <script src="{{ URL::asset('public/js/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
    <script src="{{ URL::asset('public/admin/js/admin.js') }}"></script>
</body>
@yield('js')


</html>