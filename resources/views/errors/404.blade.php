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
                            <img src="{{asset('images/animat-search-color.gif')}}" alt="" height="120">
                            <h2 class="text-uppercase text-danger">页面未找到</h2>
                            <p class="text-muted">看起来你可能进错了页面。不必担心，您可能需要检查您的Internet连接，亦或者返回首页后联系我们回报错误。</p>

                            <a class="btn btn-success waves-effect waves-light m-t-20" href="{{'/'}}">回首页</a>
                        </div>

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->
@endsection