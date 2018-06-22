<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Mandate App -  @yield('title')</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Animation library for notifications   -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('css/paper-dashboard.css') }}" rel="stylesheet">


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">


</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{ url('/') }} " class="simple-text">
                <img class="avatar border-white" src="{{ asset('img/lfc_small.png') }}" alt="..." />
                    Mandate App
                </a>
            </div>

            <ul class="nav">
                <li class="{{{ Request::path() == 'home' ? 'active' : '' }}}">
                    <a href="{{ url('/home') }}">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="{{{ Request::path() == 'home/profile' ? 'active' : '' }}}">
                    <a href="{{ url('/home/profile') }}">
                        <i class="ti-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li class="{{{ Request::path() == 'team' ? 'active' : '' }}}">
                    <a href="{{ url('/team') }}">
                    <i class="ti-view-list-alt"></i>
                        <p>Team</p>
                    </a>
                </li>
                <li class="{{{ Request::path() == 'newconvert' ? 'active' : '' }}}">
                    <a href="{{ url('/newconvert') }}">
                    <i class="ti-heart"></i>
                        <p>New Convert</p>
                    </a>
                </li>
                <li class="{{{ Request::path() == 'testimony' ? 'active' : '' }}}">
                <a href="{{ url('testimony') }}">
                    <i class="ti-text"></i>
                        <p>Testimony</p>
                    </a>
                </li>
                <li class="{{{ Request::path() == 'announcement' ? 'active' : '' }}}">
                <a href="{{ url('/announcement') }}">
                    <i class="ti-pencil-alt2"></i>
                        <p>Announcements</p>
                    </a>
                </li>
                
                <li class="{{{ Request::path() == 'homecell' ? 'active' : '' }}}">
                <a href="{{ url('/homecell') }}">
                    <i class="ti-bell"></i>
                        <p>Home Cell</p>
                    </a>
                </li>
				<li class="active-pro">
                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="ti-export"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">@yield('title')</a>

                    
                </div>
                
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ url('home/profile') }}" >
                                <i class="ti-panel"></i>
								<p>{{ Auth::user()->firstname.' '.Auth::user()->surname }}</p>
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
						<li>
                            <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
								<i class="ti-lock"></i>
								<p>{{ __('Logout') }}</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
            @yield('content')
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.lfcww.org">
                                For Living Faith Church Worldwide Digital Evangelism Campaign
                            </a>
                        </li>
                        
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.kingnonso.com">King Nonso</a>
                </div>
            </div>
        </footer>

    </div>
</div>


</body>
    <!--   Core JS Files   -->
    <script src="{{ asset('js/jquery-1.10.2.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>

	<!--  Checkbox, Radio & Switch Plugins -->
    <script src="{{ asset('js/bootstrap-checkbox-radio.js') }}" ></script>


    <!--  Notifications Plugin    -->
    <script src="{{ asset('js/bootstrap-notify.js') }}" ></script>


    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="{{ asset('js/paper-dashboard.js') }}" ></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('js/demo.js') }}" ></script>


@foreach($errors->all() as $error)
	<script type="text/javascript">
    	$(document).ready(function(){
        	$.notify({
            	icon: 'ti-face-sad',
            	message: "Ummm... <b>Oops...</b> <br/> - {{ $error }}."

            },{
                type: 'danger',
                timer: 4000
            });

    	});
	</script>
@endforeach

@if(Session::has('message'))
    <script type="text/javascript">
    	$(document).ready(function(){
        	$.notify({
            	icon: 'ti-gift',
            	message: "Done... <b>Successfully</b> <br/> - {{ Session::get('message') }}."

            },{
                type: 'success',
                timer: 4000
            });

    	});
	</script>
@endif

</html>
