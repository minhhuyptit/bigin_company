<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    protected $fillable = [
        'id', 'del_flag', 'name', 'leader', 'description',
        'created_by', 'modified_by', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'pivot', 'del_flag', 'created_by', 'modified_by', 'created_at', 'updated_at'
    ];
}
