<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';

    protected $fillable = [
        'form_row_id',
        'user_id',
        'form_object_id',
        'value',
        'version'
    ];

    public function question()
    {
        return $this->hasOneThrough(Question::class, FormRow::class, 'id', 'id', 'form_row_id', 'question_id');
    }

    public function form()
    {
        return $this->hasOneThrough(Form::class, FormRow::class, 'id', 'id', 'form_row_id', 'form_id');
    }

    public function formRow()
    {
        return $this->belongsTo(FormRow::class);
    }

    public function formObject()
    {
        return $this->belongsTo(FormObject::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
