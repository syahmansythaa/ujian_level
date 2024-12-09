<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request){
        $categoryId=$request->category;
        if($categoryId==""){
            $product=Produk::get();
        }else{
            $product=Produk::where('category_id',$categoryId)->get();
        }
        $category=Kategori::get();
        return view('produk',compact('category','product'));
    }
}
