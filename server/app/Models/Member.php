<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Member extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'members';
    protected $fillable = [
        'id', 'del_flag', 'email', 'status', 'password', 'fullname', 'is_male', 'birthday',
        'phone', 'picture', 'role', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'password', 'del_flag', 'created_by', 'modified_by', 'created_at', 'updated_at', 'pivot'
    ];

    /**
     * Returns the activations relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activation()
    {
        return $this->hasOne(Activation::class, 'member_id');
    }

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

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }


    /**
     * @var array
     */
    protected $casts = [
        'is_male' => 'bool',
    ];
}
