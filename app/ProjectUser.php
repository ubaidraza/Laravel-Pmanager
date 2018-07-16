<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    protected $fillable = [
        'project_id',
        'user_id'
     ];

     public function users(){
        return $this->belongsToMany(App\User::class);
    }

    public function projects(){
        return $this->belongsToMany(App\Project::class);
    }
}
