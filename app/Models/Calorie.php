<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Calorie extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = "calories";

    protected $fillable = [
        'id',
        'user_id',
        'date',
        'time',
        'text',
        'number_of_calories'
    ];

    public function user_id()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
