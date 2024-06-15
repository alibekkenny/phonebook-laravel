<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function contact_details(Contact $contact): View
    {
        return view('admin.contact.contact_details', [
            'contact' => $contact,
        ]);
    }

    public function edit(Contact $contact): View
    {
        return view('admin.contact.edit', [
            'contact' => $contact
        ]);
    }

    public function update(Contact $contact, Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|min:3|max:255|string',
            'description' => 'nullable',
        ]);

        $contact->update($data);
        return redirect()->route('admin.user.contact', [
            'user' => $contact->user
        ]);
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();
        return back();
    }
}
