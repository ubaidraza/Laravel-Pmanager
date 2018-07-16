<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'days',
        'user_id',
        'company_id'

     ];

    //  public function user(){
    //     return $this->belongsTo(App\User::class);
    //  }

     public function tasks(){
        return $this->hasMany(App\Task::class);
     }

     public function company(){
         return $this->belongsTo(App\Company::class);
     }

     public function users(){
         return $this->belongsToMany(User::class);
     }

     public function comments(){
       return $this->morphMany(Comment::class,'commentable');
    }
}
