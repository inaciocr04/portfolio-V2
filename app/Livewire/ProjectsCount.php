<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ProjectsCount extends Component
{
    public $projectsFinishCount;
    public $projectsInProgressCount;
    public $yearsOftraining;
    public $yearsOfExperience;
    public $showForm = false;

    public function mount()
    {
        $this->updateCounts();
        $this->yearsOftraining = DB::table('settings')->where('key', 'years_of_training')->value('value') ?? 3;
        $this->yearsOfExperience = DB::table('settings')->where('key', 'years_of_experience')->value('value') ?? 2;
    }

    public function updateCounts()
    {
        $this->projectsFinishCount = Project::where('status', 'termine')->count();
        $this->projectsInProgressCount = Project::where('status', 'en_cours')->count();
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm; // Bascule l'affichage
    }

    public function save()
    {
        DB::table('settings')->where('key', 'years_of_training')->update(['value' => $this->yearsOftraining]);
        DB::table('settings')->where('key', 'years_of_experience')->update(['value' => $this->yearsOfExperience]);

        session()->flash('message', 'Données mises à jour avec succès.');
        $this->showForm = false; // Cache le formulaire après sauvegarde
    }

    public function render()
    {
        return view('livewire.projects-count');
    }
}
