@extends('layouts.app')

@section('Title','Article')

@section('content')

    <div class="container">
        @if(session()->has('process-status'))
            <div class="alert alert-success">
                <p>{{session()->get('process-status')}}</p>
            </div>
        @endif



{{--                //check if user have articles in database or didn't have any article--}}


{{--                //if there article--}}
                @if(count($userArticle)>1)

                <div class="row">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>

                @php($count=0)
                @foreach($userArticle as $article)
                <tr>
                    <th scope="row">{{$count++}}</th>
                    <td>{{$article->name}}</td>
                    <td>{!! $article->subject !!}</td>
                    <td> <a class="" href="{{route('article.edit',$article->id)}}"><i class="far fa-edit"></i></a>   </td>
                    <td>

                        <form method="POST" action="{{route('article.destroy',$article->id)}}">
                            @csrf
                    @method('DELETE')
                     <td> <button type="submit"><i class="fas fa-trash-alt"></i></button> </td>


                    </form>



                </tr>
                @endforeach
                </tbody>
            </table>

            @else
                <div class="row">
                    <h2>Empty Category</h2>
                </div>

            @endif





<div class="row">             <a href="{{route('article.create')}}" class="btn btn-success">Create New Article</a> </div>


        </div>
    </div>
@endsection

