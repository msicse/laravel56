<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Item;
use App\Category;
use App\Contact;
use Toastr;


class HomeController extends Controller
{
    
    public function index()
    {
        $sliders = Slider::all();
        $items = Item::all();
        $categories = Category::all();
        return view('welcome')->withSliders($sliders)->withCategories($categories)->withItems($items);
    }
    public function sendMessage(Request $request)
    {
    	//return $request->all();
    	$this->validate($request, array(
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ));

        $contact = new Contact;
        $contact->name           = $request->input('name');
        $contact->email           = $request->input('email');
        $contact->subject           = $request->input('subject');
        $contact->message           = $request->input('message');
        $contact->save();

        Toastr::success('Successfully send message', 'Success', ["positionClass" => "toast-top-right"]);
    	return redirect()->back();

    }
}
