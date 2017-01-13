<?php
/**
 * Created by PhpStorm.
 * User: Nimesh
 * Date: 10/24/2016
 * Time: 8:42 PM
 */
namespace App\Repositories\Backend\Deposit\Cash;

use App\Models\Access\User\User;
use App\Models\General\Account\account;
use App\Models\General\Cash\cash;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\User
 */
class EloquentAppCashRepository implements AppCashRepositoryContract
{
    /**
     * @var cash
     */
    private $cash;

    /**
     * EloquentAppCashRepository constructor.
     * @param cash $cash
     */
    public function __construct(cash $cash)
    {
        $this->cash = $cash;
        $this->refNo = (new \DateTime())->getTimestamp()%100000000;
    }

    public function getAll()
    {
        $this->cash->all();
    }

    public function getBy($attribute1, $value1, $attribute2, $value2)
    {

    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function getCollectAcId($account_no)
    {
        $accountID=account::where('accountNo','=',$account_no)->get();
        return $accountID;
    }

    public function getUserId($username)
    {
        $userID=User::where('username','=',$username)->first()->id;
        return $userID;
    }

    public function getRefNo()
    {
        return $this->refNo;
    }

    public function setRefNo($refNo)
    {
        $this->refNo = $refNo;
    }
}
