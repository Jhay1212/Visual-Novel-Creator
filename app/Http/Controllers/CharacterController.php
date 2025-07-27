<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class CharacterController extends Controller
{
    /**
     * Display a listing of the characters for a specific game.
     */
    public function index(Game $game)
    {
        // Assuming Game hasMany Characters relationship
        $characters = $game->characters()->get();

        return Inertia::render("character/Index", [
            "characters" => $characters,
            "game" => $game,
        ]);
    }

    /**
     * Show the form for creating a new character.
     */
    public function create(Game $game)
    {
        return Inertia::render("character/Create", [
            "game" => $game,
        ]);
    }

    /**
     * Store a newly created character in storage.
     */
    public function store(Request $request, Game $game)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sprite' => 'nullable|string',
            'expression' => 'nullable|string',
        ]);

        // Attach game_id using UUID
        $validated['game_id'] = $game->id;

        $character = Character::create($validated);

        return redirect()
            ->route('games.characters.index', $game->id)
            ->with('success', 'Character created successfully.');
    }

    /**
     * Display the specified character.
     */
    public function show(Game $game, Character $character)
    {
        return Inertia::render("character/Show", [
            "character" => $character,
            "game" => $game,
        ]);
    }

    /**
     * Show the form for editing the specified character.
     */
    public function edit(Game $game, Character $character)
    {
        return Inertia::render("character/Edit", [
            "character" => $character,
            "game" => $game,
        ]);
    }

    /**
     * Update the specified character in storage.
     */
    public function update(Request $request, Game $game, Character $character)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sprite' => 'nullable|string',
            'expression' => 'nullable|string',
        ]);

        $character->update($validated);

        return redirect()
            ->route('games.characters.index', $game->id)
            ->with('success', 'Character updated successfully.');
    }

    /**
     * Remove the specified character from storage.
     */
    public function destroy(Game $game, Character $character)
    {
        $character->delete();

        return redirect()
            ->route('games.characters.index', $game->id)
            ->with('success', 'Character deleted successfully.');
    }
}
