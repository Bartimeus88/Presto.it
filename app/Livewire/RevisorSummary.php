<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Announcement;

class RevisorSummary extends Component
{
    public function render()
    {
        $users= User::all();
        $announcements= Announcement::all();
        return view('livewire.revisor-summary', ['announcements'=>$announcements,'users'=>$users]);
    }
}
