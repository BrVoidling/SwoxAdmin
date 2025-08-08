<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepeatTask extends Model
{
    protected $table = 'repeat_tasks';

    protected $fillable = [
        'name',
        'user_id',
        'description',
        'frequency',
        'next_run',
        'last_run',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
