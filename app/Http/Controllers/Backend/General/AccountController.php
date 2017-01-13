<?php

namespace App\Http\Controllers\Backend\General;

use App\Repositories\Backend\General\Account\AccountRepositoryContract;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class AccountController extends Controller
{
    /**
     * @var AccountRepositoryContract
     */
    protected $account;

    /**
     * @param AccountRepositoryContract $users
     */
    public function __construct(AccountRepositoryContract $account)
    {
        $this->account = $account;
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
     * url admin/account
     * @return index page
     * path views/backend/general/account/index
     */
    function index()
    {
        return view('backend.general.account.index');
    }

    /**
     * url admin/account/create
     * @return create page
     * path views/backend/general/account/create
     */
    function create()
    {
        return view('backend.general.account.create');
    }

    /**
     * url admin/account
     */
    function store()
    {
        return view('backend.general.account.index');
    }

    /**
     * url admin/account/get
     * @return mixed
     */
    function get()
    {

        return Datatables::of($this->account->getForDataTable($this->getUser()))
            ->addColumn('actions', function($account) {
                return $account->action_buttons;
            })
            ->make(true);
    }

    /**
     * url admin/account/{account}/edit
     * @return edit page
     * path views/backend/general/account/edit
     */
    function edit()
    {
        return view('backend.general.account.edit');
    }

    /**
     * url admin/account/{account}
     * @return edit page
     * path views/backend/general/account/edit
     */
    function update()
    {
        return view('backend.general.account.edit');
    }

}
