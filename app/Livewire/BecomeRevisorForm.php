<?php

namespace App\Livewire;

use Livewire\Component;
use App\Mail\BecomeRevisor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BecomeRevisorForm extends Component
{
    public $formMessage, $feedback;
    public function render()
    {
        return view('livewire.become-revisor-form');
    }

    public function becomeRevisor()
    {
        $mailMessage = $this->formMessage;
        
        // Passa correttamente la variabile $mailMessage al costruttore di BecomeRevisor
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user(), $mailMessage));
        $this->formMessage="";
        $this->feedback= "Richiesta inviata correttamente";

    }
    
}
