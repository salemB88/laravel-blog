<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\department;
use Carbon\Carbon;
use http\Client\Curl\User;
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

    public function __construct()
    {

        $this->middleware('auth')->except('show');
    }

    public function index()
    {

        $user = Auth::user();
        $userArticle = $user->articles;

        //dd($userArticle);

        return view('article.main', compact('userArticle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = new department();
        $departments->all();


        return view('article.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticle $request)
    {
        $user = Auth::user();
        $article =  $user->articles()->create($request->all());
        $article->departments()->attach($request->department);
        //        $article= article::find($data->id);
        //        $article->departments()->attach($request->department);
        return redirect()->to('/article');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(article $article)
    {


        $todayDate = Carbon::now();
        $created_before = $article->created_at->diffInDays($todayDate);
        // $article_comments = $article->comments;
        return view('article.show', compact('article', 'created_before'));
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
        $user = Auth::user();
        $articles = $user->articles()->find($article->id);
        $departments = department::select('id', 'name', 'description')->get();


        if ($articles) {
            $articlesDepartment = $articles->departments()->pluck('id')->toArray();
            return view('article.edit', compact('articles', 'departments', 'articlesDepartment'));
        } else {
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
    public function update(StoreArticle $request, article $article)
    {
        $user = Auth::user();
        $articles = $user->articles()->find($article->id);



        if ($articles) {
            $article->update($request->all());
            $article->departments()->sync($request->department);
            return redirect()->to('/article')->with('process-status', __('Article Edit Successful'));
        } else {
            return abort(401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(article $article)
    {
        $user = Auth::user();
        $articles = $user->articles()->find($article->id);



        if ($articles) {

            // remove department category from pivot table before delete article
            $article->departments()->detach($article->departments);
            $article->delete();
            return redirect()->to('/article');
        } else {

            return abort(401);
        }
    }


    public function calclute_days()
    {
        $dateDay = Carbon::now();
        $today = date_format($dateDay, "Y");
        return $today;
    }
}
