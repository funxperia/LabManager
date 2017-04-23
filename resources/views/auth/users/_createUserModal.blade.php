<!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#createModal">
    新增用户 <i class="fa fa-plus-square"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="createModalLabel">新建用户</h4>
            </div>
            {!! Form::open(['method' => 'POST', 'route' => 'users.store', 'id' => 'basic-form']) !!}
            <div class="modal-body">
                <h3>基本信息</h3>
                <section>
                    <div class="form-group">
                        {!! Form::label('name', '姓名', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
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
                    </div>
                </section>
                <h3>密码</h3>
                <section>
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
                </section>
                <h3>最终</h3>
                <section>
                    <div class="form-group">
                        {!! Form::label('role', '拥有身份', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            <select multiple="multiple" class="multi-select" id="role" name="role[]" data-plugin="multiselect">
                                @foreach($roles as $role)
                                    <option>{{$role->id .'.'. $role->display_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        @include('errors.formError')
                    </div>
                </section>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>