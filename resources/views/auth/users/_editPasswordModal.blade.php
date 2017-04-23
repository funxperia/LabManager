<!-- Button trigger modal -->
<button class="btn btn-info waves-effect waves-light btn-sm" data-toggle="modal" data-target="#passModal-{{$user->id}}"><i class="fa fa-lock"></i></button>

<!-- Modal -->
<div class="modal fade" id="passModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="passModalLabel-{{$user->id}}-Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="passModalLabel-{{$user->id}}-Label">编辑密码：{{$user->name}}</h4>
                    </div>
                    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PATCH', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                    <div class="modal-body">
                        <input type="hidden" id="type" name="type" value="edit_password">
                        <div class="form-group">
                            {!! Form::label('password', '新密码', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('password_confirmation', '确认密码', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    @include('errors.formError')
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {!! Form::submit('编辑密码',['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
</div>