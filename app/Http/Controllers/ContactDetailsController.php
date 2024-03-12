<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\ContactDetails;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactDetailsController extends Controller
{
    //
    public function index(Contact $contact): View {
        $contact_details = $contact->contact_details;
        return view('contact_details.index', [
            'contact'=>$contact,
            'contact_details'=>$contact_details,
        ]);
    }
    public function create(Contact $contact): View {
        $categories = Category::all();
        return view('contact_details.create', [
            'contact' => $contact,
            'categories' => $categories,
        ]);
    }
    public function store(Contact $contact, Request $request): RedirectResponse {
        $request->merge([
            'contact_id'=>$contact->id
        ]);
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'contact_id' => 'required|exists:contacts,id',
            'value'=> 'required|max:255|string',
        ]);
        ContactDetails::create($data);

        return redirect()->route('contact_details.index', ['contact'=>$contact]);
    }
    public function edit(ContactDetails $contactDetails): View {

    }
    public function destroy(ContactDetails $contactDetails): RedirectResponse {
        $contactDetails->delete();
        return back();
    }
}
