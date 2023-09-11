<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index() {
        $announcement_to_check = Announcement::where('is_accepted',null)->first();
        return view('revisor.index',compact('announcement_to_check'));
    }

    public function acceptAnnouncement(Announcement $announcement){
        $announcement->setAccepted(true);
        return redirect()->back()->with('message','Compliment,hai accettato l\'annuncio');
    }

    public function rejectAnnouncement(Announcement $announcement){
        $announcement->setAccepted(false);
        return redirect()->back()->with('message','Compliment,hai rifiutato l\'annuncio');
    }

    public function createRevisor(){
        return view ('revisor.create');
    }

    public function becomeRevisor() {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message','Complimenti!La tua richiesta di diventare revisore è andata a buon fine');
    }

    public function makeRevisor(User $user){
        Artisan::call('presto:MakeUserRevisor',['email'=>$user->email]);
        return redirect('/')->with('message','Complimenti! L\'utente è diventato revisore');
    }

    public function requestRevisor(){

        $currentUser= Auth::user();
        return view ('revisor.request', ['user'=> $currentUser]);

    }
}
