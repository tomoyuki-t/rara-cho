<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body', 'published_at'];
    protected $dates = ['published_at'];
    public function scopePublished($query){
        $query->where('published_at', '<=', Carbon::now());
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
