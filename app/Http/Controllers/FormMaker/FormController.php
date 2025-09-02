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

        return view('formmaker.form', compact('forms'));
    }

    public function show($id)
    {
        $form = Form::find($id);
        return view('formmaker.form', compact('form'));
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $form = Form::create($input);
        return redirect()->route('formmaker.form.index');
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
