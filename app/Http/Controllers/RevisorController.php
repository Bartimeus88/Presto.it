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
        $announcement->status_date = now();
        $announcement->setAccepted(true);        
        return redirect()->back()->with('message','Compliment,hai accettato l\'annuncio');
    }

    public function rejectAnnouncement(Announcement $announcement){
        $announcement->status_date = now();
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

    public function editRevisor(Request $request){

        $lastAnnuncementModified = Announcement::latest('status_date')->first();
        if ($lastAnnuncementModified->status_date) {
            $lastAnnuncementModified->is_accepted = null;
            $lastAnnuncementModified->status_date = null;
            $lastAnnuncementModified->save();
            $successMessage = "L'ultima modifica relativa all'annuncio con il titolo " . $lastAnnuncementModified->title . " è stata annullata";
        } else {
            $successMessage = "Nessun annuncio trovato per annullare l'ultima modifica";
        }
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
    
        return redirect()->route('revisor.index')->with(['successMessage' => $successMessage, 'announcement_to_check' => $announcement_to_check]);
    }
    
}
