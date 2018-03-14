<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Item;
use App\Category;

class HomeController extends Controller
{
    
    public function index()
    {
        $sliders = Slider::all();
        $items = Item::all();
        $categories = Category::all();
        return view('welcome')->withSliders($sliders)->withCategories($categories)->withItems($items);
    }
}
