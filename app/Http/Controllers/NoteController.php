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

    public function viewNote(Request $request)
    {
        $note = Note::findOrFail($request->id);
        return view('view', ['note' => $note]);
    }

    public function viewTrash()
    {
        $notes = Note::onlyTrashed()->orderBy('deleted_at', 'desc')->get();

        return view('trash', ['notes' => $notes]);
    }


    public function createNote()
    {
        return view('createNote');
    }


    public function createSubmission(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:60',
            'description' => 'nullable|string|max:155',
            'content' => 'nullable|string|max:10000',
        ], [
            'title.max' => 'The title may not be greater than 255 characters.',
            'description.max' => 'The description may not be greater than 255 characters.',
            'content.max' => 'The content may not be greater than 10,000 characters.',
        ]);

        if (!$validated) {
            return redirect()->route('createNote')->with('status', 'Note Failed to Save');
        }

        Note::create($validated);
        return redirect()->route('home')->with('status', 'Note Saved');
    }

    public function edit(int $id)
    {
        $note = Note::findOrFail($id);

        if (!$note) {
            return redirect()->route('home')->with('error', 'Note not found.');
        }

        return view('editNote', ['note' => $note]);
    }

    public function update(Request $request, int $id)
    {

        $validated = $request->validate([
            'title' => 'nullable|string|max:60',
            'description' => 'nullable|string|max:155',
            'content' => 'nullable|string|max:10000',
        ], [
            'title.max' => 'The title may not be greater than 255 characters.',
            'description.max' => 'The description may not be greater than 255 characters.',
            'content.max' => 'The content may not be greater than 10,000 characters.',
        ]);

        $note = Note::findOrFail($id)->update($validated);

        if (!$note) {
            return redirect()->route('home')->with('error', 'Note not found.');
        }

        return redirect()->route('home')->with('status', 'Note Updated');
    }

    public function delete(Request $request, int $id)
    {
        // Include soft-deleted records in the query
        $note = Note::withTrashed()->findOrFail($id);

        // Check if the action is 'forceDelete'
        if ($request->input('action') === 'forceDelete') {
            $note->forceDelete();
            return redirect()->route('home')->with('status', 'Note Deleted');
        }

        // Soft delete the note
        $note->delete();
        return redirect()->route('home')->with('status', 'Note Trashed');
    }



    public function restore(int $id)
    {
        $note = Note::onlyTrashed()->findOrFail($id);
        $note->restore();

        return redirect()->route('viewTrash')->with('status', 'Note Restored Succesfully');
    }


    public function index()
    {
        return view('home');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $data = Note::where('title', 'like', $request->search . '%')
                ->orWhere('description', 'like', $request->search . '%')
                ->get();


            $output = '';
            if (count($data) > 0) {
                $output = '
                <table class="table table-hover">
                    <tbody>';

                foreach ($data as $row) {
                    // The note title is clickable and redirects to /note/{id} for viewing
                    $output .= '
                    <tr>
                        <td>
                            <a href="/note/view?id=' . $row->id . '">' . $row->title . '</a>
                        </td>
                    </tr>';
                }

                $output .= '
                    </tbody>
                </table>';
            } else {
                $output .= '<p>No results found</p>';
            }

            return $output;
        }
    }

    
}
