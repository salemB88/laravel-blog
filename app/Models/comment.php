<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['content','rate','article_id','user_id'];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function article(){
        $this->belongsTo(article::class);
    }
}
