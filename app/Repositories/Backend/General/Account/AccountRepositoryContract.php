<?php

namespace App\Repositories\Backend\General\Account;

use App\Models\General\Account;

/**
 * Interface UserRepositoryContract
 * @package App\Repositories\User
 */
interface AccountRepositoryContract
{
    /**
     * @return mixed
     */
    public function getForDataTable($user);
}