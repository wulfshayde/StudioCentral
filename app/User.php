<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{

    //region Class Properties
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //endregion

    //region Relationships
    public function profile()
    {
      return $this->hasOne('App\Profile');
    }

    public function bands()
    {
        return $this->belongsToMany('App\Band', 'band_users')->withPivot('roles');
    }

    public function studios()
    {
      return $this->belongsToMany('App\Studio', 'studio_users')->withPivot('roles');
    }

    public function projects()
    {
      return $this->belongsToMany('App\Project', 'project_users')->withPivot('roles');
    }

    public function notifications()
    {
      return $this->hasMany('App\Notification');
    }
    //endregion

    //region Functions
    public function IsRole(string $role)
    {
        $roles = $this->scopeRoles();
        return in_array($role, $roles);
    }
    //endregion

    //region Scoped Attributes
    public function scopeIsAdministrator()
    {
        $roles = $this->scopeRoles();
        return in_array('Administrator', $roles);
    }

    public function scopeRoles()
    {
        return explode(',',$this->profile->roles);

    }

    public function scopeProjectCount()
    {
        $project_count = 0;
        $studios = $this->studios;
        foreach ($studios as $studio){
            $project_count = $project_count + $studio->projects->count();
        }
        return $project_count;
    }

    public function scopeSessionCount()
    {
        $session_count = 0;
        $studios = $this->studios;
        foreach ($studios as $studio){
            foreach ($studio->projects as $project){
                $session_count = $session_count + $project->sessions->count();
            }
        }
        return $session_count;
    }

    //endregion

}
