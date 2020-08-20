<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactResource;
use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $emp = Contact::all();
        return ContactResource::collection($emp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emp = new Contact;
        $emp->first_name = $request->input('first_name');
        $emp->last_name = $request->input('last_name');
        $emp->email = $request->input('email');
        $emp->city = $request->input('emcityail');
        $emp->country = $request->input('country');
        $emp->job_title = $request->input('job_title');
        $emp->save();
        return new ContactResource($emp);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id); //id comes from route
        if( $contact ){
            return new ContactResource($contact);
        }
        return "Contact Not found"; // temporary error
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $emp = Contact::find($id);
        $emp->first_name = $request->input('first_name');
        $emp->last_name = $request->input('last_name');
        $emp->email = $request->input('email');
        $emp->city = $request->input('emcityail');
        $emp->country = $request->input('country');
        $emp->job_title = $request->input('job_title'); 
        $emp->save();
        return new ContactResource($emp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp = Contact::findOrfail($id);
        if($emp->delete()){
            return  new ContactResource($emp);
        }
        return "Error while deleting";
    }
}
