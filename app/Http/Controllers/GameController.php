<?php

namespace App\Http\Controllers;

use App\Models\Game;
use DB;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Scene;
class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    
    {
        $user = auth()->user();
        $games = $user->games;
        return Inertia::render("games/Index",
        [
            "games" => $games
        ]
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render("games/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string|min:3",
            "genre" => "required"
        ]);
        Game::create($data);
        return redirect("/")->with("success","");
    }

    /**
     * Display the specified resource.
     */
    public function show(\App\Models\Game  $game)
    {
        $scenes = $game->scenes;

        return Inertia::render("games/Show",[
            "scenes" => $scenes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {

        return Inertia::render("games/Edit", $game);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        // $game = Game::find
    }
}
