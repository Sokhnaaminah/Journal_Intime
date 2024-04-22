<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $notes = \App\Models\Note::orderByDesc('date')->get();

    return view('note.index', [
        'notes' => $notes
    ]);
});
Route::get('/notes', [NoteController::class, 'index'])->name('note.index');

Route::get('/notes/show/{note}', [NoteController::class, 'show'])->name('note.show');

Route::get('/notes/create', [NoteController::class, 'create'])->name('note.create');
Route::post('/notes', [NoteController::class, 'store'])->name('note.store');

Route::get('/notes/edit/{note}', [NoteController::class, 'edit'])->name('note.edit');
Route::put('/notes/{note}', [NoteController::class, 'update'])->name('note.update');

Route::post('/notes/search', [NoteController::class, 'search'])->name('note.search');
Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('note.destroy');
