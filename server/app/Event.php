<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'id', 'del_flag', 'name', 'repeat_type', 'repeat_on_day', 'status',
        'start_time', 'end_time', 'created_by', 'modified_by', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'del_flag'
    ];

    public function votes()
    {
        return $this->hasMany(Vote::class, 'event_id', 'id')
            ->where('del_flag', false);
    }
}
