<?php

namespace App\Http\Controllers;

use App\Http\Requests\LanguageTypeRequest;
use App\Models\LanguageType;
use Illuminate\Http\Request;

class LanguageTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languageTypes = LanguageType::orderBy('name')->get();

        return view('languageType.index', compact('languageTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('languageType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LanguageTypeRequest $request)
    {
        $data = $request->validated();
        $languageType = new LanguageType();
        $languageType->fill($data);
        $languageType->save();

        return redirect()->route('languageType.index')->with('success', 'Le type de language crée avec succés.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LanguageType $languageType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LanguageType $languageType)
    {
        return view('languageType.edit', compact('languageType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LanguageTypeRequest $request, LanguageType $languageType)
    {
        $data = $request->validated();
        $languageType->fill($data);
        $languageType->save();

        return redirect()->route('languageType.index')->with('success', 'Le type de language modifier avec succés.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LanguageType $languageType)
    {
        $languageType->delete();

        return redirect()->route('languageType.index')->with('success', 'Le type de language supprimer avec succés.');
    }
}
