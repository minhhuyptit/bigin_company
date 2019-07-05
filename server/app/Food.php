<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    protected $fillable = [
        'id', 'del_flag', 'name', 'image', 
        'created_by', 'modified_by', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'del_flag'
    ];

    public function votes()
    {
        return $this->hasMany(Vote::class, 'food_id', 'id')
            ->where('del_flag', false);
    }
}
