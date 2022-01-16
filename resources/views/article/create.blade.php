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

            <form action="{{route('article.store')}}" method="POST">
                @csrf
@method('POST')
                <div class="mb-3">
                    <label class="form-label">{{ __('Enter Article Name:') }} </label>
                    <input class="form-control" type="text" name="name">
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Enter Subject Article:') }}</label>
                    <textarea name="subject"></textarea>
{{--                    <input class="form-control" type="text" name="subject">--}}
                </div>

                <div class="mb-3">
                    <label class="form-label d-block">{{ __('Chose Department Of Article:') }}</label>

{{--Get all departments to can choice  article are  related og which topic--}}
                    @foreach($departments->all() as $department)
                        <div class="form-check" >
                            <input class="form-check-input" type="checkbox" name="department[]" id="input_{{$department->name}}" value="{{$department->id}}">
                            <label class="form-check-label" for="input_{{$department->name}}">{{$department->name}}</label>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-success">{{__('Submit')}}</button>
            </form>
        </div>


    </div>
@endsection





@section('script')
    <script>
        CKEDITOR.replace( 'subject' );
    </script
@endsection
