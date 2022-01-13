@extends('layouts.app')


@section('Title','Edit')

@section('content')

    <div class="container">

        <div class="row">

            <div class="mb-3">
            <label class="form-label">Article Name:</label>
            <input class="form-control" type="text" value="{{$article->name}}">
            </div>

            <div class="mb-3">
                <label class="form-label">Article Description:</label>
                <input class="form-control" type="text" value="{{$article->subject}}">
            </div>



        </div>
    </div>

@endsection
