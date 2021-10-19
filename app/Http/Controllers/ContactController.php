<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\ApplicationType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller {
    public function Submit(ContactRequest $req) {
        $contact = new Contact();
        $contact->name = $req->input('name');
        $contact->user_id = $req->input('user_id');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->messages = $req->input('message');
        $contact->app_type = $req->input('appType_select');
        

        $contact->save();

        return redirect()->route('home')->with('success', 'Message sent');
    }

    public function getContactForm() {
        $data = ApplicationType::all();
        return view('contact', ['data' => $data ]);
    }

    public function allData() {
        $this->authorize('edit-messages');
        
        $contact = new Contact;
        $appType = new ApplicationType;

        return view('messages', ['data' => $contact->all() ], ['app_data_type' => $appType->all() ]);
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
        $this->authorize('can-view', $data);

        return view('message', ['data' => $data ]);
    }

    public function updateMessage($id) {
        $this->authorize('edit-messages');

        $contact = new Contact;
        $data = [];

        $data = $contact->find($id);

        return view('update_message', ['data' => $data ]);
    }

    public function updateMessageSubmit($id, Request $req) {

        $contact = Contact::find($id);
        $contact->status = $req->input('status_select');

        $contact->save();

        return redirect()->route('contact-message', $id)->with('success', 'Message updated');
    }

    public function deleteMessage($id) {
        $this->authorize('edit-messages');
        $contact = Contact::find($id)->delete();
        return redirect()->route('contact-messages', $id)->with('success', 'Message deleted');
    }
}
