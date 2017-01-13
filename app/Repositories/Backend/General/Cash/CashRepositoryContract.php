<?php

namespace App\Repositories\Backend\General\Cash;

use App\Models\General\Account;

/**
 * Interface UserRepositoryContract
 * @package App\Repositories\User
 */
interface CashRepositoryContract
{
    /**
     * @return mixed
     */
    public function getForDataTable($user);

    /**
     *
     */
    public  function getReportDatatable();

    public function getReportagent($agent);
}