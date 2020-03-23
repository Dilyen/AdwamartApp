<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        return view('admin.pages.categories');
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
            'name' => 'required|max:255|unique:categories,name'
        ]);

        $category = new Category;
        $category->name = $request->name;

        $category->save();

        session()->flash('success', 'Stock Category has been created successfully!');
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
        $category = Category::find($id);

        if($request->name == $category->name ){
                $this->validate($request, [
                'name' => 'required|max:255'
                 ]); 
       } else {

                $this->validate($request, [
                     'name' => 'required|max:255|unique:categories,name'
                ]); 
       }
         
        $category->name = $request->name;

        $category->save();

        session()->flash('success', 'Stock Category has been updated successfully!');
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

    public function getProductByCategoryId($id)
    {
        $products = Product::where('category_id', $id)->orderBy('name')->get();
        return view('pages.product')->withProducts($products);
    }
}
