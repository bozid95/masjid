<?php

namespace App\Http\Controllers;

use App\Pemasukan;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class PemasukanController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pemasukans = Pemasukan::all();

        return view('pemasukan.index',compact('pemasukans','pemasukans'));
    }


    public function create()
    {
        return view('pemasukan.create');

    }


    public function store(Request $request)
    {
        Pemasukan::create($request->all());
         return redirect('pemasukans')->with('success','data berhasil ditambahkan');
    }

    public function show(Pemasukan $pemasukan)
    {
        //
    }


    public function edit(Pemasukan $pemasukan)
    {
        return view('pemasukan.edit',['pemasukan'=> $pemasukan]);
    }


    public function update(Request $request, Pemasukan $pemasukan)
    {
        $pemasukan->update($request->all());
        return redirect('pemasukans')->with('success','data berhasil diubah');
    }


    public function destroy(Pemasukan $pemasukan)
    {
        $pemasukan->delete();
        return redirect()->route('pemasukans.index')->with('pesan',"Hapus data $pemasukan->nama_pemasukan berhasil");
    }
}
