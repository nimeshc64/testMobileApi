@extends('backend.layouts.master')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('content')

    {{--search--}}
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title"> Master Transactions</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {{--form-srart--}}
            <form method="POST" id="daily-form" role="form">

                {{--alert--}}
                <div id="mAlerts"></div>


                <div class="row">
                    <div class="col-md-12">

                        <div class="row">

                            <div class="col-md-4">
                                <!--From date -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date</label>
                                    <div class='input-group date' id='mDate'>
                                        <input type='text' class="form-control" disabled="disabled" id="master_date" name="master_date" placeholder="Date"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!--From date -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Type</label>
                                    <select class="form-control" id="type" name="type">
                                        <option selected value="">Select Txn Type</option>
                                        <option value="cash">Cash</option>
                                        <option value="cheque">Cheque</option>
                                        <option value="bulkcheque">Bulk Cheque</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <button type="button" class="btn btn-primary" id="btn_daily"><span class="glyphicon glyphicon-search"></span> Search</button>
                        <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-refresh"></span> Reset</button>

                    </div>
                </div>
            </form>
            {{--form-end--}}
        </div><!-- /.box-body -->
    </div><!--box box-success-->

    {{--table--}}
    <div class="box box-success">
        <div class="box-body">
            <div class="table-responsive">
                <table id="masterReport-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>Transaction</th>
                        <th>Date</th>
                        <th>Amount(Rs.)</th>
                        {{--<th id="newcolumn"></th>--}}
                        <th>Account No</th>
                        <th>Name</th>
                        <th>Agent ID</th>
                        <th>Agent Name</th>
                        <th>Instrument </th>
                        <th>Actions </th>
                    </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box box-success-->

@endsection

@section('after-scripts-end')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.min.js") }}
    {{ Html::script('js/backend/report/master.js') }}

    <script>
        $("#btn_daily").click(function(a) {


//            $('#newcolumn').append('<ht>Cheque Count</th>');
            $(function() {
                $('#masterReport-table').DataTable({
                    processing: true,
                    serverSide: true,
                    destroy: true,
                    ajax: {
                        url: '{{ route("admin.report.master.data") }}',
                        data: function(a) {
                            a.date = $("input[name=master_date]").val();
                            a.type = $("#type").find(":SELECTED").val();
                        }
                    },
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'createdAt', name: 'createdAt'},
                        {data: 'amount', name: 'amount'},
                        {data: 'account', name: 'account'},
                        {data: 'name', name: 'name'},
                        {data: 'agentid', name: 'agentid'},
                        {data: 'created_by', name: 'created_by'},
                        {data: 'refNo', name: 'refNo'},
                        {data: 'actions', name: 'actions'}
                    ],
                    dom: "lBfrtip",
                    buttons: [{
                        extend: 'excel',
                        title: ""
                    }],
                    order: [[1, "desc"]],
                    searchDelay: 500
                });
            });
        });

    </script>
@stop