<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
class ContactController extends Controller
{
    public function index(): View {
        $contacts = Contact::all();
        return view('contact.index', ['contacts'=> $contacts]);
    }
    public function create(): View {
        return view('contact.create');
    }
    public function store(Request $request): RedirectResponse {
        $data = $request->validate([
            'name'=> 'required|max:255|string',
            'description' => 'nullable|string'
        ]);
        Contact::create($data);
        return redirect()->route('contact.index');
    }
    public function edit(Contact $contact): View {
        return view('contact.edit', ['contact' => $contact]);
    }
    public function update(Contact $contact, Request $request): RedirectResponse {
        $data = $request->validate([
            'name'=> 'required|max:255|string',
            'description' => 'nullable|string',
        ]);
        $contact->update($data);

        return redirect()->route('contact.index');
    }
    public function destroy(Contact $contact): RedirectResponse {
        $contact->delete();
        return back();
    }
}
