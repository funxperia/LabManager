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
            <div class="col-sm-12 text-center">

                <div class="wrapper-page">
                    <img src="{{asset('images/animat-customize-color.gif')}}" alt="" height="120">
                    <h1 style="font-size: 78px;">500</h1>
                    <h3 class="text-uppercase text-danger">请求错误</h3>
                    <p class="text-muted">请刷新您的页面，或者联系我们<a href="extras-contact.html" class="text-primary">支持！</a></p>

                    <a class="btn btn-success waves-effect waves-light m-t-20" href="{{url('/')}}">返回首页</a>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- END HOME -->
@endsection