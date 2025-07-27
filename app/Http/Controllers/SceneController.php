<?php

namespace App\Http\Controllers;

use App\Models\Scene;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SceneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scenes = Scene::all();
        return Inertia::render("scenes/Index", [""=> $scenes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render("scenes/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Scene::create($data);
        return redirect()->route("show.index")->with("success","Scene Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Scene $scene)
    {
        return Inertia::render("", [
            "scene" => $scene->id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scene $scene)
    {
        return Inertia::render("scenes/edit", [
            "scene" => $scene->id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Scene $scene)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scene $scene)
    {
        //
    }
}
