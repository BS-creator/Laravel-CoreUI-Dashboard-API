<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $table = 'vieva_tools';
    protected $guarded = ['created_at', 'updated_at'];

    const UPDATED_AT = null;
    const CREATED_AT = null;
}
