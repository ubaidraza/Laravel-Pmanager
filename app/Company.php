<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
            'name',
            'description',
            'user_id'
     ];

     public function user(){
         return $this->belongsTo(App\User::class);
     }

     public function projects(){
         return $this->hasMany(Project::class);
     }

     public function comments(){
        $this->morphMany(App\Comment::class,'commentable');
    }
}
