<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormRow extends Model
{
    protected $table = 'form_rows';

    public $fillable = [
        'label',
        'type',
        'form_id',
        'question_id',
        'is_required',
        'is_object_identifier',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
