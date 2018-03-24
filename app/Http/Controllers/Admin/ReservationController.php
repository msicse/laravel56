<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Reservation;
use Toastr;

class ReservationController extends Controller
{
    public function index()
    {
    	$reservations = Reservation::all();
    	return view('backend.reservation.index')->withReservations($reservations);
    }

    public function postStatus($id)
    {
    	$reservation = Reservation::find($id);
    	$reservation->status = true;
    	$reservation->save();

    	Toastr::success('Successfully Confirmd Reservation', 'Success', ["positionClass" => "toast-top-right"]);
    	return redirect()->back();

    }

    public function destroy($id)
    {
    	$data = Reservation::find($id);
    	$data->delete();
    	Toastr::success('Successfully Delete Reservation', 'Success', ["positionClass" => "toast-top-right"]);
    	return redirect()->back();
    }
}
