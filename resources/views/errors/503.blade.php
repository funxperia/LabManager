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
                    <h1 style="font-size: 78px;">503</h1>
                    <h3 class="text-uppercase text-danger">系统正在维护</h3>
                    <p class="text-muted">系统正在维护，请您稍后再来！/p>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- END HOME -->
@endsection
