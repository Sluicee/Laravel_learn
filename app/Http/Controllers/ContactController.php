<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller {
    public function Submit(ContactRequest $req) {
        $contact = new Contact();
        $contact->name = $req->input('name');
        $contact->user_id = $req->input('user_id');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->messages = $req->input('message');

        $contact->save();

        return redirect()->route('home')->with('success', 'Message sent');
    }

    public function allData() {
        $this->authorize('edit-messages');
        
        $contact = new Contact;
        $data = [];

        $data = $contact->all();

        return view('messages', ['data' => $data ]);
    }

    public function messagesByUser() {
        $contact = new Contact;
        $data = [];
        $user_id = Auth::user()->id;
        $data = $contact->where('user_id', '=', $user_id)->get();

        return view('private', ['data' => $data ]);
    }

    public function showMessage($id) {
        $contact = new Contact;
        $data = [];

        $data = $contact->find($id);

        return view('message', ['data' => $data ]);
    }

    public function updateMessage($id) {
        $contact = new Contact;
        $data = [];

        $data = $contact->find($id);

        return view('update_message', ['data' => $data ]);
    }

    public function updateMessageSubmit($id, ContactRequest $req) {

        $contact = Contact::find($id);
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->messages = $req->input('message');

        $contact->save();

        return redirect()->route('contact-message', $id)->with('success', 'Message updated');
    }

    public function deleteMessage($id) {
        $this->authorize('edit-messages');
        $contact = Contact::find($id)->delete();
        return redirect()->route('contact-messages', $id)->with('success', 'Message deleted');
    }
}
