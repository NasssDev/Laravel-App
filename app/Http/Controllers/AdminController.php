<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\FormContact;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function adminEditContact(ContactRequest $request, int $id): View
    {
        $form_contact = FormContact::find($id);

        $form_contact->lastname = $request->lastname;
        $form_contact->firstname = $request->firstname;
        $form_contact->email = $request->email;
        $form_contact->phone = $request->phone;
        $form_contact->address = $request->address;
        $form_contact->code_postal = $request->postalCode;
        $form_contact->city = $request->city;
        $form_contact->commentary = $request->commentary;

        if ($form_contact) $form_contact->save();

        return view('admin.adminContacts')
            ->with('all_contacts', FormContact::all())
            ->with('status', 'The change was made successfully');
    }

    public function deleteContact(int $id): View
    {
        $contact = FormContact::find($id);

        if ($contact) $contact->delete();

        return view('admin.adminContacts')
            ->with('all_contacts', FormContact::all())
            ->with('status', 'Deletion successfully completed !');
    }

    public function getAllContact(): View
    {
        return view('admin.adminContacts')
            ->with('all_contacts', FormContact::all());
    }

    public function AdminEditUser(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = User::find($request->id);

        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
        $user->save();

        return Redirect::route('adminUsers')
            ->with('all_users', User::all())
            ->with('status', 'The change was made successfully');
    }


    public function deleteUserGet(int $id): View
    {
        $user = User::find($id);

        if ($user) $user->delete();

        return view('admin.adminUsers')
            ->with('all_users', User::all())
            ->with('status', 'Deletion successfully completed !');
    }

    public function getAllUser(): View
    {
        return view('admin.adminUsers')
            ->with('all_users', User::all());
    }
}
