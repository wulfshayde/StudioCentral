<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Studio extends Model
{

    protected $table = 'studios';

    //region Relationships
    public function projects()
    {
        return $this->belongsToMany('App\Project', 'project_studios')->withPivot('roles');
    }

    public function bands()
    {
        return $this->belongsToMany('App\Band', 'studio_bands')->withPivot('roles');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'studio_users')->withPivot('roles');
    }
    //endregion

    //region Scope Attributes
    public function scopeIsStudioAdmin()
    {
        $roles = $this->scopeRoleArray();
        return in_array("Administrator", $roles);
    }

    public function scopeRoleArray()
    {
        //return explode(',', $this->pivot->roles);
        $users = $this->users;
        $user_id = Auth::user()->id;
        foreach ($users as $user){
            if($user->id === $user_id){
                return explode(',', $user->pivot->roles);
            }
        }
        return ['Guest'];
    }
    //endregion

}
