<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="安阳工学院计算机科学与信息工程学院604信息技术实验室信息系统">
    <meta name="author" content="邓鑫昊14031010205">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <!-- App title -->
    <title>LAB-604</title>

    @yield('pageCSS')

            <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{asset('css/morris.css')}}">

    <!-- App css -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/components.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/pages.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/menu.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/switchery.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/core.css')}}" rel="stylesheet" type="text/css" />



    <script src="{{asset('js/modernizr.min.js')}}"></script>

    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="fixed-left">

<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="spinner-wrapper">
                <div class="rotator">
                    <div class="inner-spin"></div>
                    <div class="inner-spin"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="{{url('/')}}" class="logo"><span>604<span>信息系统</span></span><i class="mdi mdi-cube"></i></a>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">

                <!-- Navbar-left -->
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <button class="button-menu-mobile open-left waves-effect waves-light">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                    <li class="hidden-xs">
                        <form role="search" class="app-search">
                            <input type="text" placeholder="Search..." class="form-control">
                            <a href="#"><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                </ul>

                <!-- Right(Notification) -->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                            <i class="mdi mdi-bell"></i>
                            <span class="badge up bg-primary">4</span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                            <li>
                                <h5>Notifications</h5>
                            </li>
                            <li>
                                <a href="#" class="user-list-item">
                                    <div class="icon bg-info">
                                        <i class="mdi mdi-account"></i>
                                    </div>
                                    <div class="user-desc">
                                        <span class="name">New Signup</span>
                                        <span class="time">5 hours ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="all-msgs text-center">
                                <p class="m-0"><a href="#">See all Notification</a></p>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                            <i class="mdi mdi-email"></i>
                            <span class="badge up bg-danger">8</span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                            <li>
                                <h5>Messages</h5>
                            </li>
                            <li>
                                <a href="#" class="user-list-item">
                                    <div class="avatar">
                                        <img src="{{asset('images/users/avatar-2.jpg')}}" alt="">
                                    </div>
                                    <div class="user-desc">
                                        <span class="name">Patricia Beach</span>
                                        <span class="desc">There are new settings available</span>
                                        <span class="time">2 hours ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="all-msgs text-center">
                                <p class="m-0"><a href="#">See all Messages</a></p>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown user-box">
                        <a href="" class="dropdown-toggle waves-effect waves-light user-link" data-toggle="dropdown" aria-expanded="true">
                            <img src="{{asset('images/users/avatar-1.jpg')}}" alt="user-img" class="img-circle user-img">
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                            <li>
                                <h5>Hi, {{Auth::user()->name }}</h5>
                            </li>
                            <li><a href="{{url('/user/selfInfo')}}"><i class="ti-user m-r-5"></i>个人信息</a></li>
                            @permission('Private_Letter')
                            <li><a href="{{url('/')}}">私信</a></li>
                            @endpermission
                            <li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ti-power-off m-r-5"></i> 登出</a></li>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        </ul>
                    </li>

                </ul> <!-- end navbar-right -->

            </div><!-- end container -->
        </div><!-- end navbar -->
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <div class="user-details">
                    <div class="overlay"></div>
                    <div class="text-center">
                        <img src="{{asset('images/users/avatar-1.jpg')}}" alt="" class="thumb-md img-circle">
                    </div>
                    <div class="user-info">
                        <div>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{Auth::user()->name}}</a>
                        </div>
                    </div>
                </div>

                <ul>
                    <li class="menu-title">分类</li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect active"><i class="mdi mdi-view-dashboard"></i><span>统计</span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{url('/')}}">全站统计</a></li>
                            <li><a href="{{url('/')}}">我的统计</a></li>
                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-blogger"></i><span>博客</span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{url('/')}}">撰写文章</a></li>
                            <li><a href="{{url('/')}}">我的博客</a></li>
                            <li><a href="{{url('/')}}">博客设置</a></li>
                            <li><a href="{{url('/')}}">最新文章</a></li>
                            <li><a href="{{url('/')}}">精品文章</a></li>
                            <li><a href="{{url('/')}}">全部文章</a></li>
                            <li><a href="{{url('/')}}">精品博客</a></li>
                            <li><a href="{{url('/')}}">全部博客</a></li>
                            @permission('Blog_Manage')
                            <a href="javascript:void(0)" class="waves-effect"><span>博客管理</span><span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{url('/')}}">删除文章</a></li>
                                <li><a href="{{url('/')}}">设置精品</a></li>
                                <li><a href="{{url('/')}}">标签管理</a></li>
                            </ul>
                            @endpermission
                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-comment-question-outline"></i><span>问答</span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{url('/')}}">最新问题</a></li>
                            <li><a href="{{url('/')}}">话题关注</a></li>
                            <li><a href="{{url('/')}}">全部话题</a></li>
                            <li><a href="{{url('/')}}">我的提问</a></li>
                            <li><a href="{{url('/')}}">我的回答</a></li>
                            <li><a href="{{url('/')}}">问题设置</a></li>
                            @permission('Question_Manage')
                            <a href="javascript:void(0)" class="waves-effect"><span>问答管理</span><span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{url('/')}}">删除问题</a></li>
                                <li><a href="{{url('/')}}">设置精品</a></li>
                                <li><a href="{{url('/')}}">话题管理</a></li>
                                <li><a href="{{url('/')}}">标签管理</a></li>
                            </ul>
                            @endpermission
                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-text"></i><span>项目管理</span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{url('/')}}">所有项目</a></li>
                            <li><a href="{{url('/')}}">所有任务</a></li>
                            <li><a href="{{url('/')}}">我的项目</a></li>
                            <li><a href="{{url('/')}}">我的任务</a></li>
                            <li><a href="{{url('/')}}">图表统计</a></li>
                            @permission('Project_Manage_pl')
                            <a href="javascript:void(0)" class="waves-effect"><span>项目管理</span><span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{url('/')}}">管理项目</a></li>
                                <li><a href="{{url('/')}}">管理任务</a></li>
                                <li><a href="{{url('/')}}">管理人员</a></li>
                                <li><a href="{{url('/')}}">管理进度</a></li>
                            @permission('Project_Manage_All')
                                <li><a href="{{url('/')}}">发布项目</a></li>
                                <li><a href="{{url('/')}}">编辑项目</a></li>
                            @endpermission
                            </ul>
                            @endpermission
                        </ul>
                    </li>

                    <li>
                        <a href="{{url('/')}}" class="waves-effect"><i class="mdi mdi-calendar"></i><span>日历</span></a>
                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-box"></i><span>个人中心</span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{url('/user/selfInfo')}}">个人信息</a></li>
                            <li><a href="{{url('/')}}">个人设置</a></li>
                            <li><a href="{{url('/')}}">签到</a></li>
                            <li><a href="{{url('/')}}">请假</a></li>
                            <li><a href="{{url('/')}}">集资</a></li>
                        </ul>
                    </li>

                    @permission('Lab_Manage')
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-settings-box"></i><span>综合管理</span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            @permission('Sign_In_Manage')
                            <li><a href="{{url('/')}}">签到管理</a></li>
                            @endpermission
                            @permission('Sanitation_Manage')
                            <li><a href="{{url('/')}}">卫生管理</a></li>
                            @endpermission
                            @permission('Water_Manage')
                            <li><a href="{{url('/')}}">搬水管理</a></li>
                            @endpermission
                            @permission('Consumable_Manage')
                            <li><a href="{{url('/')}}">耗材管理</a></li>
                            @endpermission
                            @permission('Activity_Manage')
                            <li><a href="{{url('/')}}">活动管理</a></li>
                            @endpermission
                            @permission('Interview_Manage')
                            <li><a href="{{url('/')}}">面试管理</a></li>
                            @endpermission
                            @permission('Human_Rights_Manage')
                            <a href="javascript:void(0)" class="waves-effect"><span>人权管理</span><span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{url('/admin/users')}}">人员管理</a></li>
                                <li><a href="{{url('/admin/users/trash')}}">人员回收站</a></li>
                                <li><a href="{{url('/admin/roles')}}">角色管理</a></li>
                            </ul>
                            @endpermission
                            @permission('Inform_Manage')
                            <li><a href="{{url('/')}}">通知</a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission

                    <li class="menu-title">Extra...</li>

                </ul>
            </div>
            <!-- Sidebar -->
            <div class="clearfix"></div>

            <div class="help-box">
                <h5 class="text-muted m-t-0">For Help ?</h5>
                <p class=""><span class="text-dark"><b>Email:</b></span><br/> 526266606 @ qq.com</p>
                <p class="m-b-0"><span class="text-dark"><b>Call:</b></span>(+86)17839192933<br/></p>
            </div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    @yield('content')
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
</div>
<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/detect.js')}}"></script>
<script src="{{asset('js/fastclick.js')}}"></script>
<script src="{{asset('js/jquery.blockUI.js')}}"></script>
<script src="{{asset('js/waves.js')}}"></script>
<script src="{{asset('js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('js/switchery.min.js')}}"></script>

@yield('pageJS')
<!-- Counter js  -->
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('js/jquery.counterup.min.js')}}"></script>

<!--Morris Chart-->
<script src="{{asset('js/morris.min.js')}}"></script>
<script src="{{asset('js/raphael-min.js')}}"></script>

<!-- Dashboard init -->
<script src="{{asset('js/jquery.dashboard.js')}}"></script>

<!-- App js -->
<script src="{{asset('js/jquery.core.js')}}"></script>
<script src="{{asset('js/jquery.app.js')}}"></script>


</body>
</html>
