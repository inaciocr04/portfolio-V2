<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SocialLinks extends Component
{
    public $githubLink;
    public $linkedinLink;
    public $instagramLink;
    public $cvLink;
    public $showForm = false;

    public function mount()
    {
        $this->githubLink = DB::table('settings')->where('key', 'github_link')->value('value');
        $this->linkedinLink = DB::table('settings')->where('key', 'linkedin_link')->value('value');
        $this->instagramLink = DB::table('settings')->where('key', 'instagram_link')->value('value');
        $this->cvLink = DB::table('settings')->where('key', 'cv_link')->value('value');
    }

    public function save()
    {
        DB::table('settings')->where('key', 'github_link')->update(['value' => $this->githubLink]);
        DB::table('settings')->where('key', 'linkedin_link')->update(['value' => $this->linkedinLink]);
        DB::table('settings')->where('key', 'instagram_link')->update(['value' => $this->instagramLink]);
        DB::table('settings')->where('key', 'cv_link')->update(['value' => $this->cvLink]);

        session()->flash('message', 'Liens de réseaux sociaux mis à jour avec succès.');
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
    }

    public function render()
    {
        return view('livewire.social-links');
    }
}

