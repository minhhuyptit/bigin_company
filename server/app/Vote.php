<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'votes';
    protected $fillable = [
        'id', 'member_id', 'food_id', 'event_id', 'created_at', 'updated_at'
    ];

    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id', 'id')
            ->where('del_flag', false);
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id')
            ->where('del_flag', false);
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id')
            ->where('del_flag', false);
    }

}
