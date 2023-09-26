<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User; // Assicurati che il namespace sia corretto per il tuo modello User

class Favorite extends Component
{
    public $announcement;
    public $isFavorite;

    public function mount($announcement)
    {
        $this->announcement = $announcement;
        $this->isFavorite = $this->announcementIsFavorite();
    }

    public function toggleFavorite()
    {
        $user = auth()->user(); // Recupera l'utente autenticato

        if ($this->isFavorite) {
            // Rimuovi l'annuncio dai preferiti dell'utente
            $user->favorites()->detach($this->announcement->id);
        } else {
            // Aggiungi l'annuncio ai preferiti dell'utente
            $user->favorites()->attach($this->announcement->id);
        }

        $this->isFavorite = !$this->isFavorite; // Inverti lo stato dei preferiti
    }

    private function announcementIsFavorite()
    {
        $user = auth()->user(); // Recupera l'utente autenticato

        return $user->favorites > 0;
    }

    public function render()
    {
        return view('livewire.favorite');
    }
}
