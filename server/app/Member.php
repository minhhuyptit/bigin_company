<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $fillable = [
        'id', 'del_flag', 'email', 'password', 'fullname', 'is_male', 'birthday',
        'phone', 'picture', 'role', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'password', 'del_flag'
    ];

    public function roles()
    {
        return $this->belongsTo(Configuration::class, 'role', 'id')->where('del_flag', false);
    }
    
    public function votes()
    {
        return $this->hasMany(Vote::class, 'member_id', 'id')
            ->where('del_flag', false);
    }
}
