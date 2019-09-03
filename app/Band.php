<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{

    public function projects()
    {
      return $this->belongsToMany('App\Project', 'project_bands')->withPivot('roles');
    }

    public function scopeGenreArray()
    {
        return explode(',', $this->genres);
    }

    public function scopeRoleArray()
    {
        return explode(',', $this->pivot->roles);
    }

}
