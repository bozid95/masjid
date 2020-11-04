<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $pengeluarans = Pengeluaran::all();
        return view('pengeluaran.index',compact('pengeluarans','pengeluarans'));
    }


    public function create()
    {
        return view('pengeluaran.create');

    }


    public function store(Request $request)
    {
        Pengeluaran::create($request->all());
         return redirect('pengeluarans')->with('success','data berhasil ditambahkan');
    }

    public function show(Pengeluaran $pengeluaran)
    {
        //
    }


    public function edit(Pengeluaran $pengeluaran)
    {
        return view('pengeluaran.edit',['pengeluaran'=> $pengeluaran]);
    }


    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $pengeluaran->update($request->all());
        return redirect('pengeluarans')->with('success','data berhasil diubah');
    }


    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();
        return redirect()->route('pengeluarans.index')->with('pesan',"Hapus data $pengeluaran->nama_pemasukan berhasil");
    }
}
