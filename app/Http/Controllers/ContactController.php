<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'name');
        $search = $request->get('search', '');

        $contacts = Contact::where('name', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->orderBy($sort)
            ->get();

        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:contacts,email',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        Contact::create($validated);

        return redirect('/contacts')->with('success', 'Contact created successfully.');
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:contacts,email,' . $id,
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($validated);

        return redirect('/contacts')->with('success', 'Contact updated successfully.');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect('/contacts')->with('success', 'Contact deleted successfully.');
    }
}
