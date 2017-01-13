<?php

namespace App\Models\General\Cash;

use App\Models\General\Cash\Attribute\CashAttribute;
use Illuminate\Database\Eloquent\Model;

class cash extends Model
{
    use CashAttribute;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'transaction';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['account_id', 'amount', 'refNo','created_by','createdAt'];
}
