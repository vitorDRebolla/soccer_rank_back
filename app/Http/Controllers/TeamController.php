<?php

namespace App\Http\Controllers;

use App\Models\Team;

class TeamController extends Controller
{
    /**
     * @return Team[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Team::with('teamInfo')->inRandomOrder()->get();
    }
}
