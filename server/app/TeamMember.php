<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $table = 'team_members';
    protected $fillable = [
        'id', 'member_id', 'team_id', 'team_member_role', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'del_flag'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id')
            ->where('del_flag', false);
    }
    
    public function member_role()
    {
        return $this->belongsTo(Configuration::class, 'team_member_role', 'id')
            ->where('del_flag', false);
    }
}
