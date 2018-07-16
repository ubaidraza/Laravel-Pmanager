<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'name',
          'email',
          'password',
          'first_name',
          'middle_name',
          'last_name',
          'city',
          'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getNameAttribute($value){
        return $this->attributes['name'] = ucfirst($value);
    }


    public function role(){
        return $this->belongsTo(App\Role::class);
    }

    // public function tasks(){
    //     return $this->hasMany(App\Task::class);
    // }

    public function tasks(){
        return $this->belongsToMany(App\Task::class);
    }


    public function companies(){
        return $this->hasMany(App\Company::class);
    }

    public function projects(){
        return $this->belongsToMany(App\Project::class);
    }

    public function comments(){
        $this->morphMany(App\Comment::class,'commentable');
    }

}
