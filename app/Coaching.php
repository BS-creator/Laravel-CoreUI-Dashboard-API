<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coaching extends Model
{
    protected $table = 'vieva_coaching_reports';
    protected $guarded = ['created_at', 'updated_at'];

    const UPDATED_AT = null;
    const CREATED_AT = null;

}
