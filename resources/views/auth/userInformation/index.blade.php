@extends('layouts.app')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title-box">
                            <h4 class="page-title">个人信息</h4>
                            <ol class="breadcrumb p-0 m-0">
                                <li>
                                    <a href="{{url('/')}}">604信息系统</a>
                                </li>
                                <li>
                                    <a href="#">个人中心</a>
                                </li>
                                <li class="active">
                                    个人信息
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    <div class="text-center card-box">
                                        <div class="member-card">
                                            @foreach($infos as $info)
                                            <div class="thumb-xl member-thumb m-b-10 center-block">
                                                <img src="{{asset('images/users/avatar-1.jpg')}}" class="img-circle img-thumbnail" alt="profile-image">
                                            </div>

                                            <div class="">
                                                <h4 class="m-b-5">{{$user->name}}</h4>
                                                <p class="text-muted">{{ $info->direction}}</p>
                                            </div>

                                            <p class="text-muted font-13 m-t-20">
                                                <strong>个性签名：</strong><br>
                                                {{$info->autograph}}
                                            </p>

                                            <p class="text-muted font-13 m-t-20">
                                                <strong>自我介绍：</strong><br>
                                                {{$info->description}}
                                            </p>
                                            <hr/>

                                            <div class="text-left">
                                                <p class="text-muted font-13"><strong>学号：</strong> <span class="m-l-15">{{$user->sid}}</span></p>

                                                <p class="text-muted font-13"><strong>电话：</strong><span class="m-l-15">{{$info->phone}}</span></p>

                                                <p class="text-muted font-13"><strong>邮箱：</strong> <span class="m-l-15">{{$user->email}}</span></p>

                                                <p class="text-muted font-13"><strong>QQ号：</strong> <span class="m-l-15">{{$info->qq}}</span></p>

                                                <p class="text-muted font-13"><strong>性别：</strong><span class="m-l-15">{{$info->sex}}</span></p>

                                                <p class="text-muted font-13"><strong>生日：</strong><span class="m-l-15">{{$info->birthday}}</span></p>

                                                <p class="text-muted font-13"><strong>身份证：</strong><span class="m-l-15">{{$info->IDnumber}}</span></p>

                                                <p class="text-muted font-13"><strong>民族：</strong><span class="m-l-15">{{$info->nation}}</span></p>

                                                <p class="text-muted font-13"><strong>学院：</strong><span class="m-l-15">{{$info->college}}</span></p>

                                                <p class="text-muted font-13"><strong>专业：</strong><span class="m-l-15">{{$info->major}}</span></p>

                                                <p class="text-muted font-13"><strong>班级：</strong><span class="m-l-15">{{$info->class}}</span></p>

                                                <p class="text-muted font-13"><strong>培养层次：</strong><span class="m-l-15">{{$info->category}}</span></p>

                                                <p class="text-muted font-13"><strong>入学时间：</strong><span class="m-l-15">{{$info->enrollment}}</span></p>
                                            </div>
                                            @endforeach
                                        </div>
                                        @include('auth.userInformation._editSelfInformationModal')
                                    </div> <!-- end card-box -->
                                </div> <!-- end col -->

                                <div class="col-lg-9 col-md-8">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-6">
                                            <h4>我的收藏</h4>

                                            <div class=" p-t-10">
                                                <h5 class="text-custom m-b-5">文章</h5>
                                                {{--替换为Tablesaw Table中的Sortable Table--}}
                                                <p class="m-b-0">websitename.com</p>
                                                <p><b>2010-2015</b></p>

                                                <p class="text-muted font-13 m-b-0">Lorem Ipsum is simply dummy text
                                                    of the printing and typesetting industry. Lorem Ipsum has
                                                    been the industry's standard dummy text ever since the
                                                    1500s, when an unknown printer took a galley of type and
                                                    scrambled it to make a type specimen book.
                                                </p>
                                            </div>

                                            <hr/>

                                            <div class="">
                                                <h5 class="text-custom m-b-5">问答</h5>
                                                {{--替换为Tablesaw Table中的Sortable Table--}}
                                                <p class="m-b-0">coderthemes.com</p>
                                                <p><b>2007-2009</b></p>

                                                <p class="text-muted font-13">Lorem Ipsum is simply dummy text
                                                    of the printing and typesetting industry. Lorem Ipsum has
                                                    been the industry's standard dummy text ever since the
                                                    1500s, when an unknown printer took a galley of type and
                                                    scrambled it to make a type specimen book.
                                                </p>
                                            </div>
                                        </div> <!-- end col -->

                                        <div class="col-md-4 col-sm-6">
                                            <h4>我的关注</h4>

                                            <div class="inbox-widget">
                                                <a href="#">
                                                    <div class="inbox-item">
                                                        <div class="inbox-item-img"><img src="{{asset('images/users/avatar-2.jpg')}}" class="img-circle" alt=""></div>
                                                        <p class="inbox-item-author">Tomaslau</p>
                                                        <p class="inbox-item-text">I've finished it! See you so...</p>
                                                        <p class="inbox-item-date">
                                                            <button type="button" class="btn btn-xs btn-success">Follow</button>
                                                        </p>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="inbox-item">
                                                        <div class="inbox-item-img"><img src="{{asset('images/users/avatar-3.jpg')}}" class="img-circle" alt=""></div>
                                                        <p class="inbox-item-author">Stillnotdavid</p>
                                                        <p class="inbox-item-text">This theme is awesome!</p>
                                                        <p class="inbox-item-date">
                                                            <button type="button" class="btn btn-xs btn-danger">Unfollow</button>
                                                        </p>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="inbox-item">
                                                        <div class="inbox-item-img"><img src="{{asset('images/users/avatar-4.jpg')}}" class="img-circle" alt=""></div>
                                                        <p class="inbox-item-author">Kurafire</p>
                                                        <p class="inbox-item-text">Nice to meet you</p>
                                                        <p class="inbox-item-date">
                                                            <button type="button" class="btn btn-xs btn-success">Follow</button>
                                                        </p>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="inbox-item">
                                                        <div class="inbox-item-img"><img src="{{asset('images/users/avatar-5.jpg')}}" class="img-circle" alt=""></div>
                                                        <p class="inbox-item-author">Shahedk</p>
                                                        <p class="inbox-item-text">Hey! there I'm available...</p>
                                                        <p class="inbox-item-date">
                                                            <button type="button" class="btn btn-xs btn-success">Follow</button>
                                                        </p>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="inbox-item">
                                                        <div class="inbox-item-img"><img src="{{asset('images/users/avatar-6.jpg')}}" class="img-circle" alt=""></div>
                                                        <p class="inbox-item-author">Adhamdannaway</p>
                                                        <p class="inbox-item-text">This theme is awesome!</p>
                                                        <p class="inbox-item-date">
                                                            <button type="button" class="btn btn-xs btn-success">Follow</button>
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>

                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <h4 class="m-t-30">我的项目</h4>

                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <div class=" thumb">
                                                <a href="#" class="image-popup" title="Screenshot-1">
                                                    <img src="{{asset('images/shots/shot-1.png')}}" class="thumb-img" alt="work-thumbnail">
                                                </a>
                                                <div class="gal-detail">
                                                    <h4>Travel Guide</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-6">
                                            <div class=" thumb">
                                                <a href="#" title="Screenshot-2">
                                                    <img src="{{asset('images/shots/shot-2.png')}}" class="thumb-img" alt="work-thumbnail">
                                                </a>
                                                <div class="gal-detail">
                                                    <h4>Interval timer (app concept)</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-6">
                                            <div class=" thumb">
                                                <a href="#" class="image-popup" title="Screenshot-3">
                                                    <img src="{{asset('images/shots/shot-3.png')}}" class="thumb-img" alt="work-thumbnail">
                                                </a>
                                                <div class="gal-detail">
                                                    <h4>Ecommerce app</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer text-right">
            2017 © DXH
        </footer>
    </div>
@endsection