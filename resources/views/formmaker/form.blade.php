@extends('layouts.formmaker')

@section('content')

    <div class="grid grid-cols-[5fr_1fr] w-full p-3 lg:grow">
        <div id="formContainer" class="border h-auto border-[#1b1b18]">
            @if (isset($form))
                <h4>Form</h4>
                <form action="/formmaker/form/{{ $form->id }}" method="post">
                    @csrf
                    <input name="name" value="{{ $form->name }}">
                    <button type="submit">Save</button>
                </form>
            @else
                <h4>New Form</h4>
                <form action="/formmaker/form" method="post">
                    @csrf
                    <input name="name">
                    <button type="submit">Save</button>
                </form>
            @endif
        </div>
        <div id="formsContainer" class="overflow-y-scroll border h-auto border-[#1b1b18]">
            <h4>Forms</h4>
            @foreach ($forms as $form)
                <a href="/formmaker/form/{{ $form->id }}">{{ $form->name }}</a>
            @endforeach
        </div>
    </div>

@endsection
