<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'vieva_corporate_clients';
    protected $guarded = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s';

    const UPDATED_AT = null;
    const CREATED_AT = null;

}
