<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\FormContact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ContactController extends Controller
{

    public function store(ContactRequest $request): View|RedirectResponse
    {
        if (!session()->has('dataConfirmed')) {
            session()->put('dataConfirmed', true);
            return back()->withInput()->with('confirm', 'Please confirm the information before submitting again.');
        }
        $form_contact = new FormContact();

        $form_contact->lastname = $request->lastname;
        $form_contact->firstname = $request->firstname;
        $form_contact->email = $request->email;
        $form_contact->phone = $request->phoneHiddenInput;
        $form_contact->address = $request->address;
        $form_contact->code_postal = $request->postalCode;
        $form_contact->city = $request->city;
        $form_contact->commentary = nl2br($request->commentary);

        $form_contact->save();


        session()->forget('dataConfirmed');

        return view('contact')
            ->with('status','Registration successfully completed !');
    }
}
