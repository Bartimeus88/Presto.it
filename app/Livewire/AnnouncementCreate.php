<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class AnnouncementCreate extends Component
{

     use WithFileUploads;

    // 

    public $title , $description , $price , $color,$text, $category ,$temporary_images;

    public $images=[];
    public $image;


    //regole per le validazioni
    protected $rules = [
        'title' => 'required|min:6',
        'description'=> 'required|min:6',
        'price'=>'required|numeric',
        'category'=>'required',
        'images.*'=>'image|max:1024',
        'temporary_images.*'=>'image|max:1024',
    ];

    //messaggi personalizzati per le validazioni

    protected $messages = [
        'required'=>'Il campo è richiesto',
        'min'=>'Il campo è troppo corto , minimo 6 caratteri',
        'numeric'=>'Il campo dev\'essere un numero',
        'temporary_images.required'=>'L\'immagine è richiesta',
        'temporary_images.*.image'=>'Dev\'essere un\'immagine',
        'temporary_images.*.max'=>'L\'immagine dev\'essere massimo di 1mb',
        'images.image'=>'Dev\essere un\'immagine',
        'image.max'=>'Dev\'essere massimo di 1mb',
    ];


    //manda le immagini salvate nella $temporary_image.* a $image dopo un'ulteriore validazione

    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*'=>'image|max:1024'
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[]=$image;
            }
        }
    }

    //funzione per rimuovere le immagini caricate una ad una

    public function removeImage($key){
        if(in_array($key,array_keys($this->images))){
            unset($this->images[$key]);
        }
    }

    //funzione store per caricare i dati del nuovo annuncio

    public function store() {



        //fa prima partire le validazioni
       $this->validate();

       //salva i dati nelle tabelle

       $this->announcement = Category::find($this->category)->announcements()->create($this->validate());
       //la tabella images è collegata ad announcements tramite una foreign ma non il contrario,queste due righe di codice la collegano
       $this->announcement->user()->associate(Auth::user());
       $this->announcement->save();
       //if per controllare se ci sono immagini e nel caso crea un path nella tabella e le salva tramite store nel public images
       if(count($this->images)){
        foreach ($this->images as $image) {
            $this->announcement->images()->create(['path'=>$image->store('images','public')]);
        }
       }

       // vecchio codice per salvare annuncio prima delle immagini
        // $category = Category::find($this->category);
        // $announcement = $category->announcements()->create([
        //     'title'=>$this->title,
        //     'description'=>$this->description,
        //     'price'=>$this->price
        // ]);

        //messaggio flash che compare dopo il save con successo
        session()->flash('message','Annuncio inserito con successo, in attesa di validazione');
    
        // Auth::user()->announcements()->save($announcement);

        //richiamo funzione per pulire i campi del form
        $this->cleanForm();

    }

    //rende le validazioni di errore in tempo reale

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    // funzione per pulire i campi del form
    public function cleanForm() {
        $this->title ='';
        $this->description ='';
        $this->price='';
        $this->category='';
        $this->image='';
        $this->images=[];
        $this->temporary_images=[];
        $this->form_id=rand();
        }

        //funzione di ritorno della vista
    public function render()
    {
        return view('livewire.announcement-create');
    }
}
