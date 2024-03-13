<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        $contacts = Auth::user()->contacts;
        return view('contact.index', ['contacts' => $contacts]);
    }

    public function create(): View
    {
        if (!Gate::allows('create-contact', Auth::user())) {
            abort(403);
        }
        return view('contact.create');
    }

    public function store(Request $request): RedirectResponse
    {
        if (!Gate::allows('create-contact', Auth::user())) {
            abort(403);
        }
        $data = $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'nullable|string'
        ]);
        $data['user_id'] = Auth::id();
        Contact::create($data);
        return redirect()->route('contact.index');
    }

    public function edit(Contact $contact): View
    {
        if (!Gate::allows('view-contact', [$contact])) {
            abort(403);
        }
        return view('contact.edit', ['contact' => $contact]);
    }

    public function update(Contact $contact, Request $request): RedirectResponse
    {
        if (!Gate::allows('update-contact', [$contact])) {
            abort(403);
        }
        $data = $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'nullable|string',
        ]);
        $contact->update($data);

        return redirect()->route('contact.index');
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        if (!Gate::allows('delete-contact', [$contact])) {
            abort(403);
        }
        $contact->delete();
        return back();
    }
}
