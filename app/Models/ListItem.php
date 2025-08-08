<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListItem extends Model
{
    protected $table = 'list_items';

    public $fillable = [
        'list_id',
        'name',
        'json_data'
    ];

    public function list()
    {
        return $this->belongsTo(TrackingList::class);
    }

    public function json_schema()
    {
        return $this->list()->first()->json_schema;
    }
}
