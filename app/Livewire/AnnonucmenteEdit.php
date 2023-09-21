<?php

namespace App\Livewire;
use File;
use Livewire\Component;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;


class AnnonucmenteEdit extends Component
{
    use WithFileUploads;

    public $announcement, $title, $description , $price , $color, $text, $category ,$temporary_images, $images=[], $currentImages, $image;

    public function mount($announcement)
    {
        
        $this->title = $this->announcement->title;
        $this->description = $this->announcement->description;
        $this->price = $this->announcement->price;
        $this->category = $this->announcement->price;
        $this->currentImages=$this->announcement->images;
        
    }

    public function render()
    {
       $announcement=$this->announcement;
        return view('livewire.annonucmente-edit', ['announcement'=>$announcement]);
    }

       
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

       $currentAnnouncemet=Announcement::find($this->announcement->id);
       $currentAnnouncemet->title=$this->title;
       $currentAnnouncemet->description=$this->description;
       $currentAnnouncemet->category_id=$this->category;
       $currentAnnouncemet->price=$this->price;
       $currentAnnouncemet->status_date=null;
       $currentAnnouncemet->is_accepted=null;
       $currentAnnouncemet->user_revisor_id=null;
       $currentAnnouncemet->save();

        //if per controllare se ci sono immagini e nel caso crea un path nella tabella e le salva tramite store nel public images
        if(count($this->images)){
            foreach ($this->images as $image) {
                
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path'=>$image->store($newFileName, 'public')]);
    
                dispatch (new ResizeImage($newImage->path , 400 , 300 )); }
    
                File::deleteDirectory(storage_path('app/livewire-tmp'));
            }


       //messaggio flash che compare dopo il save con successo
       session()->flash('message','Annuncio modificato con successo e in attesa di validazione');
       }

    //rende le validazioni di errore in tempo reale
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

}
