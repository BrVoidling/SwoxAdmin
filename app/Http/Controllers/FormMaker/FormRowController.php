<?php

namespace App\Http\Controllers\FormMaker;

use App\Http\Controllers\Controller;
use App\Models\FormRow;
use Illuminate\Http\Request;

class FormRowController extends Controller
{
    public function index($form_id)
    {
        $form_rows = FormRow::where('form_id', $form_id)->get();

        return view('formmaker.form_row', compact('form_rows'));
    }


    public function massStore(Request $request, $form_id)
    {
        $input = $request->all();
        $form_rows = $input['form_rows'];

        foreach ($form_rows as $form_row) {
            FormRow::create($form_row);
        }
        return redirect()->route('formmaker.form_row.index', $form_id);
    }

    public function updateForm(Request $request, $form_id)
    {
        $input = $request->all();
        $form_rows = $input['form_rows'];

        foreach ($form_rows as $form_row) {
            if ($form_row['id'] == null) {
                FormRow::create($form_row);
            } else {
                FormRow::find($form_row['id'])->update($form_row);
            }
        }
        return redirect()->route('formmaker.form_row.index', $form_id);
    }

    //Single form row functions
    public function show($id)
    {
        $form_row = FormRow::find($id);
        return view('formmaker.form_row', compact('form_row'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $form_row = FormRow::create($input);
        return redirect()->route('formmaker.form_row.index', $form_row->form_id);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $form_row = FormRow::find($id);
        $form_row->update($input);
        return redirect()->route('formmaker.form_row.index', $form_row->form_id);
    }


    public function destroy($id)
    {
        $form_row = FormRow::find($id);
        $form_row->delete();
        return redirect()->route('formmaker.form_row.index', $form_row->form_id);
    }
}
