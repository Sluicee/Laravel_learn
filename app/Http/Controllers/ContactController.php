<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\ApplicationType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class ContactController extends Controller {
    public function Submit(ContactRequest $req) {
        $contact = new Contact();
        $contact->name = $req->input('name');
        $contact->user_id = $req->input('user_id');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->messages = $req->input('message');
        $contact->app_type = $req->input('appType_select');
        if($req->file('beforeImage') != null) {
            $contact->messageImageBefore = substr($req->file('beforeImage')->store('public/image') , 13);
        }
        //$contact->messageImageBefore =  Storage::putFile('', $req->file('beforeImage'));

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

        $validateFields = $req->validate([
            'afterImage' => 'mimes:png,jpg,jpeg,bmp|max:10240'
        ]);

        $contact = Contact::find($id);
        $contact->status = $req->input('status_select');
        if ($contact->status === "reject") {
            $contact->rejectReason = $req->input('rejectReason');
        }

        if ($req->file('afterImage') != null) {
            $contact->messageImageAfter = substr($req->file('afterImage')->store('public/image'), 13);
        }

        $contact->save();

        return redirect()->route('contact-message', $id)->with('success', 'Message updated');
    }

    public function deleteMessage($id) {
        $contact = Contact::find($id)->delete();
        return redirect()->route('contact-messages', $id)->with('success', 'Message deleted');
    }

    public function getHomePage() {
        $data = Contact::orderBy('updated_at', 'DESC')->get()->where('status', '=', 'solved');

        return view('home', ['data' => $data]);
    }
}
