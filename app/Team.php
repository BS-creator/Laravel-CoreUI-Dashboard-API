<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'vieva_corporate_groups';
    protected $guarded = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $primaryKey = 'group_id';

    const UPDATED_AT = null;
    const CREATED_AT = null;

    public function members()
    {
        return $this->belongsToMany('App\User', 'vieva_team_members', 'corporate_group_id', 'user_id');
    }
}
