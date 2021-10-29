<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationType;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;

class ApplicationTypeController extends Controller
{
    public function applicationTypeAdd(Request $req){
        $req->validate([
            'typeName' => 'required'
        ]);
        $ApplicationType = new ApplicationType();
        $ApplicationType->name = $req->input('typeName');

        $ApplicationType->save();

        return redirect()->route('contact-messages')->with('success', 'Type added');
    }

    public function applicationTypeDelete(Request $req){
        $id = $req->input('appType_select');
        Contact::where('app_type','=',ApplicationType::find($id)->name)->delete();
        $ApplicationType = ApplicationType::find($id)->delete();
        return redirect()->route('contact-messages', $id)->with('success', 'Type deleted');
    }
}
