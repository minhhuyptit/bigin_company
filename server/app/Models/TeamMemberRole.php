<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMemberRole extends Model
{
    protected $table = 'team_member_roles';
    protected $fillable = [
        'del_flag',
        'name',
        'description',
        'created_by',
        'modified_by',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'del_flag'
    ];
}
