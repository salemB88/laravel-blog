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
                Before {{$created_before}} Days
            </div>


        </div>




    </div>

    <div class="row mt-5 mb-5">

        @foreach ($article->comments as $comment)
            {{-- <h2>{{$comment}}

            </h2> --}}
            <div class="card">
                <div class="card-header">
                        {{$comment->rate}}
                </div>
                <div class="card-body">
                  <blockquote class="blockquote mb-0">
                    <p>{!!$comment->content!!}</p>
                    <footer class="blockquote-footer">By:<cite title="Source Title">{{$comment->user->name}}</cite></footer>
                  </blockquote>
                </div>
              </div>
        @endforeach
    </div>

@auth
    <div class="row mt-5 mb-5">
        <form method="POST" action="{{route('comment.store',$article->id)}}">
            @csrf
            @method('POST')
            <fieldset >
                <legend> {{__('Add comment')}} </legend>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label"></label>
                    <textarea name="content" > </textarea>
                </div>
                {{-- <input type="hidden" name="article_id" value="{{$article->id}}"> --}}
                <input type="number" min="0" max="5" name="rate">

                <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
            </fieldset>
        </form>

    </div>
</div>
@else
<h2 class="text-center">{{__('Must log in to can write comment')}} <a href="/login">Log In</a></h2>
@endauth


@endsection

@section('script')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
