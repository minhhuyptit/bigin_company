<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model {
    protected $table = 'teams';
    protected $fillable = [
        'id', 'del_flag', 'name', 'leader', 'description',
        'created_by', 'modified_by', 'created_at', 'updated_at',
    ];

    protected $hidden = [
        'pivot', 'del_flag', 'created_by', 'modified_by', 'created_at', 'updated_at',
    ];

    public function member_leader() {
        return $this->belongsTo(Member::class, 'leader', 'id')
            ->where('del_flag', false);
    }

    public function members() {
        return $this->belongsToMany(Member::class, TeamMember::class)
            ->where('del_flag', false);
    }

    public function team_members()
    {
        return $this->hasMany(TeamMember::class, 'member_id', 'id')
            ->where('del_flag', false);
    }
}
