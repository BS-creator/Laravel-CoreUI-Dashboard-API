<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'vieva_corporate_groups';
    protected $guarded = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s';

    const UPDATED_AT = null;
    const CREATED_AT = null;
}
