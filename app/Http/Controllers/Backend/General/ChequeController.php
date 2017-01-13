<?php

namespace App\Http\Controllers\Backend\General;

use App\Models\Access\User\User;
use App\Models\General\Account\account;
use App\Models\General\Cash\cash;
use App\Models\General\Cheque\cheque;
use App\Repositories\Backend\Deposit\Cheque\AppChequeRepositoryContract;
use App\Repositories\Backend\General\Cheque\ChequeRepositoryContract;
use Carbon\Carbon;
use DaveJamesMiller\Breadcrumbs\Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;

class ChequeController extends Controller
{
    /**
     * @var ChequeRepositoryContract
     */
    protected $cheque;

    /**
     * @var AppChequeRepositoryContract
     */
    protected $appcheque;

    /**
     * @param ChequeRepositoryContract $users
     */
    public function __construct(ChequeRepositoryContract $cheque,AppChequeRepositoryContract $appcheque)
    {
        $this->cheque = $cheque;
        $this->appcheque=$appcheque;
    }

    /*
    * get user name
    */
    function getUser()
    {
        $user_role=access()->user()->roles->lists('name')->toArray();
        return $user_role[0];
    }

    /**
     * url admin/cheque
     * @return index page
     * path views/backend/general/cheque/index
     */
    function index()
    {
        return view('backend.general.cheque.index');
    }

    /**
     * url admin/cash/get
     * @return mixed
     */
    function get()
    {
        return Datatables::of($this->cheque->getForDataTable($this->getUser()))
            ->addColumn('account', function ($cheque) {
                return account::where('id','=',$cheque->account_id)->first()->accountNo;
            })
            ->addColumn('collector', function ($cheque) {
                return User::where('id','=',$cheque->collector_id)->first()->username;
            })
            ->addColumn('actions', function($cheque) {
                return $cheque->action_buttons;
            })
            ->removeColumn('account_id')
            ->removeColumn('collector_id')
            ->make(true);
    }

    function store(Request $request)
    {
        $data = $request->getContent();
        $data2  = urldecode($data);
        $data3 = explode("&",$data);
        $data4  = json_decode($data3[0],true);
        $data5 = explode('=',urldecode($data3[0]));
        $res = json_decode($data5[1],true);

        $getUser = explode('=',urldecode($data3[1]));

        $amount=$res['amount'];
        $account_no=$res['account_no'];
        $resS=$res['ref_no'];
        $count=$res['count'];

        $user=$this->appcheque->getUserId($getUser[1]);

        if(!is_null($user))
        {
            $accountID=$this->appcheque->getCollectAcId($account_no);
            DB::beginTransaction();
            try{
                if(count($accountID)==0)
                {
                    $account=new account();
                    $account->accountNo=$account_no;
                    $account->created_at=Carbon::now();
                    $account->save();
                    $chkNo=$account->id;
                }
                else{
                    $chkNo=$accountID[0]['id'];
                }

                //deposit amount to user's account
                $cheque=new cheque();
                $cheque->account_id=$chkNo;
                $cheque->collector_id=$user;
                $cheque->amount=$amount;
                $cheque->refNo=$resS;
                $cheque->count=$count;
                $cheque->createdAt=Carbon::now();
                $cheque->created_at=Carbon::now();
                $cheque->save();

                DB::commit();
            }
            catch (Exception $ex)
            {
                DB::rollback();
            }
        }

    $response = array(
            'success' => true,
            'ref_no' => $this->appcheque->getRefNo()
        );

        return response()->json($response);

    }

}
