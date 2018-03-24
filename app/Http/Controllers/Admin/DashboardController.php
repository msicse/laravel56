<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Item;
use App\Slider;
use App\Reservation;
use App\Contact;
class DashboardController extends Controller
{
    public function index()
    {
    	$catcunt = Category::count();
    	$itemcount = Item::count();
    	$slidercount = Slider::count();
    	$rescount = Reservation::where('status',false)->count();
    	$concount = Contact::count();
    	return view('backend.dashboard')->withCatcunt($catcunt)->withItemcount($itemcount)->withSlidercount($slidercount)->withRescount($rescount)->withConcount($concount);
    }
}
