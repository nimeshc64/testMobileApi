<?php
/**
 * Created by PhpStorm.
 * User: Nimesh
 * Date: 10/24/2016
 * Time: 8:44 PM
 */
namespace App\Repositories\Backend\Deposit\AppUser;

use App\Models\General\Account;

/**
 * Interface UserRepositoryContract
 * @package App\Repositories\User
 */
interface AppUserRepositoryContract
{
    /**
     * @return mixed
     */
    public function getForDataTable($user);
}