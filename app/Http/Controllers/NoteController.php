<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{

    public function index()
    {
        $notes = Note::orderByDesc('date')->get();
        return view('note.index', [
            'notes' => $notes
        ]);
    }
    public function show(Note $note)
    {
        return view('note.show', ['noteItem' => $note]);
    }


    public function create()
    {
        return view('note.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
        ]);

        Note::create([
            'date' => $request->date,
            'titre' => $request->titre,
            'contenu' => $request->contenu,
        ]);

        return redirect()->route('note.index')->with('success', 'La note a été créée avec succès.');
    }


    public function edit(Note $note)
    {
        return view('note.edit', [
            'note' => $note
        ]);
    }


    public function update(Request $request, Note $note)
    {
        $request->validate([
            'date' => 'required|date',
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
        ]);

        $note->update([
            'date' => $request->date,
            'titre' => $request->titre,
            'contenu' => $request->contenu,
        ]);

        return redirect()->route('note.index')->with('success', 'La note a été mise à jour avec succès.');
    }


    public function search(Request $request)
    {
        $keyword = $request->search;
        $notes = Note::where('titre', 'like', '%' . $keyword . '%')
            ->orWhere('contenu', 'like', '%' . $keyword . '%')
            ->orderByDesc('date')
            ->get();

        return view('note.index', [
            'notes' => $notes
        ]);
    }


    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('note.index')->with('success', 'La note a été supprimée avec succès.');
    }
}
