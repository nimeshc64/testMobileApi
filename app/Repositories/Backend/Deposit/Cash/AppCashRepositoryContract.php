<?php
/**
 * Created by PhpStorm.
 * User: Nimesh
 * Date: 10/24/2016
 * Time: 8:42 PM
 */
namespace App\Repositories\Backend\Deposit\Cash;

use App\Models\General\Account;

/**
 * Interface UserRepositoryContract
 * @package App\Repositories\User
 */
interface AppCashRepositoryContract
{
    public function getAll();

    public function getBy($attribute1,$value1,$attribute2,$value2);

    public function create(array $data);

    public function update($id,array $data);

    public function delete($id);

    public function getCollectAcId($account_no);

    public function getUserId($username);

    public function getRefNo();

    public function setRefNo($refNo);
}