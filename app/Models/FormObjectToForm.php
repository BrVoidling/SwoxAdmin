<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormObjectToForm extends Model
{
    protected $table = 'form_object_to_form';

    protected $fillable = [
        'form_object_id',
        'form_id',
    ];

    public function formObject()
    {
        return $this->belongsTo(FormObject::class);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
