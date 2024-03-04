<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactsModel;

class ContactsController extends Controller
{
    public function getContacts()
    {
        $contacts = ContactsModel::all();
        return response()->json([
            'status' => true,
            'message' => 'List Semua Contacts',
            'data' => $contacts
        ]);
    }

    public function index()
    {
        $contacts = ContactsModel::all();
        return view('admin.contacts.v_contacts', compact('contacts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'phonenumber_contact' => 'required',
            'email_contact' => 'required'
        ]);

        $contacts = ContactsModel::create([
            'phonenumber_contact' => $request->phonenumber_contact,
            'email_contact' => $request->email_contact,
            'usernameig_contact' => $request->usernameig_contact,
        ]);

        $contacts->save();

        return redirect()->route('contacts')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id_contacts)
    {
        $contacts = ContactsModel::find($id_contacts);
        $contacts->update([
            'phonenumber_contact' => $request->phonenumber_contact,
            'email_contact' => $request->email_contact,
            'usernameig_contact' => $request->usernameig_contact,
            'usercreate_contacts' => $request->usercreate_contacts,
            'updateuser_contacts' => $request->updateuser_contacts,
        ]);
        return redirect()->route('contacts')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id_contacts)
    {
        $contacts = ContactsModel::find($id_contacts);
        $contacts->delete();
        return redirect()->route('contacts')->with('success', 'Data Berhasil Didelete');
    }
}
