@extends('layouts.app')

@section('pageCSS')
    <link rel="stylesheet" href="{{asset('css/multi-select.css')}}">
@endsection

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title-box">
                            <h4 class="page-title">角色管理</h4>
                            <ol class="breadcrumb p-0 m-0">
                                <li>
                                    <a href="{{url('/')}}">604信息系统</a>
                                </li>
                                <li>
                                    <a href="#">综合管理</a>
                                </li>
                                <li>
                                    <a href="#">人权管理</a>
                                </li>
                                <li class="active">
                                    角色管理
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
                                <div class="col-lg-12 col-md-12">
                                    <div class="card-box">
                                        <h4 class="header-title m-t-0 m-b-30 text-center">全部权限</h4>
                                        <div class="table-responsive">
                                            <table class="table m-0 table-colored-bordered table-bordered-primary">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>权限名称</th>
                                                    <th>显示名称</th>
                                                    <th>详细介绍</th>
                                                    <th>动作</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($perms as $perm)
                                                        <tr>
                                                            <th scope="row">{{$perm->id}}</th>
                                                            <td>{{$perm->name}}</td>
                                                            <td>{{$perm->display_name}}</td>
                                                            <td>{{$perm->description}}</td>
                                                            <td>
                                                                @include('auth.power.permissions._editPermissionModal')
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if(isset($errorMessage))
                                    <div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <i class="mdi mdi-block-helper"></i><strong>不要！</strong>{{$errorMessage}}
                                    </div>
                                @endif
                                <div class="col-lg-12">
                                    @include('auth.power.roles._createRoleModal')
                                    <h4 class="header-title m-t-0 m-b-30 text-center">全部角色</h4>
                                </div>
                                @foreach($roles as $role)
                                    <div class="col-lg-4">
                                        <div class="panel panel-color panel-success">
                                            <!-- Default panel contents -->
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <h3 class="panel-title" style="margin-top: 5px;">{{$role->display_name}}</h3>
                                                    </div>
                                                    @if($role->name != 'Administrator')
                                                        <div class="col-lg-2">
                                                            @include('auth.power.roles._editRoleModal')
                                                        </div>
                                                        <div class="col-lg-2">
                                                            @include('auth.power.roles._deleteForm')
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="panel-body">
                                                <p>
                                                    {{$role->description}}
                                                </p>
                                            </div>
                                            <!-- Table -->
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>权限显示名称</th>
                                                        <th>权限介绍</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($role->perms as $permission)
                                                        <tr>
                                                            <td>{{$permission->display_name}}</td>
                                                            <td>{{$permission->description}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
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

@section('pageJS')
    <script src="{{asset('js/jquery.multi-select.js')}}"></script>
@endsection
