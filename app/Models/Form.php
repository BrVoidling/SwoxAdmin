<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'forms';

    public $fillable = [
        'name',
        'internal_name',
        'description',
        'is_object',
        'hoofdform_id'
    ];

    public function hoofdform()
    {
        return $this->belongsTo(Form::class, 'hoofdform_id');
    }

    public function rows()
    {
        return $this->hasMany(FormRow::class);
    }

    public function questions()
    {
        return $this->hasManyThrough(Question::class, FormRow::class, 'id', 'id', 'form_row_id', 'question_id');
    }

    public function objects()
    {
        return $this->hasManyThrough(FormObject::class, FormObjectToForm::class, 'form_id', 'id', 'id', 'form_object_id');
    }
}
