<?php

namespace App\Http\Controllers\FormMaker;

use App\Http\Controllers\Controller;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        $forms = Form::all();

        $return = [];

        foreach ($forms as $form) {
            $return[$form->id] = [
                'id' => $form->id,
                'name' => $form->name,
                'internal_name' => $form->internal_name,
                'description' => $form->description,
                'is_object' => (bool)$form->is_object,
                'hoofdform_id' => $form->hoofdform_id
            ];
        }

        return response()->json($return);
        // return view('formmaker.form', compact('forms'));
    }

    public function show($id)
    {
        $form = Form::find($id);
        return view('formmaker.form', compact('form'));
    }


    public function store(Request $request)
    {
        $input = $request->except(['_token', 'id']);
        $form = Form::updateOrCreate(['id' => $request->id], $input);
        return response()->json($form->id);
        // return redirect()->route('formmaker.form.index');
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $form = Form::find($id);
        $form->update($input);
        return redirect()->route('formmaker.form.index');
    }

    public function destroy($id)
    {
        $form = Form::find($id);
        $form->delete();
        return redirect()->route('formmaker.form.index');
    }
}
