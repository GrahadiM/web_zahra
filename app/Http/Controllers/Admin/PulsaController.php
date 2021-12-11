<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PulsaController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['last_transaction'] = DB::table('table_pulsa as pl')
            ->leftJoin('table_provider as pv', 'pv.id', '=', 'pl.id_provider')
            ->leftJoin('table_nominal_pulsa as np', 'np.id', '=', 'pl.id_nominal')
            ->select('pl.id', 'pl.nomor_hp', 'np.nominal', 'pl.price','pv.nama_provider')
            ->orderBy('pl.created_at','desc')
            ->paginate(5);
        $data['pulsa_nominal'] = DB::table('table_nominal_pulsa')->orderBy('nominal','asc')->paginate(3);
        $data['providers'] = DB::table('table_provider')->orderBy('kode_provider','asc')->paginate(3);
        
        return view('admin.datapulsa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editprice($id)
    {
        $data['pulsa_nominal'] = DB::table('table_nominal_pulsa')->find($id);
        return view('admin.datapulsa.price', $data);
    }

    public function editprovider($id)
    {
        $data['provider'] = DB::table('table_provider')->find($id);
        return view('admin.datapulsa.provider', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
