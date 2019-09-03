<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Project;

class ProjectController extends Controller
{
    public function view(int $id)
    {
        $project = Project::find($id);
        return view('projects.view',compact('project'));
    }

    public function list()
    {

    }
}
