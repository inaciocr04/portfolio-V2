<?php

namespace App\Http\Controllers;

use App\Http\Requests\OriginLanguageRequest;
use App\Models\OriginLanguage;
use Illuminate\Http\Request;

class OriginLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $originLanguages = OriginLanguage::orderBy('name')->get();

        return view('originLanguage.index', compact('originLanguages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('originLanguage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OriginLanguageRequest $request)
    {
        $data = $request->validated();
        $language = new OriginLanguage();
        $language->fill($data);
        $language->save();

        return redirect()->route('originLanguage.index')->with('success', 'Origine du language crée avec succés.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OriginLanguage $originLanguage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OriginLanguage $originLanguage)
    {
        return view('originLanguage.edit', compact('originLanguage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OriginLanguageRequest $request, OriginLanguage $originLanguage)
    {
        $data = $request->validated();
        $originLanguage->fill($data);
        $originLanguage->save();

        return redirect()->route('originLanguage.index')->with('success', 'Origine du language modifier avec succés');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OriginLanguage $originLanguage)
    {
        $originLanguage->delete();

        return redirect()->route('originLanguage.index')->with('success', 'Originie du language supprimer avec succés');
    }
}
