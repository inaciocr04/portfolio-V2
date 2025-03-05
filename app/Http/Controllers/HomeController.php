<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\LanguageType;
use App\Models\Project;
use App\Models\Timeline;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projectsFinishCount = $this->countProjectsFinish();
        $projectsInProgressCount = $this->countProjectsInProgress();
        $projectRandom = $this->randomProject();
        $timelines = $this->timeline();
        $languages = $this->languages();
        $languageTypes = $this->languageType();

        return view('home', compact('projectsFinishCount', 'projectsInProgressCount', 'projectRandom', 'timelines', 'languages', 'languageTypes'));
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

    public function timeline(){
        return Timeline::orderBy('id', 'desc')->get();
    }
    public function languageType() {
        return LanguageType::all();
    }
    public function languages() {
        return Language::all();
    }
}

