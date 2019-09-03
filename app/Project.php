<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function studios()
    {
      return $this->belongsToMany('App\Studio', 'project_studios');
    }

    public function bands()
    {
        return $this->belongsToMany('App\Band', 'project_bands');
    }

    public function sessions()
    {
        return $this->hasMany('App\Session');
    }

    public function scopeRoleArray()
    {
        return explode(',', $this->pivot->roles);
    }

    public function scopeTagArray()
    {
        return explode(',', $this->tags);
    }

}
