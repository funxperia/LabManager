<!-- Button trigger modal -->
<button class="btn btn-info waves-effect waves-light btn-sm" data-toggle="modal" data-target="#infoModal-{{$user->id}}"><i class="fa fa-edit"></i></button>

<!-- Modal -->
<div class="modal fade" id="infoModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel-{{$user->id}}-Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="infoModalLabel-{{$user->id}}-Label">编辑用户</h4>
                    </div>
                    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PATCH', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                    <div class="modal-body">
                        <input type="hidden" id="type" name="type" value="edit_user">
                        <div class="form-group">
                            {!! Form::label('name', '姓名', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('sid', '学号', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('sid', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', '邮箱', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', '状态', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::select('status', ['正常' => '正常', '封禁' => '封禁', '休学' => '休学', '重病' => '重病'], '正常', ['class' => 'form-control', 'style' => 'width:405px;left:8%']) !!}
                            </div>
                        </div>
                    </div>
                    @include('errors.formError')
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {!! Form::submit('编辑用户',['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
</div>