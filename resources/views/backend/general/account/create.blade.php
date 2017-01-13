@extends ('backend.layouts.master')

@section ('title','Account | Create ')


@section('content')
    {{ Form::open(['route' => 'admin.account.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Create Account</h3>

            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->

        <div class="box-body">

            <div class="form-group">
                {{ Form::label('accountHolderName', 'Account Holder Name', ['class' => 'col-lg-2 control-label', 'placeholder' => trans('validation.attributes.backend.access.users.password')]) }}

                <div class="col-lg-10">
                    {{ Form::text('accountHolderName', null, ['class' => 'form-control', 'placeholder' => 'Account Holder Name']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('accountNo', 'Account Number', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('accountNo', null, ['class' => 'form-control', 'placeholder' => 'Account Number']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('balance', 'Balance', ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::number('balance', '0.00', ['class' => 'form-control', 'placeholder' => 'Balance', "step"=>"any"]) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.account.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {{ Form::close() }}
@stop

@section('after-scripts-end')
    {{ Html::script('js/backend/access/users/script.js') }}
@stop
