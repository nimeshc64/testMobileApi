<?php

namespace App\Http\Controllers\Backend\Report;

use App\Models\Access\User\User;
use App\Models\General\Account\account;
use App\Repositories\Backend\General\Cash\CashRepositoryContract;
use App\Repositories\Backend\General\Cheque\ChequeRepositoryContract;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class MasterController extends Controller
{
    /**
     * @var CashRepositoryContract
     */
    private $cash;
    /**
     * @var ChequeRepositoryContract
     */
    private $cheque;

    /**
     * MasterController constructor.
     * @param CashRepositoryContract $cash
     * @param ChequeRepositoryContract $cheque
     */
    public function __construct(CashRepositoryContract $cash,ChequeRepositoryContract $cheque)
    {
        $this->cash = $cash;
        $this->cheque = $cheque;
    }


    /**
     * url admin/report/master
     * @return index page
     * path views/backend/report/master
     */
    function index()
    {
        return view('backend.reports.master');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    function getDataTable(Request $request)
    {
        $Date=$request->get('date');
        $type=$request->get('type');


        if($type=='cash')
        {
        return Datatables::of($this->cash->getReportDatatable())
            ->addColumn('account', function ($cash) {
                return account::where('id','=',$cash->account_id)->first()->accountNo;
            })
            ->addColumn('name', function ($cash) {
                return account::where('id','=',$cash->account_id)->first()->accountHolderName;
            })
            ->addColumn('agentid', function ($cash) {
                return account::where('accountHolderName','=',$cash->created_by)->first()->accountNo;
            })
            ->addColumn('actions', function($cash) {
                return $cash->action_buttons;
            })
            ->removeColumn('account_id')
            ->make(true);
        }
        elseif($type=='cheque')
        {
            return Datatables::of($this->cheque->getReportDatatable())
                ->addColumn('account', function ($cheque) {
                    return account::where('id','=',$cheque->account_id)->first()->accountNo;
                })
                ->addColumn('name', function ($cheque) {
                    return account::where('id','=',$cheque->account_id)->first()->accountHolderName;
                })
                ->addColumn('agentid', function ($cheque) {
                    return $cheque->collector_id;
                })
                ->addColumn('created_by', function ($cheque) {
                    return User::where('id','=', $cheque->collector_id)->first()->username;
                })
                ->addColumn('actions', function($cash) {
                    return $cash->action_buttons;
                })
                ->removeColumn('account_id')
                ->make(true);
        }
        elseif($type=='bulkcheque')
        {
            return Datatables::of($this->cheque->getReportBulk())
                ->addColumn('account', function ($cheque) {
                    return account::where('id','=',$cheque->account_id)->first()->accountNo;
                })
                ->addColumn('name', function ($cheque) {
                    return account::where('id','=',$cheque->account_id)->first()->accountHolderName;
                })
                ->addColumn('agentid', function ($cheque) {
                    return $cheque->collector_id;
                })
                ->addColumn('created_by', function ($cheque) {
                    return User::where('id','=', $cheque->collector_id)->first()->username;
                })
                ->addColumn('actions', function($cash) {
                    return $cash->action_buttons;
                })
                ->removeColumn('account_id')
                ->make(true);
        }

    }

}
