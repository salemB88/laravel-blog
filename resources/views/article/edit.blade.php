@extends('layouts.app')


@section('Title','Edit')

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




            <form action="{{route('article.update',$articles->id)}}" method="post">
                @csrf
                @method('PATCH')


<h2 class="text-center">Article Edit Form</h2>
                <div class="mb-3">
                    <label class="form-label">{{ __('Enter Article Name:') }} </label>
                    <input class="form-control" type="text" name="name" value="{{$articles->name}}">
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Enter Subject Article:') }}</label>
                    <input class="form-control" type="text" name="subject" value="{{$articles->subject}}">
                </div>

                <div class="mb-3">
                    <label class="form-label d-block">{{ __('Chose Department Of Article:') }}</label>

                    {{--Get all departments to can choice  article are  related og which topic--}}
                    @foreach($departments as $depaertment)
                        <div class="form-check" >
                            <input class="form-check-input" type="checkbox" name="department[]" id="input_{{$depaertment->name}}" value="{{$depaertment->id}}"  @if(in_array($depaertment->id,$articlesDepartment)) checked  @endif >

{{--                            <h2>{{$articlesDepartment}}</h2>--}}
                            <label class="form-check-label" for="input_{{$depaertment->name}}">{{$depaertment->name}}</label>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-success">{{__('Edit')}}</button>
            </form>

        </div>
    </div>

@endsection
