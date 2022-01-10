@extends('layouts.app')

@section('Title','show')

@section('content')
    <div class="container">
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
            </tr>
            </thead>
            <tbody>

                @php($count=0)

                @foreach($departments as $department)
                    <tr>
                        <th scope="row">{{$count}}</th>
                <td>{{$department->name}}</td>
                    <td>{{$department->description}}</td>
                    </tr>
                @endforeach


            </tbody>
        </table>

    </div>
    </div>
@endsection

