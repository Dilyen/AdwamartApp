<?php

namespace App\Http\Controllers;
use App\Item;

use Illuminate\Http\Request;

class ItemController extends Controller
{   

     public function __construct(){
        return $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.items');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'name' => 'required|max:255|unique:offers,name',
            'category' => 'required|integer'
        ]);

        $item = new Item;
        $item->name = $request->name;
        $item->offer_id = $request->category;

        $item->save();

        session()->flash('success', 'Stock Item has been created successfully!');
        return redirect()->back();
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
        $item = Item::find($id);

        if($request->name == $item->name ){
                $this->validate($request, [
                'name' => 'required|max:255',
                'category' => 'required|integer'
                 ]); 
       } else {

                $this->validate($request, [
                     'name' => 'required|max:255|unique:offers,name',
                     'category' => 'required|integer'
                ]); 
       }
         
        $item->name = $request->name;
        $item->offer_id = $request->category;

        $item->save();

        session()->flash('success', 'Stock Item has been updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function P($id)
    {
        // $products = Product::where('item_id', $id)->orderBy('name')->get();
        // dd($products);
    }
}
