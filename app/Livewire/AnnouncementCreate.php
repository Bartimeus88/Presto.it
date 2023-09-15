<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;

class AnnouncementCreate extends Component
{

    public $title , $description , $price , $color,$text, $category;

    protected $rules = [
        'title' => 'required|min:6',
        'description'=> 'required|min:6',
        'price'=>'required|numeric',
        'category'=>'required'
    ];

    protected $messages = [
        'required'=>'Il campo è richiesto',
        'min'=>'Il campo è troppo corto , minimo 6 caratteri',
        'numeric'=>'Il campo dev\'essere un numero'
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
