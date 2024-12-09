<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $category=Kategori::get();
        return view('kategori.index',compact('category'));
    }
    public function tambah(){
        
        return view('kategori.tambah');
    }
    public function aksi_tambah(Request $request){
        
        //memvalidasi data jadi datanya harus diisi
        $request->validate([
            'tittle' =>'required'
        ]);
        //variable" untuk menambahkan data dan validasinya
        $data = [
            'tittle' => $request->tittle
        ];

        Kategori::insert($data);
        return redirect()->route('kategori');
    }
    public function edit($id){
        $category=Kategori::where('id',$id)->first();
        return view('kategori.edit',compact('category'));
    }
    public function aksi_edit(Request $request,$id){
        
        //memvalidasi data jadi datanya harus diisi
        $request->validate([
            'tittle' =>'required'
        ]);
        //variable" untuk menambahkan data dan validasinya
        $data = [
            'tittle' => $request->tittle
        ];
        Kategori::where('id',$id)->update($data);
        return redirect()->route('kategori');
    }
}

