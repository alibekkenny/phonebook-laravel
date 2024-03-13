<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\ContactDetails;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ContactDetailsController extends Controller
{
    //
    public function index(Contact $contact): View
    {
        if (!Gate::allows('view-contact', [$contact])) {
            abort(403);
        }
        $contact_details = $contact->contact_details;
        return view('contact_details.index', [
            'contact' => $contact,
            'contact_details' => $contact_details,
        ]);
    }

    public function create(Contact $contact): View
    {
        if (!Gate::allows('create-contact_details', [$contact])) {
            abort(403);
        }
        $categories = Category::all();
        return view('contact_details.create', [
            'contact' => $contact,
            'categories' => $categories,
        ]);
    }

    public function store(Contact $contact, Request $request): RedirectResponse
    {
        if (!Gate::allows('create-contact_details', [$contact])) {
            abort(403);
        }
        $request->merge([
            'contact_id' => $contact->id
        ]);
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'contact_id' => 'required|exists:contacts,id',
            'value' => 'required|max:255|string',
        ]);
        ContactDetails::create($data);

        return redirect()->route('contact_details.index', ['contact' => $contact]);
    }

    public function edit(ContactDetails $contactDetails): View
    {
        if (!Gate::allows('view-contact_details', [$contactDetails])) {
            abort(403);
        }
        $categories = Category::all();
        return view('contact_details.edit', [
            'contact_details' => $contactDetails,
            'categories' => $categories,
        ]);
    }

    public function update(ContactDetails $contactDetails, Request $request): RedirectResponse
    {
        if (!Gate::allows('update-contact_details', [$contactDetails])) {
            abort(403);
        }
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
//            'contact_id' => 'required|exists:contacts,id',
            'value' => 'required|max:255|string',
        ]);
        $contactDetails->update($data);
        return redirect()->route('contact_details.index', [
            'contact' => $contactDetails->contact,
        ]);
    }

    public function destroy(ContactDetails $contactDetails): RedirectResponse
    {
        if (!Gate::allows('delete-contact_details', [$contactDetails])) {
            abort(403);
        }
        $contactDetails->delete();
        return back();
    }
}
