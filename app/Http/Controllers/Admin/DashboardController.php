<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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

    public function addpegawai()
    {
        return view('auth.registerpegawai');
    }

    protected function postpegawai(Request $request)
    {   
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'numeric'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'operator',
            'status' => 'active',
            'avatar' => 'operator.jpg',
            'phone' => $request->phone,
            'saldo' => 0,
            'remember_token' => Str::random(60),
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.add.pegawai')->with('success', 'Akun berhasil ditambahkan!');
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
        $user = $user->find($user->id);
        $rs = \App\Models\RiwayatSaldo::orderBy('created_at', 'asc')->where('user_id', $user->id)->paginate(5);
        // $rsaldo = DB::table('riwayat_saldos')->get()->sum('saldoPlus');
        $rsaldo = DB::table('riwayat_saldos')->where('user_id', $user->id)->get()->sum('saldoPlus');
        return view('admin.datauser.update', compact('user', 'rs', 'rsaldo'));
    }

    public function user_update(Request $request, $id)
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

    public function user_destroy(\App\Models\User $user)
    {
        $user->delete();
        return back()->with('success', 'User di hapus!');
    }

    // public function riwayat_destroy($id)
    // {
    //     $riwayat = \App\Models\RiwayatSaldo::find($id);
    //     $riwayat->delete();
    //     return back()->with('success', 'Riwayat di hapus!');
    // }
}
// INSERT INTO `users` (`id`, `name`, `role`, `gender`, `phone`, `address`, `avatar`, `status`, `saldo`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES ('1', 'Super Admin', 'admin', '-', '-', '-', 'admin.png', 'active', '0', 'admin@test.com', '2021-11-01 18:59:24', '$2y$10$ISCgfqIpii1/MIjs1aXoH.gwt56qn8isB3ijlV58KEB5AxMsldtX2', NULL, '2021-11-01 18:59:24', NULL);
