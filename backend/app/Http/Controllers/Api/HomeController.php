<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;

class HomeController extends Controller
{

    private $contact;
    public function __construct(Contact $contact){
        $this->contact = $contact;
    }

    public function index(){

        $contacts = $this->contact->all();
        $users = \App\User::all();
        
        return response()->json([
            'users' => $users,
            'contacts' => $contacts
        ]);
    }

}
