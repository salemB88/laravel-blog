<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class article extends Model
{
    use HasFactory;
    use SoftDeletes;


protected $fillable=['name','subject','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function departments(){
        return $this->belongsToMany(department::class,'table_articles_department');
    }
    public function comments(){
        return $this->hasMany(comment::class);
    }
}
