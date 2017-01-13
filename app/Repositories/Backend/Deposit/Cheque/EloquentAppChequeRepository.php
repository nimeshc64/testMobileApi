<?php
/**
 * Created by PhpStorm.
 * User: Nimesh
 * Date: 10/24/2016
 * Time: 8:43 PM
 */
namespace App\Repositories\Backend\Deposit\Cheque;

use App\Models\Access\User\User;
use App\Models\General\Account\account;
use App\Models\General\Cheque\cheque;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

/**
 * Class EloquentUserRepository
 * @property int refNo
 * @package App\Repositories\User
 */
class EloquentAppChequeRepository implements AppChequeRepositoryContract
{
    /**
     * @var cheque
     */
    private $cheque;

    private $refNo;
    /**
     * EloquentAppChequeRepository constructor.
     * @param cheque $cheque
     */
    public function __construct(cheque $cheque)
    {
        $this->cheque = $cheque;
        $this->refNo = (new \DateTime())->getTimestamp()%100000000;
    }

    public function getAll()
    {
        return $this->cheque->all();
    }

    public function getBy($attribute1,$value1,$attribute2,$value2)
    {
        return $this->cheque->where($attribute1, '=', $value1)
            ->where($attribute2,'=',$value2)
            ->get();
    }

    public function create(array $data)
    {
        return $this->cheque->create($data);
    }

    public function update($id, array $data)
    {
        $chkData=$this->cheque->findOrFail($id);
        $chkData->update($data);
        return $chkData;
    }

    public function delete($id)
    {
        $this->cheque->getById($id)->delete();
        return true;
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

    /**
     * @return int
     */
    public function getRefNo()
    {
        return $this->refNo;
    }

    /**
     * @param int $refNo
     */
    public function setRefNo($refNo)
    {
        $this->refNo = $refNo;
    }
}
