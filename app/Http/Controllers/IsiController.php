<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Isi;
use App\Models\Comment;
use App\Models\Artikel;
use DB;
class IsiController extends Controller
{
    public function isi(){
        $comment=DB::table('coments')
        ->select('coments.*','artikel.nama_artikel')
        ->join('artikel','coments.id_artikel','=','artikel.id_artikel')
        ->get();
        $comment=comment::where('id_artikel','Art01')->get();
        $isi = Isi::where('id_artikel','Art01')->get();
        return view('isi/index',compact(['isi','comment']));
    }
    public function store(Request $request){
        $comment=Comment::create([
            'comment' => $request->comment,
            'name' => $request->name,
            'id_artikel'=>$request->id_artikel
        ]);
        return redirect('pisang');
    }
    public function bola(){
        $comment=DB::table('coments')
        ->select('coments.*','artikel.nama_artikel')
        ->join('artikel','coments.id_artikel','=','artikel.id_artikel')
        ->get();
        $comment=Comment::where('id_artikel','Art02')->get();
        $isi = Isi::where('id','4')->get();
        return view('isi/bola',compact(['isi','comment']));
    }
       public function komenbola(Request $request){
        $comment=Comment::create([
            
            'comment' => $request->comment,
            'name' => $request->name,
            'id_artikel'=>$request->id_artikel
        ]);
        return redirect('bola');
    }
}