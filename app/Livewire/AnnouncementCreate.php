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
        'title' => 'required|min:4',
        'description'=> 'required|min:8',
        'price'=>'required|numeric|digits_between:0,8',
        'category'=>'required'
    ];

    protected $messages = [
        'required'=>'Il campo :attribu2te è richiesto',
        'min'=>'Il campo :attribute è troppo corto',
        'numeric'=>'Il campo :attribute dev\'essere un numero'
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
