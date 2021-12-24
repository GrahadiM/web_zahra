<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('operator.datauser.index', [
            'users' => \App\Models\User::orderBy('id', 'asc')
            ->where('role', 'outlet')
            ->paginate(5)
        ]);
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
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        } elseif ($saldo == null) {
            
            $users = \App\Models\User::orderBy('saldo', 'desc')
            ->where('role', 'outlet')
            ->where('name','like',"%".$name."%")
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        } elseif ($name != null && $saldo != null) {
            
            $users = \App\Models\User::orderBy('saldo', 'desc')
            ->where('role', 'outlet')
            ->where('name','like',"%".$name."%")
            ->where('saldo','like',"%".$saldo."%")
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        } else {
            
            $users = \App\Models\User::orderBy('saldo', 'desc')
            ->where('role', 'outlet')
            ->paginate(5);

        }
        
        
        return view('operator.datauser.index', compact('users'));
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
    public function edit(\App\Models\User $user)
    {
        $user = $user->find($user->id);
        $rs = \App\Models\RiwayatSaldo::orderBy('created_at', 'desc')->where('user_id', $user->id)->paginate(5);
        // $rsaldo = DB::table('riwayat_saldos')->get()->sum('saldoPlus');
        $rsaldo = DB::table('riwayat_saldos')->where('user_id', $user->id)->get()->sum('saldoPlus');
        return view('operator.datauser.update', compact('user', 'rs', 'rsaldo'));
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
        $request->validate([
            'saldoPlus' => 'required|numeric', 
        ]);

        $user = \App\Models\User::find($id);
        $saldo = $user->saldo;
        $saldoNow = $saldo + $request->saldoPlus;
        // dd($user);

        // buat riwayat saldo user
        \App\Models\RiwayatSaldo::create([
            'user_id'       => $user->id,
            'saldoAfter'    => $user->saldo,
            'saldoPlus'     => $request->saldoPlus,
            'saldoNow'      => $saldoNow,
        ]);

        // edit saldo user
        $user->update([
            'saldo'         => $saldoNow,
            'updated_at'    => date('Y-m-d H:i:s'),
        ]);

        return back()->with('success', 'Saldo berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\Models\User::find($id);
        $user->delete();
        return back()->with('success', 'User di hapus!');
    }
}
