<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pasok;
use App\Distributor;
use App\Buku;

use Illuminate\Http\Request;
use Session;

class PasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pasok = Pasok::paginate(25);
        return view('admin.pasok.index', compact('pasok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $distributors   =   Distributor::pluck('nama_distributor','id');
        $bukus          =   Buku::pluck('judul','id');
        return view('admin.pasok.create',compact('distributors','bukus'));
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
        
        $requestData = $request->all();
        
        Pasok::create($requestData);

        Session::flash('flash_message', 'Pasok added!');

        return redirect('admin/pasok');
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
        $pasok = Pasok::findOrFail($id);

        return view('admin.pasok.show', compact('pasok'));
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
        $distributors   =   Distributor::pluck('nama_distributor','id');
        $bukus          =   Buku::pluck('judul','id');
        $pasok = Pasok::findOrFail($id);

        return view('admin.pasok.edit', compact('pasok','distributors','bukus'));
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
        
        $pasok = Pasok::findOrFail($id);
        $pasok->update($requestData);

        Session::flash('flash_message', 'Pasok updated!');

        return redirect('admin/pasok');
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
        Pasok::destroy($id);

        Session::flash('flash_message', 'Pasok deleted!');

        return redirect('admin/pasok');
    }
}
