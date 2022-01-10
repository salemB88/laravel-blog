<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetLocal extends Controller
{

    public function change_local($lang){
        $url=str_replace(url('/'),'', url()->previous());
        $url=str_replace('/ar','', $url);
        $url=str_replace('/en','', $url);

        return redirect()->to($lang.$url);

    }


    public function route(){
        return view('pg1');
    }
}
