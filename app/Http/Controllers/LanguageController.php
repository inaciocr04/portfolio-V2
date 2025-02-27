<?php

namespace App\Http\Controllers;

use App\Http\Requests\LanguageRequest;
use App\Models\Language;
use App\Models\LanguageType;
use App\Models\OriginLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $languageTypes = LanguageType::all();
        return view('language.create', compact('originLanguages', 'languageTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LanguageRequest $request)
    {
        // Validation des données
        $data = $request->validated();

        if (!isset($data['language_type_id'])) {
            return redirect()->back()->withErrors(['language_type_id' => 'Le type de langage est requis.']);
        }

        if (!LanguageType::where('id', $data['language_type_id'])->exists()) {
            return redirect()->back()->withErrors(['language_type_id' => 'Type de langage invalide.']);
        }

        $language = new Language();
        if ($request->hasFile('logo_language')) {
            $file = $request->file('logo_language');

            if ($file->isValid()) {
                $fileHash = md5_file($file->getRealPath());

                $existingPath = $this->findExistingFile('languages', $fileHash);
                if ($existingPath) {
                    $data['logo_language'] = $existingPath;
                } else {
                    $data['logo_language'] = $file->storeAs(
                        'languages',
                        $fileHash . '.' . $file->getClientOriginalExtension(),
                        'public'
                    );
                }
            } else {
                return redirect()->back()->withErrors(['logo_language' => 'Le fichier uploadé est invalide.']);
            }
        }

        // Remplissage et sauvegarde du modèle Language
        $language->fill($data);
        $language->save();

        // Synchronisation des langues d'origine si présentes
        $language->originLanguages()->sync($data['origin_languages'] ?? null);

        // Redirection avec message de succès
        return redirect()->route('language.index')->with('success', 'Le language a été créé avec succès.');
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
        $languageTypes = LanguageType::all();
        $languageOriginLanguages = $language->originLanguages->pluck('id')->toArray();
        return view('language.edit', compact('language', 'originLanguages', 'languageOriginLanguages', 'languageTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LanguageRequest $request, Language $language)
    {
        $data = $request->validated();

        if (!LanguageType::where('id', $data['language_type_id'])->exists()) {
            return redirect()->back()->withErrors(['language_type_id' => 'Type de langage invalide.']);
        }

        $language->fill($data);

        if ($request->hasFile('logo_language')) {
            $file = $request->file('logo_language');
            $fileHash = md5_file($file->getRealPath());

            // Vérifier si une image avec ce hash existe déjà
            $existingPath = $this->findExistingFile('languages', $fileHash);

            if ($existingPath) {
                // Réutiliser le fichier existant
                $data['logo_language'] = $existingPath;
            } else {
                // Supprimer l'ancienne image
                if ($project->image_visuel) {
                    Storage::delete('public/' . $language->logo_language);
                }

                // Enregistrer le nouveau fichier
                $data['logo_language'] = $file->storeAs(
                    'languages',
                    $fileHash . '.' . $file->getClientOriginalExtension(),
                    'public'
                );
            }
        }
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
    private function findExistingFile($directory, $hash)
    {
        $files = \Storage::disk('public')->files($directory);

        foreach ($files as $file) {
            if (strpos($file, $hash) !== false) {
                return $file; // Retourne le chemin du fichier existant
            }
        }

        return null; // Aucun fichier trouvé avec ce hash
    }

}
