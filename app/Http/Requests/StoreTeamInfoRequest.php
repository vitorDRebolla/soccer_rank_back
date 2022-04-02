<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'team_id' => 'required|unique:teams',
            'points' => 'required|numeric',
            'games' => 'required|numeric',
            'wins' => 'required|numeric',
            'draws' => 'required|numeric',
            'loses' => 'required|numeric',
            'goals' => 'required|numeric',
            'goals_against' => 'required|numeric',
            'goal_difference' => 'required|numeric',
        ];
    }
}
