<?php

namespace App\Models\General\Account\Attribute;

/**
 * Class AccountAttribute
 * @package App\Models\General\Account\Traits\Attribute
 */
trait AccountAttribute
{

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="' . route('admin.account.edit', $this->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
    }


    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->getEditButtonAttribute();
    }
}
