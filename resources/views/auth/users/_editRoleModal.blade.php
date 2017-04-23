<!-- Button trigger modal -->
<button class="btn btn-success waves-effect waves-light btn-sm" data-toggle="modal" data-target="#roleModal-{{$user->id}}"><i class="fa fa-balance-scale"></i></button>

<!-- Modal -->
<div class="modal fade" id="roleModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel-{{$user->id}}-Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="roleModalLabel-{{$user->id}}-Label">编辑身份：{{$user->name}}</h4>
                    </div>
                    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PATCH', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                    <div class="modal-body">
                        <input type="hidden" id="type" name="type" value="edit_role">
                        <div class="form-group">
                            {!! Form::label('role', '拥有身份', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                <select multiple="multiple" class="multi-select" id="role" name="role[]" data-plugin="multiselect">
                                    @foreach($roles as $role)
                                        <option {{protect_default_admin($role, $user)}} {{$user->hasRole($role->name) ? 'selected' : ''}}>{{$role->id .'.'. $role->display_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @include('errors.formError')
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {!! Form::submit('编辑身份',['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>