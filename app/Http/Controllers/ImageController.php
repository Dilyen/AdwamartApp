<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Storage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
     public function getProductImage($filename){
    $file = Storage::disk('local')->get('public/products/'.$filename);
        return new Response($file, 200);
    }

}
