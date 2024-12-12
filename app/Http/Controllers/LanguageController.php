<?php

namespace App\Http\Controllers;

use App\Http\Requests\LanguageRequest;
use App\Models\Language;
use App\Models\OriginLanguage;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $originLanguages = OriginLanguage::all();
        return view('language.create', compact('originLanguages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LanguageRequest $request)
    {
        $data = $request->validated();
        $language = new Language();
        $language->fill($data);
        $language->save();

        $language->originLanguages()->sync($data['origin_languages'] ?? null);

        return redirect()->route('language.index')->with('success', 'Le language est créer avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $language)
    {
        return view('language.show', compact('language'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        $originLanguages = OriginLanguage::all();
        $languageOriginLanguages = $language->originLanguages->pluck('id')->toArray();
        return view('language.edit', compact('language', 'originLanguages', 'languageOriginLanguages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LanguageRequest $request, Language $language)
    {
        $data = $request->validated();
        $language->fill($data);
        $language->save();

        $language->originLanguages()->sync($data['origin_languages'] ?? null);


        return redirect()->route('language.index')->with('success', 'Langage mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        $language->delete();

        return redirect()->route('language.index')->with('success', 'Le language est bien supprimer');
    }
}
