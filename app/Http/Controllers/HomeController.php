<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['searchProduct', 'searchProductHits']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


        //this function will return search hits
    public function searchProduct(Request $request){
        $term = $request->term;

         $product = Product::where('name', 'LIKE', '%' . $term . '%')
                                ->get();


            if(count($product) == 0)
            {
                $searchResult[] =  "No item Found";
            } else
            {
                foreach ($product as $key => $value)
                {

                    $searchResult[] = $value->name;
                }
            }
        
        return $searchResult;
    }

    /*this function displays search page with possible hits*/
       public function searchProductHits(Request $request){

         $value = $request->searchTerm;
        

         $products = Product::where('name','LIKE', '%'. $value .'%')->orderBy('name')->get();
        return view('pages.product')->withProducts($products);
       }
}
