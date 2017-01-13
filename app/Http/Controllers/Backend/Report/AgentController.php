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

class AgentController extends Controller
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
     * AgentController constructor.
     * @param CashRepositoryContract $cash
     * @param ChequeRepositoryContract $cheque
     */
    public function __construct(CashRepositoryContract $cash, ChequeRepositoryContract $cheque)
    {
        $this->cash = $cash;
        $this->cheque = $cheque;
    }

    /**
     * url admin/report/agent
     * @return index page
     * path views/backend/report/agent
     */
    function index()
    {
        $agents=User::select(['id','username'])
            ->where('account_id','!=',"")
            ->get();
        return view('backend.reports.agent')->with('agents',$agents);
    }

    function getDataTable(Request $request)
    {
        $agent=$request->get('agent');
        $user=User::where('id','=', $agent)->first()->username;

        return Datatables::of($this->cash->getReportagent($user))
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
}
