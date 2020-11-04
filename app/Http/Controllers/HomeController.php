<?php

namespace App\Http\Controllers;

use App\User;
use App\Pemasukan;
use App\Models\Pengeluaran;
use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pemasukan = Pemasukan::all();
        $pengeluaran = Pengeluaran::all();
        $users = User::count();
        $pemasukanTotal = Pemasukan::sum('jml_pemasukan');
        $pengeluaranTotal = Pengeluaran::sum('jml_pengeluaran');
        $saldoTotal = $pemasukanTotal-$pengeluaranTotal;

       $sumPemasukan = DB::table('pemasukans')
                 ->select ([
                     DB::raw('sum(jml_pemasukan) as total'),
                     DB::raw('MONTH(tgl_pemasukan) as bulan')
                 ])
                 ->groupBy('bulan')
                 ->get()
                 ->toArray();

        $data1 = [];
        foreach ($sumPemasukan as $sum){
            $data1 [] = $sum->total;
        };

        $dataBulan = [];
        foreach ($sumPemasukan as $sum){
            $dataBulan [] = $sum->bulan;
        };


         $sumPengeluaran = DB::table('pengeluarans')
                 ->select ([
                     DB::raw('sum(jml_pengeluaran) as total'),
                     DB::raw('MONTH(tgl_pengeluaran) as bulan')
                 ])
                 ->groupBy('bulan')
                 ->get()
                 ->toArray();
        $data2 = [];
        foreach ($sumPengeluaran as $sum){
            $data2 [] = $sum->total;
        };


        $widget = [
            'users' => $users,
            'pemasukanTotal' => $pemasukanTotal,
            'pengeluaranTotal' => $pengeluaranTotal,
            'saldoTotal' => $saldoTotal,

        ];

        return view('home', compact('widget','data1','data2','dataBulan' ));
    }
}
