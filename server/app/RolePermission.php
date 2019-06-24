<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Psy\Configuration;

class RolePermission extends Model
{
    protected $table = 'role_permissions';
    protected $fillable = [
        'id', 'role_id', 'permission_id', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'pivot'
    ];

    public function role()
    {
        return $this->belongsTo(Configuration::class, 'role_id', 'id')->where('del_flag', false);
    }

    public function permission()
    {
        return $this->belongsTo(Configuration::class, 'permission_id', 'id')->where('del_flag', false);
    }
}
