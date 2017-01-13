<?php

namespace App\Repositories\Backend\General\Account;

use App\Models\General\Account\account;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\User
 */
class EloquentAccountRepository implements AccountRepositoryContract
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

            return account::select(['accountNo','balance','accountHolderName','created_at','updated_at'])
                ->get();

        }
            return account::select(['accountNo','balance','accountHolderName'])
                ->get();
    }
}
