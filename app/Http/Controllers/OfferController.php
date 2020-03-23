<?php

namespace App\Http\Controllers;
use App\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
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
        return view('admin.pages.offers');
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

        $offer = new Offer;
        $offer->name = $request->name;
        $offer->category_id = $request->category;

        $offer->save();

        session()->flash('success', 'Stock Offer has been created successfully!');
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
         $offer = Offer::find($id);

        if($request->name == $offer->name ){
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
         
        $offer->name = $request->name;
        $offer->category_id = $request->category;

        $offer->save();

        session()->flash('success', 'Stock Offer has been updated successfully!');
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
        Offer::find($id)->delete();

        session()->flash('success', 'The Offer has been deleted successfully');

        return redirect()->back();
    }
}
