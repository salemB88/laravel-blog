@extends('layouts.app')

@section('Title','Show')

@section('content')

    <div class="container">

        <div class="row">

            <div class="card text-center">
                <div class="card-header">
                    <h5 class="card-title">{{$article->name}}</h5>
                </div>
                <div class="card-body">

                    <p class="card-text">{!! $article->subject !!}</p>

                </div>
                <div class="card-footer text-muted">
                 Before   {{$created_before}} Days
                </div>


            </div>
        </div>
    </div>
@endsection
