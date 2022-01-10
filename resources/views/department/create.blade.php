@extends('layouts.app')
@section('Title',__('Department'))

@section('content')
    <div class="container">


    <div class="row">
        @if($errors->any())
            <div class="alert alert-danger" role="alert ">
                <ul>
        @foreach($errors->all() as $error)
                <li>    {{$error}} </li>
                    @endforeach
                </ul>
            </div>
        @endif

<form action="" method="POST">
@csrf

    <div class="mb-3">
    <label class="form-label">{{ __('Enter Name Of Department') }} </label>
    <input class="form-control" type="text" name="name">
    </div>

    <div class="mb-3">
        <label class="form-label">{{ __('Enter Description Of Department') }}</label>
        <input class="form-control" type="text" name="description">
    </div>
    <button type="submit" class="btn btn-success">{{__('Submit')}}</button>
</form>
    </div>


    </div>
@endsection
