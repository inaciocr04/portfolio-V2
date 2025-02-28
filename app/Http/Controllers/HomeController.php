<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projectsFinishCount = $this->countProjectsFinish();
        $projectsInProgressCount = $this->countProjectsInProgress();
        $projectRandom = $this->randomProject();

        return view('home', compact('projectsFinishCount', 'projectsInProgressCount', 'projectRandom'));
    }

    public function countProjectsFinish()
    {
        return Project::where('status', 'terminé')->count();
    }

    public function countProjectsInProgress()
    {
        return Project::where('status', 'en cours')->count();
    }

    public function randomProject(){
        return Project::where('active', 1)->inRandomOrder()->limit(3)->get();
    }
}

