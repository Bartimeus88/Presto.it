<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;

class AnnouncementCreate extends Component
{

    public $title , $description , $price , $color,$text, $category;
    
    public function store() {

        $validated = $this->validate([

            'title' => 'required|min:4',
            'description'=> 'required|min:4',
            'price'=>'required|numeric',
            'category'=>'required'

        ]);

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
