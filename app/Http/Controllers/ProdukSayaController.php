<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukSayaController extends Controller
{
    public function index(){
        $products=Produk::get();
        return view('data_produk.index',compact('products'));
    }
    public function tambah(){
        $category=Kategori::get();
        return view('data_produk.tambah',compact('category'));
    }
    public function aksi_tambah(Request $request){
        
        //memvalidasi data jadi datanya harus diisi
        $request->validate([
            'title' =>'required','price'=>'required','category_id'=>'required','file'=>'required|file|mimes:jpeg,png|max:2048'
        ]);
        //variable" untuk menambahkan data dan validasinya
        $data = [
            'title' => $request->title,
            'category_id'=>$request->category_id,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'description' => $request->description
        ];
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('product'), $filename);

            $data['file'] = 'product/' . $filename;
        }
        //menambahkan data
        Produk::insert($data);
        return redirect()->route('data_produk');
    }
    public function edit($id){
        $category=Kategori::get();
        $product=Produk::where('id',$id)->first();
        return view('data_produk.edit',compact('category','product'));
    }
    public function aksi_edit(Request $request,$id){
        
        //memvalidasi data jadi datanya harus diisi
        $request->validate([
            'title' =>'required','price'=>'required','category_id'=>'required'
        ]);
        //variable" untuk menambahkan data dan validasinya
        $data = [
            'title' => $request->tittle,
            'category_id'=>$request->category_id,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'description' => $request->description
        ];
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('product'), $filename);

            $data['file'] = 'product/' . $filename;
        }
        //menambahkan data
        Produk::where('id',$id)->update($data);
        return redirect()->route('data_produk');
    }
    public function aksi_hapus($id){
        Produk::where('id',$id)->delete();
        return redirect()->route('data_produk');
    }
}

