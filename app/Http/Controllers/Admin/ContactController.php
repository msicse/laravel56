<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use Toastr;

class ContactController extends Controller
{
    public function index()
    {
    	$contacts = Contact::all();
    	return view('backend.contact.index')->withContacts($contacts);
    }
    public function view($id)
    {
    	$contact = Contact::find($id);
    	return view('backend.contact.view')->withContact($contact);
    }
    public function destroy($id)
    {
    	$data = Contact::find($id);
    	$data->delete();
    	Toastr::success('Successfully Delete', 'Success', ["positionClass" => "toast-top-right"]);
    	return redirect()->back();
    }


}
