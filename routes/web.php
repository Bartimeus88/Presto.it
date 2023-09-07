<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
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