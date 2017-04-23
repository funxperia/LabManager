@foreach($infos as $info)
<button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#editModal-{{$info->id}}">
    修改个人基本资料
</button>

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="editModal-{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel-{{$info->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-primary" id="editModalLabel-{{$info->id}}">编辑个人基本资料</h4>
                <h5>若要修改邮箱、学号、姓名，请联系超级管理员修改</h5>
            </div>
            {!! Form::model($info, ['route' => ['selfInfo.update', $info -> id], 'method'=>'PATCH']) !!}
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        {!! Form::label('autograph', '个性签名', ['class' => 'control-label']) !!}
                        {!! Form::text('autograph', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('description', '自我介绍', ['class' => 'control-label autogrow']) !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('sex', '性别', ['class' => 'control-label']) !!}
                            {!! Form::select('sex', array(
                                '保密'=>'保密','笼统男'=>'笼统男','笼统女'=>'笼统女','无性别'=>'无性别','两魄人'=>'两魄人','两性人.n'=>'两性人.n','两性人.adj'=>'两性人.adj','双性人'=>'双性人',
                                '顺性女'=>'顺性女','顺性女（强调性征）'=>'顺性女（强调性征）','顺性男'=>'顺性男','顺性男（强调性征）'=>'顺性男（强调性征）','顺性人'=>'顺性人',
                                '跨性女'=>'跨性女','跨性女（强调性征）'=>'跨性女（强调性征）','跨性男'=>'跨性男','跨性男（强调性征）'=>'跨性男（强调性征）','跨性人'=>'跨性人',
                                '变性女'=>'变性女','变性女（强调性征）'=>'变性女（强调性征）','变性男'=>'变性男','变性男（强调性征）'=>'变性男（强调性征）','变性人'=>'变性人',
                                '女变男'=>'女变男','男变女'=>'男变女','非二元'=>'非二元','间性人'=>'间性人','流性人'=>'流性人','酷儿性别'=>'酷儿性别','变体性别'=>'变体性别',
                                '性别存疑'=>'性别存疑','非常规性别'=>'非常规性别','泛性别'=>'泛性别','其它'=>'其它',)
                            ) !!}
                            <span><a href="http://www.v4.cc/News-900791.html" target="_blank">查看介绍？</a></span>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('birthday','生日',['class' => 'control-label']) !!}
                            {!! Form::date('birthday', \Carbon\Carbon::createFromFormat('Y-m-d', $info->birthday)) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('IDnumber', '身份证', ['class' => 'control-label']) !!}
                            {!! Form::text('IDnumber', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('qq', 'QQ号', ['class' => 'control-label']) !!}
                            {!! Form::number('qq', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('phone', '手机号', ['class' => 'control-label']) !!}
                            {!! Form::number('phone', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('college', '学院', ['class' => 'control-label']) !!}
                            {!! Form::text('college', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('major', '专业', ['class' => 'control-label']) !!}
                            {!! Form::text('major', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('class', '班级', ['class' => 'control-label']) !!}
                            {!! Form::text('class', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('nation', '民族', ['class' => 'control-label']) !!}
                            {!! Form::text('nation', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('category', '培养层次', ['class' => 'control-label']) !!}
                            {!! Form::select('category', array('本科'=>'本科', '专科'=>'专科')) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('enrollment', '入学时间', ['class' => 'control-label']) !!}
                            {!! Form::number('enrollment', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            {!! Form::label('direction', '学习方向', ['class' => 'control-label']) !!}
                            {!! Form::select('direction', array('探索中'=>'探索中', '前端'=>'前端', '后端'=>'后端', '数据库'=>'数据库')) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            @include('errors.formError')
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {!! Form::submit('编辑',['class'=> 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endforeach