<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackingList extends Model
{
    protected $table = 'tracking_lists';

    protected $fillable = [
        'name',
        'user_id',
        'json_schema',
    ];


    public function items()
    {
        return $this->hasMany(ListItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
