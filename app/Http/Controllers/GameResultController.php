<?php

namespace App\Http\Controllers;

use App\Http\Repositories\GameResultRepository;
use Illuminate\Http\Request;

class GameResultController extends Controller
{
    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $gameResultRepository = new GameResultRepository();
        $gameResultRepository->store($request);
    }
}
