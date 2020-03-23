<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deliveryinfo;
class DeliveryinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'region' => 'required',
            'address' => 'required',
            'phone' => 'required|digits:10'
        ]);

        $deliveryinfo = new Deliveryinfo;
        $deliveryinfo->region = $request->region;
        $deliveryinfo->address = $request->address;
        $deliveryinfo->phone = $request->phone;
        $deliveryinfo->user_id = auth()->user()->id;
        $deliveryinfo->save();

        session()->flash('success', 'Delivery has been issued successfully!');
        return redirect()->route('payoff');
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
        //
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

    public function payOff()
    {
        return view('pages.paymentmode');
    }
}
