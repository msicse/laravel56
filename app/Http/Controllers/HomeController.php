<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class HomeController extends Controller
{
    
    public function index()
    {
        $sliders = Slider::all();
        return view('welcome')->withSliders($sliders);
    }
}
