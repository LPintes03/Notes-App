<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

// Route::get('/', function () {
//     return view('frontend.index');
// });

//allNotes
Route::get('/', [NoteController::class, 'showNotes'])->name('home');
// search
Route::get("/home",[NoteController::class,'index']);
Route::get("/search",[NoteController::class,'search']);

Route::get('/note/view', [NoteController::class, 'viewNote'])->name('viewNote');

Route::get('/note/create', [NoteController::class, 'createNote'])->name('createNote');
Route::post('/note/create', [NoteController::class, 'createSubmission'])->name('createNoteSubmission');

Route::get('/note/edit/{id}', [NoteController::class, 'edit'])->name('editNote');
Route::put('/note/update/{id}', [NoteController::class, 'update'])->name('updateNote');

Route::delete('/note/{id}/delete', [NoteController::class, 'delete'])->name('deleteNote');
// Route::get('/note/{id}/delete', [NoteController::class, 'deletePermanently'])->name('deletePermanently');


Route::get('/notes/{id}/restore', [NoteController::class, 'restore'])->name('restoreNote');
Route::get('/note/trash', [NoteController::class, 'viewTrash'])->name('viewTrash');


// theme
