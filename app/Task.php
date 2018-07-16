<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'days',
        'hours',
        'project_id',
        'company_id',
        'user_id'
     ];

     public function project(){
         return $this->belongsTo(App\Project::class);
     }

     public function company(){
        return $this->belongsTo(App\Company::class);
    }


    public function users(){
        return $this->belongsToMany(App\User::class);
    }

    public function comments(){
        $this->morphMany(App\Comment::class,'commentable');
    }
}
