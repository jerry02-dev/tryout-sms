<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Course extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $table = 'courses';

    protected $fillable = [
        'title', 'description', 'created_by',
    ];


    public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
}
