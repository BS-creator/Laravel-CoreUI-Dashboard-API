<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notific extends Model
{
    protected $table = 'vieva_notifications';
    protected $guarded = ['created_at', 'updated_at'];

    const UPDATED_AT = null;
    const CREATED_AT = null;

}
