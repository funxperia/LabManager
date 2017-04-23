<!-- Button trigger modal -->
<button type="button" class="btn btn-sm pull-right" data-toggle="modal" data-target="#editRoleModal-{{$role->id}}">
    <i class="fa fa-btn fa-cog"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="editRoleModal-{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="editRoleModal-{{$role->id}}-Label">
    <div class="modal-dialog" role="document">
        {!!  Form::model($role, ['route' => ['roles.update', $role->id],'method' => 'PATCH']) !!}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editRoleModal-{{$role->id}}-Label">编辑角色</h4>
            </div>
            <div class="modal-body">
                @if($role->name !== 'Administrator')
                    <div class="form-group">
                        {!! Form::label('display_name', '显示名称', ['class' => 'control-label']) !!}
                        {!! Form::text('display_name', null, ['class' => 'form-control'])!!}
                    </div>
                @endif
                <div class="form-group">
                    {!! Form::label('description', '描述', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('perm', '具有的权限', ['class' => 'control-label']) !!}
                    <select multiple="multiple" class="multi-select" id="perm" name="perm[]" data-plugin="multiselect">
                        @foreach($perms as $perm)
                            <option {{$role->hasPermission($perm->name) ? 'selected' : ''}}>{{$perm->id .'.'. $perm->display_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @include('errors.formError')
            <div class="modal-footer">
                <div class="form-group">
                    <button type="button" class="btn btn-muted" data-dismiss="modal">Close</button>
                    {!! Form::submit('编辑角色',['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>