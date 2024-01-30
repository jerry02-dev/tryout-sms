<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Event extends Model
{
    use Notifiable;



    protected $fillable = [
        'name', 'description', 'course_id', 'created_by',
    ];


    public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function course()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }


}
