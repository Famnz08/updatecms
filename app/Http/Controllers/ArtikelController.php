<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\isi;
use DB;
class ArtikelController extends Controller
{
    public function artikel(){
        $artikel=Artikel::all();
        return view('artikel/artikel',compact(['artikel']));
    }
    public function create(){
        //if (!$this->validate([
            //'judul' => [
               // 'rules' => 'required',
                //'errors' => [
                  //  'required' => '{50} Harus diisi'
               // ]
           // ]
        //])) {
          //  session()->setFlashdata('error', $this->validator->listErrors());
            //return redirect()->back()->withInput();
       // } else {
         //   print_r($this->request->getVar());
       // }
        return view('artikel/tambah');
    }
    public function store(Request $request){
        $this->validate($request,[
            'judul'=>'required|min:5|max:50',
            'foto'=>'required|mimes:jpg,jpeg,png|image|max:2048',
        ]);
        $artikel=Artikel::create([
            'id_artikel' => $request->id_artikel,
            'judul' => $request->judul,
            'foto' => $request->foto,
            'nama_artikel' => $request->nama_artikel,
            'kategori'=> $request->kategori
        ]);
            
        if($request->hasfile('foto')){
            $request->file('foto')->move('images/',$request->file('foto')->getClientOriginalName());
            $artikel->foto = $request->file('foto')->getClientOriginalName();
            $artikel->save();
        }

        $isi=Isi::create([
            
            'id_artikel' => $request->id_artikel,
            'artikel' => $request->artikel          
        ]);
        
        return redirect('artikel');
    }
    
    public function berita(){
        return view('index');
    }
    public function edit($id){
        $artikel = Artikel::find($id);
        return view('artikel/edit',compact(['artikel']));
    }public function update($id, request $request){
        $this->validate($request,[
            'judul'=>'required|min:5|max:50',
            'foto'=>'required|mimes:jpg,jpeg,png|image|max:2048',
        ]);
        $artikel = Artikel::find($id);
        $artikel->update($request->except('_token','Edit'));
        return redirect('artikel');
    }
        
    public function destroy($id){
        $artikel= Artikel::find($id);
        $artikel->delete();
        return redirect('artikel');
    }

}
