<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public function scopeSelection($query)
    {
        return $query->select(
        	'id',
            'name',
        	'title_' . app()->getLocale() . ' as title',
        	'desc_' . app()->getLocale() . ' as desc',
            'phone',
            'mail',
            'logo',
            'image',
            'favicon',
            'twitter',
            'facebook',
            'linkedin',
            'instagram',
            'whatsapp',

        );
    }
}
