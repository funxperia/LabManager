@extends('layouts.app')

@section('pageCSS')
    <link rel="stylesheet" href="{{asset('css/sweet-alert.css')}}">
    <link rel="stylesheet" href="{{asset('css/multi-select.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.steps.css')}}">
@endsection

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title-box">
                            <h4 class="page-title">人员管理</h4>
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
                                    人员管理
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        @include('auth.users._createUserModal')
                        <div style="margin-top: 10px;"></div>
                        <div class="card-box">
                            @if(session('message'))
                                @if(session('message')=='修改成功' || session('message')=='创建成功' || session('message')=='软删除成功')
                                    <div class="alert alert-icon alert-success alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <i class="mdi mdi-check-all"></i><strong>Well done!</strong>{{session('message')}}
                                    </div>
                                @endif
                                @if(session('message')=='修改失败' || session('message')=='创建失败' || session('message')=='软删除失败')
                                    <div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <i class="mdi mdi-block-helper"></i><strong>Oh!</strong>{{session('message')}}
                                    </div>
                                @endif
                            @endif
                            <h4 class="text-purple">注释：<i class="fa fa-edit"></i>为编辑信息，<i class="fa fa-lock"></i>为更改密码，<i class="fa fa-balance-scale"></i>为赋予权限，<i class="fa fa-trash-o"></i>为软删除用户</h4>
                            <div class="table-responsive">
                                <table class="table m-0 table-colored table-primary">
                                    <thead>
                                    <tr>
                                        <th>姓名</th>
                                        <th>学号</th>
                                        <th>邮箱</th>
                                        <th>身份</th>
                                        <th>状态</th>
                                        <th>动作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->sid}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                <select name="hasRole" id="hasRole">
                                                    @foreach($roles as $role)
                                                        @if($user->hasRole($role->name))
                                                            <option value="{{$role->display_name}}">{{$role->display_name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>{{$user->status}}</td>
                                            <td class="actions">
                                                @include('auth.users._editUserModal')
                                                @include('auth.users._editPasswordModal')
                                                @include('auth.users._editRoleModal')
                                                @if(!($user->hasRole('Administrator')))
                                                    <button class="btn btn-warning waves-effect waves-light btn-sm" id="warning-alert-user-{{$user->id}}"><i class="fa fa-trash-o"></i></button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
    <script src="{{asset('js/jquery.steps.min.js')}}"></script>
    <script src="{{asset('js/jquery.wizard-init.js')}}"></script>
    <script src="{{asset('js/jquery.multi-select.js')}}"></script>
    <script src="{{asset('js/sweet-alert.min.js')}}"></script>
    <script>
    /**
     * Theme: Zircos Admin Template
     * Author: Coderthemes
     * SweetAlert
     */

    !function ($) {
        "use strict";

        var SweetAlert = function () {
        };

        //examples
        SweetAlert.prototype.init = function () {

            //Basic
            $('#sa-basic').click(function () {
                swal("Here's a message!");
            });

            //A title with a text under
            $('#sa-title').click(function () {
                swal("Here's a message!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat, tincidunt vitae ipsum et, pellentesque maximus enim. Mauris eleifend ex semper, lobortis purus sed, pharetra felis")
            });

            //Success Message
            $('#sa-success').click(function () {
                swal("Good job!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat, tincidunt vitae ipsum et, pellentesque maximus enim. Mauris eleifend ex semper, lobortis purus sed, pharetra felis", "success")
            });

            //Warning Message
            $('#sa-warning').click(function () {
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-warning',
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                }, function () {
                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                });
            });

            //Parameter
            $('#sa-params').click(function () {
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function (isConfirm) {
                    if (isConfirm) {
                        swal("Deleted!", "Your imaginary file has been deleted.", "success");
                    } else {
                        swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                });
            });

            //Custom Image
            /*$('#sa-image').click(function () {
                swal({
                    title: "Sweet!",
                    text: "Here's a custom image.",
                    imageUrl: "../plugins/bootstrap-sweetalert/thumbs-up.jpg"
                });
            });*/

            //Auto Close Timer
            /*$('#sa-close').click(function () {
                swal({
                    title: "Auto close alert!",
                    text: "I will close in 2 seconds.",
                    timer: 2000,
                    showConfirmButton: false
                });
            });*/

            //Primary
            /*$('#primary-alert').click(function () {
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "info",
                    showCancelButton: true,
                    cancelButtonClass: 'btn-default btn-md waves-effect',
                    confirmButtonClass: 'btn-primary btn-md waves-effect waves-light',
                    confirmButtonText: 'Primary!'
                });
            });
*/
            //Info
            /*$('#info-alert').click(function () {
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "info",
                    showCancelButton: true,
                    cancelButtonClass: 'btn-default btn-md waves-effect',
                    confirmButtonClass: 'btn-info btn-md waves-effect waves-light',
                    confirmButtonText: 'Info!'
                });
            });*/

            //Success
            /*$('#success-alert').click(function () {
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "success",
                    showCancelButton: true,
                    cancelButtonClass: 'btn-default btn-md waves-effect',
                    confirmButtonClass: 'btn-success btn-md waves-effect waves-light',
                    confirmButtonText: 'Success!'
                });
            });*/

            //Warning
            @foreach($users as $user)
                $('#warning-alert-user-{{$user->id}}').click(function () {
                    swal({
                        title: "你确定么?",
                        text: "你将软删除该用户，可以在用户回收站中恢复或永久删除！",
                        type: "warning",
                        showCancelButton: true,
                        cancelButtonClass: 'btn-default btn-md waves-effect',
                        confirmButtonClass: 'btn-warning btn-md waves-effect waves-light',
                        confirmButtonText: '软删除!'
                    },function (){
                        $.ajax({
                            type: "delete",
                            url: "users/{{$user->id}}",
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                    }).done(function(data) {
                        location.reload(true);
                        swal("操作成功!", "已成功软删除数据！", "success");
                    }).error(function(data) {
                        swal("OMG", "软删除操作失败了!", "error");
                    });
                    });
                });
            @endforeach
            //Danger
            /*$('#danger-alert').click(function () {
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "error",
                    showCancelButton: true,
                    cancelButtonClass: 'btn-default btn-md waves-effect',
                    confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
                    confirmButtonText: 'Danger!'
                });
            });*/


        },
            //init
                $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
    }(window.jQuery),

//initializing
            function ($) {
                "use strict";
                $.SweetAlert.init()
            }(window.jQuery);
    </script>
@endsection