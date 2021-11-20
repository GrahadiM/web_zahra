<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('admin.home');
    }
    
    public function pegawai()
    {
        return view('admin.datapegawai.index', [
            'users' => \App\Models\User::orderBy('name', 'asc')
            ->where('role', ['operator'])
            ->paginate(5)
        ]);
    }

    public function outlet()
    {
        return view('admin.datauser.index', [
            'users' => \App\Models\User::orderBy('name', 'asc')
            ->where('role', 'outlet')
            ->paginate(5)
        ]);
    }

    public function user_edit(\App\Models\User $user)
    {
        $user->find($user->id);
        return view('admin.datauser.update');
    }

    public function user_update(Request $request, $id)
    {
        $user = DB::table('users')->find($id);
        $saldo = Auth::user()->saldo;
        $saldoNow = $saldo + $request->saldo;
        $user->update([
            'saldo'                 => $saldoNow,
            'updated_at'            => date('Y-m-d H:i:s'),
        ]);
        return back()->with('success', 'Saldo berhasil dirubah!');
    }

    public function user_destroy(\App\Models\User $user)
    {
        $user->delete();
        return back()->with('success', 'User di hapus!');
    }
}
