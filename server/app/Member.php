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
        'password', 'del_flag', 'created_by', 'modified_by', 'created_at', 'updated_at', 'pivot'
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class, TeamMember::class, 'member_id', 'team_id')
        ->where('del_flag', false);
    }

    public function team_members()
    {
        return $this->hasMany(TeamMember::class, 'member_id', 'id');
    }
    
    public function member_role()
    {
        return $this->belongsTo(Configuration::class, 'role', 'id')->where('del_flag', false);
    }
    
    public function votes()
    {
        return $this->hasMany(Vote::class, 'member_id', 'id')
            ->where('del_flag', false);
    }

    public function leader_of_teams()
    {
        return $this->hasMany(Team::class, 'leader', 'id')
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
