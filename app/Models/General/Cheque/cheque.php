<?php

namespace App\Models\General\Cheque;

use App\Models\General\Cheque\Attribute\ChequeAttribute;
use Illuminate\Database\Eloquent\Model;

class cheque extends Model
{
    use ChequeAttribute;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cheque';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['account_id', 'collector_id', 'amount','count','refNo','createdAt'];
}
