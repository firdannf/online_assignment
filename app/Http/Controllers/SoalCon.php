<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class SoalCon extends Controller
{
    public function index()
    {
        $soal=DB::table("soal")->get();
        return view('soal',['soal'=>$soal]);
    }

    public function storeinput(Request $request)
    {
        DB::table('soal')->insert([
            'judulmateri'=> $request->judulmateri,
            'deskripsisoal'=> $request->deskripsisoal,
            'bataswaktu'=> $request->bataswaktu,
        ]);

        session()->flash('messege','inputan berhasil');
        return redirect('/soal');
    }

    public function storeupdate(Request $request)
    {
        DB::table('soal')->where('idsoal',$request->idsoal)->update([
            'judulmateri'=> $request->judulmateri,
            'deskripsisoal'=> $request->deskripsisoal,
            'bataswaktu'=> $request->bataswaktu,

        ]);

        return redirect('/soal');
    }

    public function delete($id)
    {
        DB::table('soal')->where('idsoal',$id)->delete();
        return redirect('/soal');
    }
}
