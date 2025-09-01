<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{

    public function index()
    {

        $answers = Answer::find(1);

        $form = Form::find(1);
        $rows = $form->rows;

        $objects = $form->objects()->where('user_id', auth()->user()->id)->get();
        dd($objects);
        foreach ($objects as $object) {
            $answers = $object->answers;
        }

        return view('form');
    }

    public function show($id)
    {
        $form = Form::find($id);
        $rows = $form->rows;
        $questions = $form->questions;
        if ($form->is_object) {
            $objects = $form->objects()->where('user_id', auth()->user()->id)->get();
            foreach ($objects as $object) {
                $answers[$object->id] = $object->answers;
            }
        }else{
            $answers = $form->answers()->where('user_id', auth()->user()->id)->get();
        }

        return view('form', compact('form'));
    }
}
