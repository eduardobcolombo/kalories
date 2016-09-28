<?php
/**
 * Created by PhpStorm.
 * User: eduardo
 * Date: 9/28/16
 * Time: 1:43 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Calorie extends Model
{
    protected $table = "calories";

    protected $fillable = [
        'id',
        'date',
        'time',
        'text',
        'number_of_calories'
    ];

    public function user_id()
    {
        return $this->belongsTo(User::class);
    }
}
