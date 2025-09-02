<?php

namespace App\Http\Controllers\FormMaker;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('formmaker.question', compact('questions'));
    }

    public function show($id)
    {
        $question = Question::find($id);
        return view('formmaker.question', compact('question'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $question = Question::create($input);
        return redirect()->route('formmaker.question.index');
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $question = Question::find($id);
        $question->update($input);
        return redirect()->route('formmaker.question.index');
    }

    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();
        return redirect()->route('formmaker.question.index');
    }
}
