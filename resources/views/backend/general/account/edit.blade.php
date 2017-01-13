@extends ('backend.layouts.master')

@section ('title', 'Account | Edit ' )

@section('content')
    {{--{{ Form::model($user, ['route' => ['admin.access.user.update', $user], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}--}}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Account</h3>

            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('name', trans('validation.attributes.backend.access.users.name'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.name')]) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('email', trans('validation.attributes.backend.access.users.email'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.email')]) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            {{--@if ($user->id != 1)--}}
                <div class="form-group">
                    {{ Form::label('status', trans('validation.attributes.backend.access.users.active'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-1">
                        {{--{{ Form::checkbox('status', '1', $user->status == 1) }}--}}
                    </div><!--col-lg-1-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('confirmed', trans('validation.attributes.backend.access.users.confirmed'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-1">
                        {{--{{ Form::checkbox('confirmed', '1', $user->confirmed == 1) }}--}}
                    </div><!--col-lg-1-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('status', trans('validation.attributes.backend.access.users.associated_roles'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-3">
                        {{--@if (count($roles) > 0)--}}
                            {{--@foreach($roles as $role)--}}
                                {{--<input type="checkbox" value="{{$role->id}}" name="assignees_roles[]" {{in_array($role->id, $user_roles) ? 'checked' : ''}} id="role-{{$role->id}}" /> <label for="role-{{$role->id}}">{{ $role->name }}</label>--}}
                                {{--<a href="#" data-role="role_{{$role->id}}" class="show-permissions small">--}}
                                    {{--(--}}
                                    {{--<span class="show-text">{{ trans('labels.general.show') }}</span>--}}
                                    {{--<span class="hide-text hidden">{{ trans('labels.general.hide') }}</span>--}}
                                    {{--{{ trans('labels.backend.access.users.permissions') }}--}}
                                    {{--)--}}
                                {{--</a>--}}
                                {{--<br/>--}}
                                {{--<div class="permission-list hidden" data-role="role_{{$role->id}}">--}}
                                    {{----}}
                                {{--</div><!--permission list-->--}}
                            {{--@endforeach--}}
                        {{--@else--}}
                            {{--{{ trans('labels.backend.access.users.no_roles') }}--}}
                        {{--@endif--}}
                    </div><!--col-lg-3-->
                </div><!--form control-->
            {{--@endif--}}
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.account.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->



    {{--{{ Form::close() }}--}}
@stop

@section('after-scripts-end')
    {{ Html::script('js/backend/access/users/script.js') }}
@stop
