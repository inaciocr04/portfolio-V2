<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProjectsCount extends Component
{

    public $projectsFinishCount;
    public $projectsInProgressCount;

    public function mount()
    {
        $this->updateCounts();
    }

    public function updateCounts()
    {
        $this->projectsFinishCount = Project::where('status', 'terminé')->count();
        $this->projectsInProgressCount = Project::where('status', 'en cours')->count();
    }

    public function render()
    {
        $this->updateCounts();
        return view('livewire.projects-count');
    }
}
