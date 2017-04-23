<!-- Button trigger modal -->
<button type="button" class="btn btn-primary modal-trigger" data-toggle="modal" data-target="#myModal">
    新建角色
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title text-primary" id="myModalLabel">新建角色</h4>
            </div>
            {!! Form::open(['route'=>'roles.store', 'method'=>'POST']) !!}
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('name', '角色名称：', ['class'=>'control-label']) !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('display_name', '显示名称：', ['class'=>'control-label']) !!}
                    {!! Form::text('display_name', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', '描述', ['class'=>'control-label']) !!}
                    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('perm1', '具有的权限', ['class' => 'control-label']) !!}
                    <select multiple="multiple" class="multi-select" id="perm1" name="perm1[]" data-plugin="multiselect">
                        @foreach($perms as $perm)
                            <option >{{$perm->id .'.'. $perm->display_name}}</option>
                        @endforeach
                    </select>
                </div>
                @include('errors.formError')
            </div>
            <div class="modal-footer">
                {!! Form::submit('新建角色', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>