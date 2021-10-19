<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationType;
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
        Log::debug($id);
        $ApplicationType = ApplicationType::find($id)->delete();
        return redirect()->route('contact-messages', $id)->with('success', 'Type deleted');
    }
}
