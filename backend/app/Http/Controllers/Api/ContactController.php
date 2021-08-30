<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;



class ContactController extends Controller
{
    private $contact;

    public function __construct(Contact $contact){
        $this->contact = $contact;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = $this->contact->all();

        return response()->json([
            'contacts' => $contacts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->only(['name','email','phone']);
        try{

            $contact = $this->contact->create($data);

            return response()->json($contact);

        } catch(\Expection $e){
            $message = new ApiMessage($e->getMessage());
            return response()->json([$message->getMessage()],401);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = $this->contact->find($id);
        return response()->json([
            'contact' => $contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $data = $request->only(['name','email','phone']);
       $contact = $this->contact->find($id);
       $contact = $contact->update($data);
       $contact = $this->contact->find($id);

       return response()->json([
           'contact' => $contact
       ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = $this->contact->find($id);
        $contact->delete();

        return response()->json($contact);
    }
}
