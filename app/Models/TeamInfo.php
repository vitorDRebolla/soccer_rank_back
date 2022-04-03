<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamInfo extends Model
{
    use HasFactory;

    protected $table = 'team_info';
    protected $fillable = [
        'team_id',
        'points',
        'games',
        'wins',
        'loses',
        'draws',
        'goals',
        'goals_against',
        'goal_difference',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
