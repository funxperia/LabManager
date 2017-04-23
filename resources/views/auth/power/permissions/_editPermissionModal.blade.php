<!-- Button trigger modal -->
<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#editPermModal-{{$perm->id}}">
    <i class="fa fa-btn fa-cog"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="editPermModal-{{$perm->id}}" tabindex="-1" role="dialog" aria-labelledby="editPermModal-{{$perm->id}}-Label">
    <div class="modal-dialog" role="document">
        {!! Form::model($perm, ['route' => ['perms.update', $perm->id],'method' => 'PATCH']) !!}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editPermModal-{{$perm->id}}-Label">编辑权限</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('display_name', '显示名称:', ['class' => 'control-label']) !!}
                    {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', '描述:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            @include('errors.formError')
            <div class="modal-footer">
                <div class="form-group">
                    <button type="button" class="btn btn-muted" data-dismiss="modal">Close</button>
                    {!! Form::submit('编辑权限',['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>