@extends('layouts.app2')

@section('content2')
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
<!-- HOME -->
<section>
    <div class="container-alt">
        <div class="row">
            <div class="col-sm-12">

                <div class="wrapper-page">

                    <div class="m-t-40 account-pages">
                        <div class="text-center account-logo-box">
                            <h2 class="text-uppercase">
                                <a href="index.html" class="text-success">
                                    <span><img src="{{asset('images/logo.png')}}" alt="" height="36"></span>
                                </a>
                            </h2>
                            <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                        </div>
                        <div class="account-content">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
                                    <div class="form-group ">
                                        <div class="col-xs-12">
                                            <input class="form-control" id="login" name="login" type="text" required="" placeholder="姓名/邮箱/学号" value="{{ old('login') }}" autofocus>
                                            @if ($errors->has('login'))
                                                <span class="help-block"><strong>{{ $errors->first('login') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input class="form-control" id="password" name="password" type="password" required="" placeholder="密码">
                                            @if ($errors->has('password'))
                                                <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-xs-12">
                                        <div class="checkbox checkbox-success">
                                            <input id="checkbox-signup" name="remember" type="checkbox"  {{ old('remember') ? 'checked' : ''}}>
                                            <label for="checkbox-signup">
                                                记住我！ヾ(^▽^*)))
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group text-center m-t-30">
                                    <div class="col-sm-12">
                                        <a href="{{ url('/password/reset') }}" class="text-muted"><i class="fa fa-lock m-r-5"></i>忘记密码ヽ(≧□≦)ノ</a>
                                    </div>
                                </div>

                                <div class="form-group account-btn text-center m-t-10">
                                    <div class="col-xs-12">
                                        <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit">登录</button>
                                    </div>
                                </div>

                            </form>

                            <div class="clearfix"></div>

                        </div>
                    </div>
                    <!-- end card-box-->
                </div>
                <!-- end wrapper -->

            </div>
        </div>
    </div>
</section>
<!-- END HOME -->

@endsection

