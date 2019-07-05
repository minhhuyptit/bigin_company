<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Member extends Authenticatable implements JWTSubject
{
    protected $table = 'members';
    protected $fillable = [
        'id', 'del_flag', 'email', 'password', 'fullname', 'is_male', 'birthday',
        'phone', 'picture', 'role', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'password', 'del_flag'
    ];

    public function member_role()
    {
        return $this->belongsTo(Configuration::class, 'role', 'id')->where('del_flag', false);
    }
    
    public function votes()
    {
        return $this->hasMany(Vote::class, 'member_id', 'id')
            ->where('del_flag', false);
    }
    
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
