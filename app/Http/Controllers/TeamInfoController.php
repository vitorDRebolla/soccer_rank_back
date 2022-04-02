<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamInfoRequest;
use App\Http\Requests\UpdateTeamInfoRequest;
use App\Models\Team;
use App\Models\TeamInfo;

class TeamInfoController extends Controller
{
     /**
     * @param Team $team
     * @param StoreTeamInfoRequest $request
     */
    public function store(Team $team, StoreTeamInfoRequest $request)
    {
        $validatedRequest = $request->validated();
        $team->teamInfo()->create($validatedRequest);
    }

    /**
     * @param Team $team
     * @param UpdateTeamInfoRequest $request
     * @param TeamInfo $teamInfo
     */
    public function update(Team $team, UpdateTeamInfoRequest $request, TeamInfo $teamInfo)
    {
        $validatedRequest = $request->validated();
        $teamInfo->update($validatedRequest);
    }
}
