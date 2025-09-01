<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormObject extends Model
{
    protected $table = 'form_objects';

    public $fillable = [
        'name',
        'version',
        'user_id',
        // 'form_id',
    ];


    public function form()
    {
        return $this->hasManyThrough(Form::class, FormObjectToForm::class, 'form_object_id', 'id', 'id', 'form_id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
