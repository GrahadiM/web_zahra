<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PaketDataController extends Controller
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
        $data['last_transaction'] = DB::table('table_paket_data as pl')
            ->leftJoin('table_nominal_data as np', 'np.id', '=', 'pl.id_paket_data')
            ->leftJoin('table_provider as pv', 'pv.id', '=', 'np.id_provider')
            ->select('pl.id', 'pl.nomor_hp', 'np.nama_paket', 'pl.price','pv.nama_provider')
            ->orderBy('pl.created_at','desc')->paginate(5);
        $data['paket_data'] = DB::table('table_nominal_data as dt')
            ->leftJoin('table_provider as pv', 'pv.id', '=', 'dt.id_provider')
            ->select('dt.id', 'dt.id_provider', 'dt.nama_paket', 'dt.fixed_price','pv.nama_provider')
            ->orderBy('dt.id_provider','asc')->paginate(3);

        return view('admin.datapaket.index', $data);
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
    public function edit($id)
    {
        //
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
