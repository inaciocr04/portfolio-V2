<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Language;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('created_at')->get();
        $languages = Language::with('projects')->get();

        return view('project.index', compact('projects', 'languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        return view('project.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $data = $request->validated();
        $project = new Project();

        if ($request->hasFile('image_visuel')) {
            $file = $request->file('image_visuel');
            $fileHash = md5_file($file->getRealPath());
            $existingPath = $this->findExistingFile('projects', $fileHash);
            if ($existingPath) {
                $data['image_visuel'] = $existingPath;
            } else {
                $data['image_visuel'] = $file->storeAs(
                    'projects',
                    $fileHash . '.' . $file->getClientOriginalExtension(),
                    'public'
                );
            }
        }
        for ($i = 1; $i <= 5; $i++) {
            $fieldName = "image_deco$i";
            if ($request->hasFile($fieldName)) {
                $file = $request->file($fieldName);
                $fileHash = md5_file($file->getRealPath());
                $existingPath = $this->findExistingFile('projects', $fileHash);
                if ($existingPath) {
                    $data[$fieldName] = $existingPath;
                } else {
                    $data[$fieldName] = $file->storeAs(
                        'projects',
                        $fileHash . '.' . $file->getClientOriginalExtension(),
                        'public'
                    );
                }
            }
        }
        $project->fill($data);
        $project->save();

        $project->languages()->attach($data['languages'] ?? null);

        return redirect()->route('project.index')->with('success', 'Project crée avec succés');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $languages = Language::with('projects')->get();
        return view('project.show', compact('project', 'languages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $languages = Language::all();
        $projectLanguages = $project->languages->pluck('id')->toArray();
        return view('project.edit', compact('project', 'languages', 'projectLanguages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $project->fill($data);

        if ($request->hasFile('image_visuel')) {
            $file = $request->file('image_visuel');
            $fileHash = md5_file($file->getRealPath());

            // Vérifier si une image avec ce hash existe déjà
            $existingPath = $this->findExistingFile('projects', $fileHash);

            if ($existingPath) {
                // Réutiliser le fichier existant
                $data['image_visuel'] = $existingPath;
            } else {
                // Supprimer l'ancienne image
                if ($project->image_visuel) {
                    Storage::delete('public/' . $project->image_visuel);
                }

                // Enregistrer le nouveau fichier
                $data['image_visuel'] = $file->storeAs(
                    'projects',
                    $fileHash . '.' . $file->getClientOriginalExtension(),
                    'public'
                );
            }
        }

        for ($i = 1; $i <= 5; $i++) {
            $fieldName = "image_deco$i";
            if ($request->hasFile($fieldName)) {
                $file = $request->file($fieldName);
                $fileHash = md5_file($file->getRealPath());

                // Vérifier si une image avec ce hash existe déjà
                $existingPath = $this->findExistingFile('projects', $fileHash);

                if ($existingPath) {
                    // Réutiliser le fichier existant
                    $data[$fieldName] = $existingPath;
                } else {
                    // Supprimer l'ancienne image décorative
                    if ($project->$fieldName) {
                        Storage::delete('public/' . $project->$fieldName);
                    }

                    // Enregistrer le nouveau fichier
                    $data[$fieldName] = $file->storeAs(
                        'projects',
                        $fileHash . '.' . $file->getClientOriginalExtension(),
                        'public'
                    );
                }
            }
        }

        $project->update($data);

        $project->languages()->sync($data['languages'] ?? null);


        return redirect()->route('project.index')->with('success', 'Projet mis à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Vérification et suppression des images liées au projet
        $this->deleteProjectImages($project);

        // Suppression du projet de la base de données
        $project->delete();

        // Redirection avec message de succès
        return redirect()->route('project.index')->with('success', 'Le projet a été supprimé avec succès.');
    }

    private function deleteProjectImages(Project $project)
    {
        // Liste des champs d'image associés au projet
        $imageFields = ['image_visuel', 'image_deco1', 'image_deco2', 'image_deco3', 'image_deco4', 'image_deco5'];

        foreach ($imageFields as $field) {
            // Vérifier si le fichier existe
            if ($project->$field) {
                // Vérifier si l'image est utilisée dans d'autres projets
                if ($this->isImageUsedInOtherProjects($project->$field)) {
                    continue;  // Si l'image est utilisée ailleurs, on ne la supprime pas
                }

                // Supprimer l'image du stockage
                Storage::delete('public/' . $project->$field);
            }
        }
    }

    private function isImageUsedInOtherProjects($imagePath)
    {
        // Compter le nombre de projets qui utilisent cette image
        return Project::where(function($query) use ($imagePath) {
                $query->where('image_visuel', $imagePath)
                    ->orWhere('image_deco1', $imagePath)
                    ->orWhere('image_deco2', $imagePath)
                    ->orWhere('image_deco3', $imagePath)
                    ->orWhere('image_deco4', $imagePath)
                    ->orWhere('image_deco5', $imagePath);
            })->count() > 1;  // Si l'image est utilisée dans plus d'un projet
    }

    private function findExistingFile($directory, $hash)
    {
        // Récupérer tous les fichiers dans le dossier
        $files = Storage::files($directory);

        foreach ($files as $file) {
            // Vérifier si le nom du fichier contient le hash
            if (str_contains($file, $hash)) {
                return $file; // Retourne le chemin du fichier existant
            }
        }

        return null; // Aucun fichier trouvé avec ce hash
    }
}
