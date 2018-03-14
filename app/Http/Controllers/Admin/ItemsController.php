<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Category;
use Carbon\Carbon;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('backend.item.index')->withItems($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.item.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $this->validate($request, array(
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required|integer',
            'image' => 'required|mimes:jpg,jpeg,bmp,png,gif',
        ));

        $image = $request->file('image');
        $slug = str_slug($request->title);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'.$currentDate.uniqid().'.'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/items')) {
                mkdir('uploads/items', 0777, true);
            }
            $image->move('uploads/items',$imagename);
        } else{
            $imagename = 'no-image.png';
        }

        $item = new Item;
        $item->name           = $request->input('name');
        $item->category_id    = $request->input('category');
        $item->description    = $request->input('description');
        $item->price          = $request->input('price');
        $item->image          = $imagename;
        $item->save();

        return redirect()->route('items.index')->with('success','Successfully Added');       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $categories = Category::all();
        return view('backend.item.edit')->withItem($item)->withCategories($categories);
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
        $item = Item::find($id);

        $this->validate($request, array(
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required|integer',
            'image' => 'mimes:jpg,jpeg,bmp,png,gif',
        ));

        $image = $request->file('image');
        $slug = str_slug($request->title);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'.$currentDate.uniqid().'.'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/items')) {
                mkdir('uploads/items', 0777, true);
            }
            $image->move('uploads/items',$imagename);

            if(file_exists('uploads/items/'.$item->image)){
                unlink('uploads/items/'.$item->image);
            }

            $item->image          = $imagename;
        } 
        $item->name           = $request->input('name');
        $item->category_id    = $request->input('category');
        $item->description    = $request->input('description');
        $item->price          = $request->input('price');
        $item->save();
        return redirect()->route('items.index')->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Item::find($id);
        if(file_exists('uploads/items/'.$data->image)){
            unlink('uploads/items/'.$data->image);
        }

        $data->delete();

        return redirect()->back()->with('success',' Successfully Deleted');
    }
}
