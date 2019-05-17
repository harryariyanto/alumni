   <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin 2 - Bootstrap Admin Theme</title>
        
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="{{ URL::asset('public/css/bootstrap.css') }}">


        <!-- MetisMenu CSS -->
        <!-- <link href="{{URL::asset('public/admin/css/metisMenu.css')}}" rel="stylesheet"> -->
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
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
        <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->


    </head>

    <body>

    <div class="container col-lg-12" style=" margin-top:10%;">
        <div class="row" >
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>

                                <!-- Change this to a button or input when using this as a form -->
                                <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ URL::asset('public/js/jquery.min.js') }}"></script>


<!-- Bootstrap Core JavaScript -->
<script src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>


<script src="{{ URL::asset('public/admin/js/admin.js') }}"></script>






</body>

</html>
