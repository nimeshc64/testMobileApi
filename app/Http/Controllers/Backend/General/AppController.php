<?php

namespace App\Http\Controllers\Backend\General;

use App\Http\Requests\Backend\LoginRequest;
use App\Models\Access\User\User;
use App\Models\General\Account\account;
use App\Models\General\Cheque\cheque;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\RequestStack;

class AppController extends Controller
{
    /**
     * url
     * @param Request $request
     * @return
     */
    function login(Request $request)
    {
        $data = $request->getContent();
        $data2  = urldecode($data);
        $data3 = explode("&",$data);
        $data4  = json_decode($data3[0],true);
        $data5 = explode('=',urldecode($data3[0]));
        $res = json_decode($data5[1],true);

//        print_r($res['password']);
//        $aa = $request->getContent();
//        $xxx = urldecode($aa);
//        $yyy = explode("data=", $xxx);
//        $zzz = explode("&", $yyy[1]);
//        $data = json_decode($zzz[0]);
//
        $username =$res['username'];
        $password =$res['password'];
//
        if (Auth::attempt(array('username' => $username, 'password' => $password))){
            $success = true;
        }else{
            $success = false;
        }

        $response = array(
            'success' => $success
        );

//        $username=$request->get('username');
//        $password=$request->get('password');
//
//        if (Auth::attempt(array('username' => $username, 'password' => $password))){
//            $success = true;
//        }else{
//            $success = false;
//        }
//
//        $response = array(
//            'success' => $success
//        );
//
        return response()->json($response);
    }


    function register(Request $request)
    {
        $data = $request->getContent();
        $data2  = urldecode($data);
        $data3 = explode("&",$data);
        $data4  = json_decode($data3[0],true);
        $data5 = explode('=',urldecode($data3[0]));
        $res = json_decode($data5[1],true);

        $password=$res['password'];
        $email=$res['email'];
        $deviceId=$res['deviceId'];
        $mobile=$res['mobile'];
        $name=$res['name'];

        $accountNo=$res['account_no'];
        $accountID=account::where('accountNo','=',$accountNo)->get();
        if(count($accountID)==0){
            $account=new account();
            $account->accountNo=$accountNo;
            $account->balance=0;
            $account->accountHolderName=$name;
            $account->created_at=Carbon::now();
            $account->save();

            $user=new User();
            $user->name=$name;
            $user->username=$name;
            $user->password=bcrypt($password);
            $user->email=$email;
            $user->deviceId=$deviceId;
            $user->mobile=$mobile;
            $user->account_id=$account->id;
            $user->confirmed=1;
            $user->updated_at=Carbon::now();
            $user->created_at=Carbon::now();

            $user->save();

            $response = array(
                'success' => true
            );
            return response()->json($response);
        }
        else{
            $response = array(
                'success' => false
            );
            return response()->json($response);
        }

    }

    function cash(Request $request)
    {
        $dt = Carbon::now();
        $now=$dt->toDateString();
        $username=$request->get('username');
        $cashAmount=[];

        $cash = DB::select("select sum(amount) as amount from transaction 
                              where created_by='$username'
                              and 
                              date(createdAt)='$now'");

        foreach ($cash as $itemc)
        {
            array_push($cashAmount,$itemc->amount);
        }

        return $cashAmount[0];
//        return $request->get('username')
    }

    function cheque(Request $request)
    {
        $dt = Carbon::now();
        $now=$dt->toDateString();
        $chequeAmount=[];
        $username=$request->get('username');
        $user=User::where('username','=',$username)->first()->id;

        $cheque = DB::select("select sum(amount) as amount from cheque where 
                                collector_id=$user
                                and 
                                date(createdAt)='$now'
                                AND 
                                refNo='Cheque'");

        foreach ($cheque as $itemc)
        {
            array_push($chequeAmount,$itemc->amount);
        }

        return $chequeAmount[0];
    }

    function bulkcheque(Request $request)
    {
        $dt = Carbon::now();
        $now=$dt->toDateString();
        $chequeAmount=[];
        $username=$request->get('username');
        $user=User::where('username','=',$username)->first()->id;

        $cheque = DB::select("select sum(amount) as amount from cheque where 
                                collector_id=$user
                                and 
                                date(createdAt)='$now'
                                AND 
                                refNo='Bulk Cheque'");

        foreach ($cheque as $itemc)
        {
            array_push($chequeAmount,$itemc->amount);
        }

        return $chequeAmount[0];
    }

    function up()
    {
        return view('frontend.up');
    }

    function upload(Request $request)
    {

//        if($request->hasFile("file"))
//        {
            $updir = 'images/';
           // $file=$request->file('file');
            //$filename=$file->getClientOriginalName();
        $request->getContent()->move($updir, "aaa.png");
           // return $filename;
//        }
//        else{
//            return "no";
//        }
       //return $request->getContent();
    }
}
