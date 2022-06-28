<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{

    private $product;
    private  $header = [
        'Content-Type' => 'application/json; charset=UTF-8',
        'charset' => 'utf-8'
    ];


    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getProductAll(){
        return response()->json(
            $this->product::all() ,
            200, $this->header,
            JSON_UNESCAPED_UNICODE
        );
    }

    public function getProduct($id){
        return response()->json(
            $this->product::find($id) ,
            200, $this->header,
            JSON_UNESCAPED_UNICODE
        );
    }

}
