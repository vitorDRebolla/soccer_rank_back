<?php

namespace App\Http\Repositories;

use App\Models\TeamInfo;

class GameResultRepository
{

    /**
     * @param $request
     */
    public function store($data)
    {
        $homeTeamInfo = $data['homeTeamInfo'];
        $visitorTeamInfo = $data['visitorTeamInfo'];
        $homeTeamScore = $data['homeTeamScore'];
        $visitorTeamScore = $data['visitorTeamScore'];

        if($homeTeamScore === $visitorTeamScore) {
            $homeTeamInfo = $this->setGameData('draws', $homeTeamInfo, $homeTeamScore, $visitorTeamScore);
            $visitorTeamInfo = $this->setGameData('draws', $visitorTeamInfo, $visitorTeamScore, $homeTeamScore);
        }

        if($homeTeamScore > $visitorTeamScore) {
            $homeTeamInfo = $this->setGameData('wins', $homeTeamInfo, $homeTeamScore, $visitorTeamScore);
            $visitorTeamInfo = $this->setGameData('loses', $visitorTeamInfo, $visitorTeamScore, $homeTeamScore);
        }

        if($visitorTeamScore > $homeTeamScore) {
            $homeTeamInfo = $this->setGameData('loses', $homeTeamInfo, $homeTeamScore, $visitorTeamScore);
            $visitorTeamInfo = $this->setGameData('wins', $visitorTeamInfo, $visitorTeamScore, $homeTeamScore);
        }

        $this->updateOrCreate($homeTeamInfo);
        $this->updateOrCreate($visitorTeamInfo);

    }

    private function setGameData($gameResult, $teamInfo, $goals, $goalsAgainst)
    {
        $teamInfo[$gameResult]++;
        $teamInfo['games']++;
        $teamInfo['goals'] = $teamInfo['goals'] + $goals;
        $teamInfo['goals_against'] = $teamInfo['goals_against'] + $goalsAgainst;
        $teamInfo['goal_difference'] = $teamInfo['goals'] - $teamInfo['goals_against'];

        switch ($gameResult) {
            case 'wins':
                $points = 3;
                break;
            case 'loses':
                $points = 0;
                break;
            default:
                $points = 1;
        }

        $teamInfo['points'] = $teamInfo['points'] + $points;

        return $teamInfo;
    }

    private function updateOrCreate($teamInfo)
    {
        TeamInfo::updateOrCreate(
            [
                'team_id' => $teamInfo['team_id']
            ],
            [
                'points' => $teamInfo['points'],
                'games' => $teamInfo['games'],
                'wins' => $teamInfo['wins'],
                'loses' => $teamInfo['loses'],
                'draws' => $teamInfo['draws'],
                'goals' => $teamInfo['goals'],
                'goals_against' => $teamInfo['goals_against'],
                'goal_difference' => $teamInfo['goal_difference'],
            ]
        );
    }
}
