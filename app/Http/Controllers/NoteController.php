<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NoteController extends Controller
{
    
    public function showNotes()
    {
        $notes = Note::orderBy('updated_at', 'desc')->get();
       
        return view('home', ['notes' => $notes]);
    }

    
    public function create()
    {
        return view('createNote');
    }

    
    public function createSubmission(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
        ], [
            'title.max' => 'The title may not be greater than 255 characters.',
            'description.max' => 'The description may not be greater than 255 characters.',
            'content.max' => 'The content may not be greater than 10,000 characters.',
        ]);
    
        Note::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'content' => $validated['content']
        ]);
    
        return redirect()->route('home')->with('status', 'Note Saved.');
    }
    
    public function edit(int $id)
    {
        $note = Note::findOrFail($id);
    
        if (!$note) {
            return redirect()->route('home')->with('error', 'Note not found.');
        }
    
        return view('editNote', ['note' => $note]);
    }

    public function update(Request $request, int $id){
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
        ], [
            'title.max' => 'The title may not be greater than 255 characters.',
            'description.max' => 'The description may not be greater than 255 characters.',
            'content.max' => 'The content may not be greater than 10,000 characters.',
        ]);
        
        $note = Note::findOrFail($id)->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'content' => $validated['content']
        ]);

        if (!$note){
            return redirect()->route('home')->with('error', 'Note not found.');
        }
            
        return redirect()->route('home')->with('status', 'Note Updated');
        
    }

    public function destroy(int $id){
        $note = Note::findOrFail($id);
        $note->delete();

        return redirect()->back()->with('status', 'Note Deleted');

    }
}

