<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimelineRequest;
use App\Models\Timeline;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timelines = Timeline::orderBy('title')->get();

        return view('timeline.index', compact('timelines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('timeline.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TimelineRequest $request)
    {
        $data = $request->validated();
        $timeline = new Timeline();
        $timeline->fill($data);
        $timeline->save();
        return redirect()->route('timeline.index')->with('success', 'L\'élément est crée avec succés.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Timeline $timeline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Timeline $timeline)
    {
        return view('timeline.edit', compact('timeline'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TimelineRequest $request, Timeline $timeline)
    {
        $data = $request->validated();
        $timeline->fill($data);
        $timeline->save();

        return redirect()->route('timeline.index')->with('success', 'L\'élément est modifier avec succés.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Timeline $timeline)
    {
        $timeline->delete();
        return redirect()->route('timeline.index')->with('success', 'L\'élément est supprimer avec succés.');
    }
}
