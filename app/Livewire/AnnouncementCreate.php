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

    public $title , $description , $price , $color,$text, $category ,$temporary_images;

    public $images=[];
    public $image;



    protected $rules = [
        'title' => 'required|min:6',
        'description'=> 'required|min:6',
        'price'=>'required|numeric',
        'category'=>'required',
        'images.*'=>'image|max:1024',
        'temporary_images.*'=>'image|max:1024',
    ];

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

    
    public function store() {

       $this->validate();


        $category = Category::find($this->category);
        $announcement = $category->announcements()->create([
            'title'=>$this->title,
            'description'=>$this->description,
            'price'=>$this->price
        ]);

        session()->flash('message','Annuncio inserito con successo');
    
        Auth::user()->announcements()->save($announcement);

        $this->cleanForm();

    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function cleanForm() {
        $this->title ='';
        $this->description ='';
        $this->price='';
        $this->category='';
        }

    public function render()
    {
        return view('livewire.announcement-create');
    }
}
