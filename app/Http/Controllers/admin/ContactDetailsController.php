<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ContactDetails;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactDetailsController extends Controller
{
    //
    public function edit(ContactDetails $contactDetails): View
    {
        $categories = Category::all();
        return view('admin.contact_details.edit', [
            'categories' => $categories,
            'contact_details' => $contactDetails,
        ]);
    }

    public function update(ContactDetails $contactDetails, Request $request): RedirectResponse
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'value' => 'required|min:3|max:255|string'
        ]);
        $contactDetails->update($data);
        return redirect()->route('admin.contact.contact_details', [
            'contact' => $contactDetails->contact
        ]);
    }

    public function destroy(ContactDetails $contactDetails): RedirectResponse
    {
        $contactDetails->delete();

        return back();
    }
}
