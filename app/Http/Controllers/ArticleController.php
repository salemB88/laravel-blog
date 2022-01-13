<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\department;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticle;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $departments= new department();
        $departments->all();


return view('article.create',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticle $request)
    {
        $user= Auth::user();
      $article=  $user->articles()->create($request->all());
      $article->departments()->attach($request->department);
//        $article= article::find($data->id);
//        $article->departments()->attach($request->department);
        dd($request->department);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(article $article)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(article $article)
    {
//   dd($article->subject);
//   return view('article.edit' , compact('article'));
        $user= Auth::user();
        $articles= $user->articles()->find($article->id);

        if($articles){
            return 'true';
        } else
        {
            return abort(401);
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(article $article)
    {
        //
    }
}
