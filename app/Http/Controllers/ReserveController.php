<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use Toastr;

class ReserveController extends Controller
{
    public function postReserved(Request $request)
    {
    	//dd($request);
    	$this->validate($request, array(
            'name' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|email',
            'datepicker' => 'required',
            'message' => 'required',

            //'image' => 'required|mimes:jpg,jpeg,bmp,png,gif',
        ));
    	$data = new Reservation;
    	$data->name 		= $request->input('name');
    	$data->phone 		= $request->input('phone');
    	$data->email 		= $request->input('email');
    	$data->date_and_time= $request->input('datepicker');
    	$data->message 		= $request->input('message');
    	$data->status 		= false;
    	$data->save();
        
        Toastr::success('Successfully send reservation please wait for confirmation', 'Title', ["positionClass" => "toast-top-right"]);
    	return redirect()->back();
    }
}
