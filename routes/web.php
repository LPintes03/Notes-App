<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

// Route::get('/', function () {
//     return view('frontend.index');
// });


Route::get('/', [NoteController::class, 'showNotes'])->name('home');



Route::get('/note/create', [NoteController::class, 'createNote'])->name('createNote');
Route::post('/note/create', [NoteController::class, 'createSubmission'])->name('createNoteSubmission');

Route::get('/note/edit/{id}', [NoteController::class, 'edit'])->name('editNote');
Route::put('/note/update/{id}', [NoteController::class, 'update'])->name('updateNote');

Route::get('/note/delete/{id}', [NoteController::class, 'destroy'])->name('deleteNote');
