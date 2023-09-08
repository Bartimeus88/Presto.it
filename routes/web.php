<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/',[FrontController::class,'home'])->name('home.index');
Route::get('/categoria/{category}',[FrontController::class,'categoryShow'])->name('categoryShow');


Route::get('/nuovo/annuncio',[AnnouncementController::class,'createAnnouncement'])
->middleware('auth')
->name('announcements.create');

Route::get('/dettaglio/annuncio/{announcement}',[AnnouncementController::class,'showAnnouncement'])->name('announcements.show');

Route::get('/tutti/annunci',[AnnouncementController::class,'indexAnnouncement'])->name('announcements.index');

Route::get('/revisor/home',[RevisorController::class,'index'])->name('revisor.index');

Route::patch('/accetta/annuncio/{announcement}',[RevisorController::class,'acceptAnnouncement'])->name('revisor.accept_announcement');

Route::patch('/rifiuta/annuncio/{announcement}',[RevisorController::class,'rejectAnnouncement'])->name('revisor.reject_announcement');