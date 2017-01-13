<?php

namespace App\Repositories\Backend\General\Cheque;

use App\Models\General\Account;

/**
 * Interface UserRepositoryContract
 * @package App\Repositories\User
 */
interface ChequeRepositoryContract
{
    /**
     * @return mixed
     */
    public function getForDataTable($user);

    public function getReportDatatable();

    public function getReportBulk();
}