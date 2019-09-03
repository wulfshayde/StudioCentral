<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Studio;

class StudioController extends Controller
{
    #region Functions
    public function list()
    {
        $studios = Auth::user()->studios;
        return view('studios.list',compact('studios'));
    }


    /**
     * @param int $studio_id
     */
    public function view(int $studio_id)
    {
        $studio = Studio::with('users','bands','projects')->find($studio_id);
        \Debugbar::info($studio);
        return view('studios.view', compact('studio'));
    }
    #endregion
}
