<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatSaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\Models\User::where('role', 'outlet')
        // ->orderBy('name', 'desc')
        ->paginate(5);
        foreach ($users as $key) {
            $key->total = \App\Models\RiwayatSaldo::where('user_id', $key->id)
            ->count();
            $key->total_topup = \App\Models\RiwayatSaldo::where('user_id', $key->id)
            ->orderBy('saldoPlus', 'desc')
            // ->where(date('Y-m', strtotime('created_at')), date('Y-m'))
            ->sum('saldoPlus');
            // foreach ($key->total_topup as $total_topup) {
            //     $total_topup->created_at->date_format('Y-m') == date('Y-m');
            // }
        }
        // dd($users);
        return view('operator.datariwayat.index', compact('users'));
    }

    public function filter(Request $request)
    {
        $name = $request->name;
        $saldo = $request->saldo;

        // dd($request);
        
        if ($name == null) {
            
            $users = \App\Models\User::orderBy('saldo', 'desc')
            ->where('role', 'outlet')
            ->where('saldo','like',"%".$saldo."%")
            // ->orderBy('created_at', 'desc')
            ->paginate(5);
            foreach ($users as $key) {
                $key->total = \App\Models\RiwayatSaldo::where('user_id', $key->id)
                ->count();
                $key->total_topup = \App\Models\RiwayatSaldo::where('user_id', $key->id)
                ->sum('saldoPlus');
            }

        } elseif ($saldo == null) {
            
            $users = \App\Models\User::orderBy('saldo', 'desc')
            ->where('role', 'outlet')
            ->where('name','like',"%".$name."%")
            // ->orderBy('created_at', 'desc')
            ->paginate(5);
            foreach ($users as $key) {
                $key->total = \App\Models\RiwayatSaldo::where('user_id', $key->id)
                ->count();
                $key->total_topup = \App\Models\RiwayatSaldo::where('user_id', $key->id)
                ->sum('saldoPlus');
            }

        } elseif ($name != null && $saldo != null) {
            
            $users = \App\Models\User::orderBy('saldo', 'desc')
            ->where('role', 'outlet')
            ->where('name','like',"%".$name."%")
            ->where('saldo','like',"%".$saldo."%")
            ->orderBy('created_at', 'desc')
            ->paginate(5);
            foreach ($users as $key) {
                $key->total = \App\Models\RiwayatSaldo::where('user_id', $key->id)
                ->count();
                $key->total_topup = \App\Models\RiwayatSaldo::where('user_id', $key->id)
                ->sum('saldoPlus');
            }

        } else {
            
            $users = \App\Models\User::orderBy('saldo', 'desc')
            ->where('role', 'outlet')
            ->paginate(5);
            foreach ($users as $key) {
                $key->total = \App\Models\RiwayatSaldo::where('user_id', $key->id)
                ->count();
                $key->total_topup = \App\Models\RiwayatSaldo::where('user_id', $key->id)
                ->sum('saldoPlus');
            }

        }
        
        
        return view('operator.datariwayat.index', compact('users'));
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
        $user = \App\Models\User::find($id);
        $rs = \App\Models\RiwayatSaldo::orderBy('created_at', 'asc')->where('user_id', $user->id)->paginate(5);
        $rsaldo = DB::table('riwayat_saldos')->where('user_id', $id)->get()->sum('saldoPlus');
        $total = \App\Models\RiwayatSaldo::where('user_id', $id)->count();
        $total_topup = \App\Models\RiwayatSaldo::where('user_id', $id)->sum('saldoPlus');
        return view('operator.datariwayat.detail', compact('user', 'rs', 'rsaldo', 'total', 'total_topup'));
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
