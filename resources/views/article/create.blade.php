@extends('layouts.app')
@section('Title',__('Article'))

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
                    <label class="form-label">{{ __('Enter Article Name:') }} </label>
                    <input class="form-control" type="text" name="name">
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Enter Subject Article:') }}</label>
                    <input class="form-control" type="text" name="subject">
                </div>

                <div class="mb-3">
                    <label class="form-label d-block">{{ __('Chose Department Of Article:') }}</label>
                    <div class="form-check" >
                    <label class="form-check-input">IT</label>
                    <input class="form-check-input" type="checkbox" name="department[]" value="IT">
                    </div>
                    <label class="form-check-input">IS</label>
                    <input class="form-check-input" type="checkbox" name="department[]" value="IS">

                </div>

                <button type="submit" class="btn btn-success">{{__('Submit')}}</button>
            </form>
        </div>


    </div>
@endsection

