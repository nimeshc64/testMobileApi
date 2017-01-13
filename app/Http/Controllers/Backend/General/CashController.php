<?php

namespace App\Http\Controllers\Backend\General;

use App\Models\Access\User\User;
use App\Models\General\Account\account;
use App\Models\General\Cash\cash;
use App\Repositories\Backend\Deposit\Cash\AppCashRepositoryContract;
use App\Repositories\Backend\General\Cash\CashRepositoryContract;
use Carbon\Carbon;
use DaveJamesMiller\Breadcrumbs\Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;

class CashController extends Controller
{
    /**
     * @var CashRepositoryContract
     */
    protected $cash;
    /**
     * @var AppCashRepositoryContract
     */
    private $appCash;

    /**
     * @param CashRepositoryContract $cash
     * @param AppCashRepositoryContract $appCash
     * @internal param CashRepositoryContract $users
     */
    public function __construct(CashRepositoryContract $cash,AppCashRepositoryContract $appCash)
    {
        $this->cash = $cash;
        $this->appCash = $appCash;
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
     * url admin/cash
     * @return index page
     * path views/backend/general/cash/index
     */
    function index()
    {
        return view('backend.general.cash.index');
    }

    /**
     * url admin/cash/get
     * @return mixed
     */
    function get()
    {
        return Datatables::of($this->cash->getForDataTable($this->getUser()))
            ->addColumn('actions', function($cash) {
                return $cash->action_buttons;
            })
            ->addColumn('account', function ($cash) {
                return account::where('id','=',$cash->account_id)->first()->accountNo;
            })
            ->removeColumn('account_id')
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


        $refno=$res['ref_no'];
        $amount=$res['amount'];
        $mobile=$res['mobile'];
        $account_no=$res['account_no'];

        $user=$this->appCash->getUserId($getUser[1]);

        if(!is_null($user)) {

            $accountID=$this->appCash->getCollectAcId($account_no);
            DB::beginTransaction();
            try{
                if(count($accountID)==0)
                {
                    $account=new account();
                    $account->accountNo=$account_no;
                    $account->created_at=Carbon::now();
                    $account->save();
                    $cshNo=$account->id;
                    $newAcc=$account->id;
                }
                else{
                    $cshNo=$accountID[0]['id'];
                }

                //user account
                $newAccount=account::find($cshNo);
                $newAccount->balance+=$amount;
                $newAccount->updated_at=Carbon::now();
                $newAccount->save();

                //collector account
                $collectorAccount=User::find($user);
                $account=account::find($collectorAccount['account_id']);
                $account->balance-=$amount;
                $newAccount->updated_at=Carbon::now();
                $account->save();

                //deposit amount to user's account
                $transaction=new cash();
                $transaction->account_id=$cshNo;
                $transaction->amount=$amount;
                $transaction->refNo=$refno;
                $transaction->created_by=$getUser[1];
                $transaction->createdAt=Carbon::now();
                $transaction->save();

                DB::commit();
            }
            catch (Exception $ex)
            {
                DB::rollback();
            }
            $response = array(
                'success' => true,
                'ref_no' => $this->appCash->getRefNo()
            );

            return response()->json($response);
        }
        $response = array(
            'success' => false,
        );

        return new JsonResponse($response);
    }
}
