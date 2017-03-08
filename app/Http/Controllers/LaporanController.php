<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Penjualan;

class LaporanController extends Controller
{
	public function index(){
		for ($i=2000; $i <= date('Y'); $i++) { 
			$tahun[$i] = $i; 
		}
		for ($i=1; $i <=12; $i++) { 
			$bulan[$i] = $i;
		}
		for ($i=1; $i <=31; $i++) { 
			$tanggal[$i] = $i;
		}
		return view('admin.laporan.index', compact('tahun','bulan','tanggal'));
	}

	public function generate(Request $r){
		if(!isset($r->tahun)){
			Session::flash('error','Tidak ada data yang dikirim');
			return redirect()->back();
		}
		$tahun 	= $r->tahun;
		$bulan 	= "$r->bulan";
		$tanggal= "$r->tanggal";
		if(strlen($bulan)==1){
			$bulan = "0$bulan";
		}
		if(strlen($tanggal)==1){
			$tanggal 	= "0$tanggal";
		}
		$t 	= $tahun;
		if($r->has('bulan')){
			$t 	= "$tahun-$bulan";
		}
		if($r->has('tanggal')){
			$t 	= "$tahun-$bulan-$tanggal";
		}
		$penjualans 	= Penjualan::where('created_at','like',"$t%")->get();
		if(count($penjualans)==0){
			Session::flash('error','Tidak ada data untuk '.$t);
			return redirect()->back();
		}
		return view('admin.laporan.generate', compact('penjualans'));
	}
}
