<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $table = 'configurations';
    protected $fillable = [
        'id', 'del_flag', 'value', 'description', 'type', 
        'created_by', 'modified_by', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'del_flag', 'pivot'
    ];

    public function permissions()
    {
        return $this->belongsToMany(Configuration::class, RolePermission::class, 'role_id', 'permission_id')
            ->where('del_flag', false);
    }

    public function roles(){
        return $this->belongsToMany(Configuration::class, RolePermission::class, 'permission_id', 'role_id')
            ->where('del_flag', false);
    }

    public function members()
    {
        return $this->hasMany(Member::class, 'role', 'id')
            ->where('del_flag', false);
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'repeat_type', 'id')
            ->where('del_flag', false);
    }
}
