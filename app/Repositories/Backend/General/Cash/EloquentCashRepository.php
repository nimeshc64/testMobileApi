<?php

namespace App\Repositories\Backend\General\Cash;

use App\Models\General\Account\account;
use App\Models\General\Cash\cash;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\User
 */
class EloquentCashRepository implements CashRepositoryContract
{
    /**
     * @return mixed
     */
    public function getForDataTable($user)
    {
        /**
         * Note: You must return deleted_at or the User getActionButtonsAttribute won't
         * be able to differentiate what buttons to show for each row.
         */
        if ($user == "Administrator") {
            return cash::select(['account_id','amount','refNo','created_by','createdAt'])
                ->get();
        }
        return cash::select(['account_id','amount','refNo','created_by','createdAt'])
            ->get();
    }

    /**
     *
     */
    public function getReportDatatable()
    {
            return cash::select(['id','account_id','amount','refNo','created_by','createdAt'])
                ->get();
    }

    public function getReportagent($agent)
    {
        return cash::select(['id','account_id','amount','refNo','created_by','createdAt'])
            ->where('created_by','=',$agent)
            ->get();
    }
}
