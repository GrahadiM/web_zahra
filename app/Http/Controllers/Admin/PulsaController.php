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

    public function store(Request $request)
    {
        //
    }

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

    public function updateprice(Request $request, $id)
    {
        $this->validate($request, [
            'nominal' => 'required',          
            'fixed_price' => 'required',      
        ]);
        $price = DB::table('table_nominal_pulsa')->find($id);
        dd($request->all());
        $price->update($request->all());

        return back()->with('success', "Data has been updated!!");
    }

    public function updateprovider(Request $request, $id)
    {
        $this->validate($request, [
            '' => 'required|numeric',         
        ]);
        DB::table('table_provider')->find($id)->updateprovider($request->all());
        
        return back()->with('success', "Data has been updated!!");
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroyprice($id)
    {
        $price = DB::table('table_nominal_pulsa')->find($id);
        $price->delete();

        return back()->with('success', "Data has been deleted!!");
    }
}
