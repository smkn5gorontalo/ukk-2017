<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Penjualan;
use App\Buku;
use Illuminate\Http\Request;
use Session;
use Auth;
use DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $penjualan = Penjualan::where('status',0)->where('tanggal',date('Y-m-d'))->where('id_user',Auth::user()->id)->orderBy('created_at','asc')->get();
        $selectedBuku   =   [];
        if(old('id_buku')){
            $selectedBuku   =   Buku::where('id',old('id_buku'))->pluck('judul','id');
        }
        return view('admin.penjualan.index', compact('penjualan','selectedBuku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.penjualan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_buku' => 'required',
            'jumlah'  => 'required|lebih_dari:0'
        ]);
        $stok       = Buku::select(['stok','judul'])->where('id',$request->id_buku)->first();
        if($request->jumlah > $stok->stok){
            Session::flash('pesan',"Stok untuk buku dengan judul <em><strong>$stok->judul</strong></em> sisa <strong>$stok->stok</strong>, tidak memungkinkan untuk dijual dengan jumlah <strong>$request->jumlah</strong>");
            return redirect()->back();
        }
        $buku       = Buku::select(['diskon','harga_jual'])->where('id',$request->id_buku)->first();
        $total      = $buku->harga_jual*$request->jumlah;
        if($buku->diskon>0){
            $total  = $total-($total/100*$buku->diskon);
        }
        $requestData = [
            'id_buku'   => $request->id_buku,
            'id_user'   => Auth::user()->id,
            'jumlah'    => $request->jumlah,
            'tanggal'   => date('Y-m-d'),
            'total'     => $total
        ];

        $update_stok        = Buku::find($request->id_buku);
        $update_stok->stok  = $update_stok->stok - $request->jumlah;
        $update_stok->save();

        Penjualan::create($requestData);
        Session::flash('flash_message', 'Penjualan added!');

        return redirect('admin/penjualan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $penjualan = Penjualan::findOrFail($id);

        return view('admin.penjualan.show', compact('penjualan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id);

        return view('admin.penjualan.edit', compact('penjualan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->update($requestData);

        Session::flash('flash_message', 'Penjualan updated!');

        return redirect('admin/penjualan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $penjualan  = Penjualan::findOrFail($id);
        $buku       = Buku::findOrFail($penjualan->id_buku);
        $buku->stok = $buku->stok + $penjualan->jumlah;
        $buku->save();
        $penjualan->delete();
        Session::flash('flash_message', 'Penjualan deleted!');

        return redirect('admin/penjualan');
    }

    public function listBuku(Request $r){

        if($r->term){
            $q  =   $r->term;
            $bukus  =   Buku::select(['id','judul as text'])->where('judul','like',"%$q%")->where('stok','>',0)->orderBy('created_at','desc')->limit(5)->get();
        }else{
            $bukus  =   Buku::select(['id','judul as text'])->where('stok','>',0)->orderBy('created_at','desc')->limit(5)->get();
        }

        return response()->json($bukus, 200);
    }

    public function confirm(){
        DB::table('penjualans')->update(['status'=>1]);
        Session::flash('message','Confirmed');
        return redirect('admin/penjualan');
    }
}
