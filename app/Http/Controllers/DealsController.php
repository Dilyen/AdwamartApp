<?php

namespace App\Http\Controllers;
use App\Deal;
use App\Product;
use App\Item;
use Illuminate\Http\Request;

class DealsController extends Controller
{   

    public function __construct(){
        return $this->middleware('auth:admin')->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.deals');
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
            'name' => 'required|max:255|unique:deals,name',
            'icon' => 'required',
            'item' => 'required'
        ]);

        $deal = new Deal;
        $deal->name = $request->name;
        $deal->icon = $request->icon;
        $deal->item_id = $request->item;

        $deal->save();

        session()->flash('success', 'Deal has been successfully created!');

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
        $products = Product::where('item_id' , $id)->get();
    
        return view('pages.product')->withProducts($products);
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
        $deal = Deal::find($id);
        if($deal->name == $request->name){

           $this->validate($request, [
            'name' => 'required|max:255',
            'icon' => 'required',
            'item' => 'required'
        ]); 
        } else {
             $this->validate($request, [
            'name' => 'required|max:255|unique:deals,name',
            'icon' => 'required',
            'item' => 'required'
        ]);
        }
 
        $deal->name = $request->name;
        $deal->icon = $request->icon;
        $deal->item_id = $request->item;

        $deal->save();

        session()->flash('success', 'Deal has been successfully updated!');

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
        Deal::find($id)->delete();

        session()->flash('success', 'Deal has been successfully created!');

        return redirect()->back();
    }
}
