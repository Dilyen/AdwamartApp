<?php

namespace App\Http\Controllers;
use App\Product;
use Storage;
use File;
use Illuminate\Http\Request;

class ProductController extends Controller
{   

    
     public function __construct(){
        return $this->middleware('auth:admin')->except(['getProductByItemId', 'show', 'getProductByPrice']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.products');
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
            'name' => 'required|max:255|unique:products,name',
            'description' => 'required|max:500',
            'item' => 'required|integer',
            'price' => 'required|numeric',
            'discount' => 'sometimes|integer',
            'image' => 'required|image'
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->item_id = $request->item;

       if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = strtolower($request->name) . '.' . $image->getClientOriginalExtension();

             $location = storage_path($filename);
            Storage::disk('local')->put('public/products/'.$filename, File::get($image));

            $product->image = $filename;
        }

        $product->save();

        session()->flash('success', 'Stock Product has been created successfully!');
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
        $product = Product::find($id);
        return view('pages.single')->withProduct($product);
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

        $product = Product::find($id);
        if($product->name == $request->name){
            $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:500',
            'item' => 'required|integer',
            'price' => 'required|numeric',
            'discount' => 'sometimes|integer',
            'image' => 'required|image'
        ]);
        } else {
            $this->validate($request, [
            'name' => 'required|max:255|unique:products,name',
            'description' => 'required|max:500',
            'item' => 'required|integer',
            'price' => 'required|numeric',
            'discount' => 'sometimes|integer',
            'image' => 'required|image'
        ]);
        }
         
       
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->item_id = $request->item;

        $oldImage = $product->image;
       if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = strtolower($request->name) . '.' . $image->getClientOriginalExtension();

             $location = storage_path($filename);
            Storage::disk('local')->put('public/products/'.$filename, File::get($image));

             Storage::delete('public/product/'.$oldImage);

            $product->image = $filename;
        }

        $product->save();

        session()->flash('success', 'Stock Product has been created successfully!');
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

    public function getProductByItemId($id)
    {
        $products = Product::where('item_id', $id)->orderBy('name')->get();
        return view('pages.product')->withProducts($products);
    }

    public function getProductByPrice(Request $request){
        $this->validate($request, [
            'filter' => 'required'
        ]);

        if($request->filter == 'more'){
            $products = Product::where('price' , '>', 400)->get();

             return view('pages.product')->withProducts($products);
        } else {
            $products = Product::where('price' , '>', $request->filter)->where('price', '<', $request->filter + 100)->get();

             return view('pages.product')->withProducts($products);
        }
    }

    public function getProductByDiscount(Request $request){
        $this->validate($request, [
            'filter' => 'required'
        ]);

        if($request->filter == 'more'){
            $products = Product::where('discount' , '>', 30)->get();

             return view('pages.product')->withProducts($products);
        } else {
            $products = Product::where('discount' , '>', $request->filter)->where('discount', '<=', $request->filter + 10)->get();
            
             return view('pages.product')->withProducts($products);
        }
        
    }
}
