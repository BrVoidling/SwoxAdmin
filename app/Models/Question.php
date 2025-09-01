<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'name',
        'internal_name',
        'description',
        'type',
        'options',
    ];

    public function forms()
    {
        return $this->hasManyThrough(Form::class, FormRow::class, 'id', 'id', 'form_row_id', 'form_id');
    }

    public function answers()
    {
        return $this->hasManyThrough(Answer::class, FormRow::class, 'id', 'id', 'form_row_id', 'answer_id');
    }

    public function formRows()
    {
        return $this->hasMany(FormRow::class);
    }
}
