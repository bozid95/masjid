<?php

namespace App\Http\Controllers;

use App\Pemasukan;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(){

        return view('laporan.index');



    }
public function cari(Request $request){
$this->validate($request,[
    'dari' => 'required',
    'sampai' => 'required',
]);

    $dari = date('Y-m-d',strtotime($request->dari));
    $sampai= date('Y-m-d',strtotime($request->sampai));

    $pemasukan = \DB::table('pemasukans')->whereBetween('tgl_pemasukan',[$dari,$sampai])->get();
    $pengeluaran = \DB::table('pengeluarans')->whereBetween('tgl_pengeluaran',[$dari,$sampai])->get();
    $pemasukanRekap = \DB::table('pemasukans')->whereBetween('tgl_pemasukan',[$dari,$sampai])->sum('jml_pemasukan');
    $pengeluaranRekap = \DB::table('pengeluarans')->whereBetween('tgl_pengeluaran',[$dari,$sampai])->sum('jml_pengeluaran');
    return view('laporan/index',compact('pemasukan','pengeluaran','pengeluaranRekap','pemasukanRekap','dari','sampai'));

    }
}
