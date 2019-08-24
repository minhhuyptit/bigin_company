<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = [
        'del_flag',
        'name',
        'image',
        'created_by',
        'modified_by',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'del_flag'
    ];
}
