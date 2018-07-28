<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GodLife App -  @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link href="{{ asset('css/adminlte/AdminLTE.min.css') }}" rel="stylesheet" type="text/css">
    <!-- AdminLTE Skin -->
    <link href="{{ asset('css/adminlte/skins/_all-skins.css') }}" rel="stylesheet" type="text/css">

    @yield('cssPlugins')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<header class="main-header">
<!-- Logo -->
<a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>G</b>LA</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>GodLife</b> App</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
<!-- Sidebar toggle button-->
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
</a>

<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
<!-- Messages: style can be found in dropdown.less-->
<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{ asset('img/adminlte/user2-160x160.jpg') }}" class="user-image" alt="User Image">
        <span class="hidden-xs">{{ Auth::user()->firstname.' '.Auth::user()->surname }}</span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="{{ asset('img/adminlte/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

            <p>
                {{ Auth::user()->firstname.' '.Auth::user()->surname }}

            </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
            <div class="row">
                <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                </div>
            </div>
            <!-- /.row -->
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </div>
        </li>
    </ul>
</li>
<!-- Control Sidebar Toggle Button -->
<li>
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault();    document.getElementById('logout-form').submit();" title="Logout">
        <i class="fa fa-sign-out"></i>
    </a>

</li>

</ul>
</div>
</nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('img/adminlte/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->firstname.' '.Auth::user()->surname }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php
            $uri            = Request::path();
            $url_exploded   = explode('/',$uri);
            $url_two = (isset($url_exploded[1]) ? $url_exploded[1] : '');
            $last_array     = last($url_exploded);
        ?>

        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{{ $uri == 'admin' ? 'active' : '' }}}">
                <a href="{{ url('/admin') }} ">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview {{{ $uri == 'announcement' ? 'active' : '' }}}">
                <a href="{{ url('/announcement') }}">
                    <i class="fa fa-th"></i>
                    <span>Announcements</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{{ $uri == 'announcement' ? 'active' : '' }}}"><a href="{{ url('/announcement') }}"><i class="fa fa-circle-o"></i> All Announcements</a></li>
                    <li class="{{{ $uri == 'announcement/create' ? 'active' : '' }}}"><a href="{{ url('/announcement/create') }}"><i class="fa fa-circle-o"></i> Create Announcement</a></li>
                </ul>
            </li>
            <li class="treeview {{{ $url_exploded[0] == 'testimony' ? 'active' : '' }}}">
                <a href="{{ url('/testimony') }}">
                    <i class="fa fa-edit"></i> <span>Testimonies</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{{ $uri == 'testimony' ? 'active' : '' }}}"><a href="{{ url('/testimony') }}"><i class="fa fa-circle-o"></i> All Testimonies</a></li>
                    <li class="{{{ $uri == 'testimony/create' ? 'active' : '' }}}"><a href="{{ url('/testimony/create') }}"><i class="fa fa-circle-o"></i> Create New Testimony</a></li>
                </ul>
            </li>
            <li class="treeview {{{ $url_two == 'user' ? 'active' : '' }}}">
                <a href="{{ url('admin/user') }}">
                    <i class="fa fa-table"></i> <span>Users</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{{ $uri == 'admin/user' ? 'active' : '' }}}"><a href="{{ url('admin/user') }}"><i class="fa fa-circle-o"></i> All Users</a></li>
                    <li class="{{{ $uri == 'admin/user/team-leaders' ? 'active' : '' }}}"><a href="{{ url('admin/user/team-leaders') }}"><i class="fa fa-circle-o"></i> Team Leaders</a></li>
                    <li class="{{{ $uri == 'admin/user/home-cell-exco' ? 'active' : '' }}}"><a href="{{ url('admin/user/home-cell-exco') }}"><i class="fa fa-circle-o"></i> Home Cell Executives</a></li>
                    <li class="{{{ $uri == 'admin/user/new-converts' ? 'active' : '' }}}"><a href="{{ url('admin/user/new-converts') }}"><i class="fa fa-circle-o"></i> New Converts</a></li>
                    <li class="{{{ $uri == 'admin/user/church-admin' ? 'active' : '' }}}"><a href="{{ url('admin/user/church-admin') }}"><i class="fa fa-circle-o"></i> Church Admins</a></li>
                </ul>
            </li>
            <li class="treeview {{{ $url_exploded[0] == 'homecell' ? 'active' : '' }}}">
                <a href="{{ url('/homecell') }}">
                    <i class="fa fa-folder"></i> <span>Home Cells</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{{ $uri == 'homecell' ? 'active' : '' }}}"><a href="{{ url('/homecell') }}"><i class="fa fa-circle-o"></i> All Home Cells</a></li>
                    <li class="{{{ $uri == 'homecell/create' ? 'active' : '' }}}"><a href="{{ url('/homecell/create') }}"><i class="fa fa-circle-o"></i> Create New Home Cells</a></li>
                </ul>
            </li>



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @yield('title')
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <?php $val_url = ''?>
            <li><a href="{{asset('/')}}"><i class="fa fa-dashboard"></i> HOME</a></li>
            @if(isset($url_exploded) && count($url_exploded)>0)
            @foreach ($url_exploded as $val)
            <?php $val_url .= $val ?>
            @if($last_array!=$val)
            <li>
                <a href="{{ asset($val_url) }}">
                    {{ ucfirst($val) }}
                </a>
            </li>
            @else
            <li class="active">{{ ucfirst($val) }}</li>
            @endif
            <?php $val_url .= '/'?>
            @endforeach
            @endif
        </ol>
        <br/>
        <div class="row">
            <div class="col-sm-12">


                @if($errors->all())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                    {{ Session::get('message') }}

                </div>
                @endif

                @if(isset($info))
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-info"></i> Alert!</h4>
                    {{ $info }}
                </div>
                @endif


            </div>
        </div>

    </section>
    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>

</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>For</b> The God Life Assembly International
    </div>
    <strong>&copy; <script>document.write(new Date().getFullYear())</script></strong>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.kingnonso.com">King Nonso</a>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                            <p>Will be 23 on April 24th</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-user bg-yellow"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                            <p>New phone +1(800)555-1234</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                            <p>nora@example.com</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-file-code-o bg-green"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                            <p>Execution time 5 seconds</p>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Custom Template Design
                            <span class="label label-danger pull-right">70%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Update Resume
                            <span class="label label-success pull-right">95%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Laravel Integration
                            <span class="label label-warning pull-right">50%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Back End Framework
                            <span class="label label-primary pull-right">68%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Some information about this general settings option
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Other sets of options are available
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Allow the user to show his name in blog posts
                    </p>
                </div>
                <!-- /.form-group -->

                <h3 class="control-sidebar-heading">Chat Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right">
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                </div>
                <!-- /.form-group -->
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="{{ asset('plugins/jQuery/jQuery-2.2.0.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('js/bootstrap.min.js') }}" ></script>

@yield('jsPlugins')

<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte/app.min.js') }}" ></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('js/adminlte/pages/dashboard.js') }}" ></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('js/adminlte/demo.js') }}" ></script>
</body>
</html>
