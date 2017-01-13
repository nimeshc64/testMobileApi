@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.generalTitle.account'))

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.generalTitle.account') }}
    </h1>
@endsection

@section('content')
    {{--<a href="{{url('admin/account/1/edit')}}" class="button">edit</a>--}}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">
                Sync : <input type="checkbox" checked data-toggle="toggle" data-size="mini" id="sync_btn_acc">
            </h3>

            <div class="box-tools pull-right">
                @include('backend.general.includes.account-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="account-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>Account Number</th>
                        <th>Balance</th>
                        <th>Account Holder Name</th>
                        <th>Create At</th>
                        <th>Update At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->

@stop

@section('after-scripts-end')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.min.js") }}

    <script>
        //off sync button
        $('#sync_btn_acc').bootstrapToggle('off');

       var AccountTable= $('#account-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("admin.account.get") }}',
//                    type: 'get',
//                    data: {status: 1, trashed: false}
            },
            columns: [
                {data: 'accountNo', name: 'accountNo'},
                {data: 'balance', name: 'balance'},
                {data: 'accountHolderName', name: 'accountHolderName'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'actions', name: 'actions'}
            ],
            order: [[3, "desc"]],
            searchDelay: 500
        });

        //sync on/off
        $(function() {
            var sync;
            $('#sync_btn_acc').change(function() {

                if($(this).prop('checked')==true)
                {
                    sync = setInterval( function () {
                        AccountTable.ajax.reload();
                    }, 30000 );
                }
                else if($(this).prop('checked')==false)
                {
                    clearInterval(sync);
                }
            })
        });

    </script>
@stop