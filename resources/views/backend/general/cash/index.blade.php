@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.generalTitle.cash'))

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.generalTitle.cash') }}
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">
                Sync : <input type="checkbox" checked data-toggle="toggle" data-size="mini" id="sync_btn_cash">
            </h3>

            <div class="box-tools pull-right">
                @include('backend.general.includes.cash-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="cash-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>Reason</th>
                        <th>Account</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="4" style="text-align:right">Total Amount:</th>
                            <th></th>
                        </tr>
                    </tfoot>
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
        $('#sync_btn_cash').bootstrapToggle('off');

        var cashTable=$('#cash-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("admin.cash.get") }}',
                type: 'get',
                data: {status: 1, trashed: false}
            },
            columns: [
                {data: 'refNo', name: 'refNo'},
                {data: 'account', name: 'account'},
                {data: 'created_by', name: 'created_by'},
                {data: 'createdAt', name: 'createdAt'},
                {data: 'amount', name: 'amount'},
                {data: 'actions', name: 'actions'}
            ],
            order: [[3, "asc"]],
            searchDelay: 500,
            footerCallback: function( tfoot, data, start, end, display ) {
                var api = this.api(), data;

                $ // Remove the formatting to get integer data for summation
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                    i : 0;
                };

                // Total over all pages
                total = api
                        .column( 4 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                // Total over this page
                pageTotal = api
                        .column( 4, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                // Update footer
                $( api.column( 4 ).footer() ).html(
                        ' Rs.'+ total
                );
            }
        });

        //sync on/off
        $(function() {
            var sync;
            $('#sync_btn_cash').change(function() {

                if($(this).prop('checked')==true)
                {
                    sync = setInterval( function () {
                        cashTable.ajax.reload();
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