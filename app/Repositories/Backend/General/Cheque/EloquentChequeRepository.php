<?php

namespace App\Repositories\Backend\General\Cheque;


use App\Models\General\Account\account;
use App\Models\General\Cheque\cheque;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\User
 */
class EloquentChequeRepository implements ChequeRepositoryContract
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
            return cheque::select(['account_id','collector_id','amount','refNo','createdAt'])
                ->get();
        }
        return cheque::select(['account_id','collector_id','amount','refNo','createdAt'])
            ->get();
    }

    public function getReportDatatable()
    {
        return cheque::select(['id','account_id','collector_id','amount','refNo','createdAt','updated_at','created_at'])
                ->where('refNo','=','Cheque')
                ->get();
    }

    public function getReportBulk()
    {
        return cheque::select(['id','account_id','collector_id','amount','refNo','createdAt','updated_at','created_at'])
            ->where('refNo','=','Bulk Cheque')
            ->get();
    }

    public function getReportagent($agent)
    {
        return cheque::select(['id','account_id','collector_id','amount','refNo','createdAt','updated_at','created_at'])
            ->where('collector_id','=',$agent)
            ->get();
    }
}
