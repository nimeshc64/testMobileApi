<?php

namespace App\Models\General\Account;

use App\Models\General\Account\Attribute\AccountAttribute;
use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    use AccountAttribute;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'account';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['accountNo', 'balance', 'accountHolderName'];
}
