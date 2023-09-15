<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// ANNUNCEMENT CONTROLLER

//crea annuncio
Route::get('/nuovo/annuncio',[AnnouncementController::class,'createAnnouncement'])->middleware(['auth','verified'])->name('announcements.create');
// mostra dettaglio annuncio
Route::get('/dettaglio/annuncio/{announcement}',[AnnouncementController::class,'showAnnouncement'])->name('announcements.show');
// mostra tutti gli annunci
Route::get('/tutti/annunci',[AnnouncementController::class,'indexAnnouncement'])->name('announcements.index');

// FRONT CONTROLLER

//rotta ricerca annuncio
Route::get('/ricerca/annuncio',[FrontController::class,'searchAnnouncements'])->name('announcements.search');
Route::get('/',[FrontController::class,'home'])->name('home.index');
Route::get('/categoria/{category}',[FrontController::class,'categoryShow'])->name('categoryShow');
// rotta per il form contattaci
Route::post('/contacts/submit',[FrontController::class,'contact'])->name('contact.submit');

// REVISOR CONTROLLER

//pagina revisore
Route::get('/revisor/home',[RevisorController::class,'index'])->middleware('isRevisor')->name('revisor.index');
//accetta annuncio
Route::patch('/accetta/annuncio/{announcement}',[RevisorController::class,'acceptAnnouncement'])->name('revisor.accept_announcement');
//rifiuta annuncio
Route::patch('/rifiuta/annuncio/{announcement}',[RevisorController::class,'rejectAnnouncement'])->name('revisor.reject_announcement');
//richiesta per diventare revisore
Route::get('/richiesta/revisore',[RevisorController::class,'becomeRevisor'])->middleware('auth')->name('become.revisor');
//rendi un utente revisore DA VALUTARE
Route::get('/rendi/revisore/{user}',[RevisorController::class,'makeRevisor'])->name('make.revisor');
// Form richiesta per diventare un revisore
Route::get('/domanda/revisore/',[RevisorController::class,'requestRevisor'])->middleware(['auth', 'verified'])->name('request.revisor');
// annulla l'ultima modifica del revisore
Route::put('/annulla/modifica',[RevisorController::class,'editRevisor'])->middleware('isRevisor')->name('editRevisor');


// USER CONTROLLER

//rotta profilo auth
Route::get('/utenti/profilo',[UserController::class,'profile'])->middleware(['auth','verified'])->name('user.profile');
// Rotta get che porta al form di recupero password 
Route::get('/forgot-password', [UserController::class, 'forgotPassword'])->name('auth.forgot-password');
//rotta google socialite redirect
Route::get('/auth/google/redirect',[UserController::class, 'googleRedirect'])->name('google.redirect');
//rotta google callback
Route::get('auth/google/callback',[UserController::class, 'googleCallback'])->name('google.callback');