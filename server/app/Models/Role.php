<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
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
