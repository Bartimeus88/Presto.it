<?php

namespace App\Livewire;

use Livewire\Component;

class CreateAnnouncement extends Component
{
    public function render()
    {
        return view('livewire.create-announcement');
    }

    public function store()
    {

        $validated = $this->validate([

            'title' => 'required',
            'description'=> 'required',
            'price'=>'required'

        ]);
        $annuncement = new Annuncement;

        $annuncement->title = $this->title;
        $annuncement->description = $this->description;
        $announcement->price = $this->price;

        $annuncement->save();

        $this->title ='';
        $this->description ='';
        $this->price ='';
        $this->message ='Articolo aggiunto con successo';
        $this->color='text-success';

    }


}
