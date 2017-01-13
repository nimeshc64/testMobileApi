<?php
/**
 * Created by PhpStorm.
 * User: Nimesh
 * Date: 10/24/2016
 * Time: 8:43 PM
 */
namespace App\Repositories\Backend\Deposit\AppUser;

use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\User
 */
class EloquentAppUserRepository implements AppUserRepositoryContract
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

            return account::select(['accountNo','balance','accountHolderName'])
                ->get();

        }
        return account::select(['accountNo','balance','accountHolderName'])
            ->get();
    }
}
