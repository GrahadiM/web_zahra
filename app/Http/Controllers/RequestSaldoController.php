<?php

namespace App\Http\Controllers;

use App\Models\RequestSaldo;
use Illuminate\Http\Request;

class RequestSaldoController extends Controller
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
    public function index(Request $request)
    {
        $users = \App\Models\User::where('id', auth()->user()->id)->get();

        $attrs = \App\Models\RequestSaldo::orderBy('created_at', 'desc')
        ->where('user_id', auth()->user()->id)
        ->paginate(5);

        return view('requestsaldo.index', compact('attrs', 'users'), [
            'user' => $request->user()
        ]);
    }

    public function filter(Request $request)
    {
        $nominal = $request->nominal;

        $user = \App\Models\User::where('id', auth()->user()->id)->get();

        $attrs = \App\Models\RequestSaldo::orderBy('created_at', 'desc')
        ->where('user_id', auth()->user()->id)
        ->where('nominal','like',"%".$nominal."%")
        ->paginate(5);

        return view('requestsaldo.index', compact('attrs', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'bukti' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nominal' => 'required|numeric',
        ]);

        $bukti = $request->file('bukti');
        $destinationPath = 'images/bukti/';
        $buktiImage = date('Ymd_His') . "_" . auth()->user()->name . "." . $bukti->getClientOriginalExtension();
        $bukti->move($destinationPath, $buktiImage);
        $input['bukti'] = $buktiImage;

        $input['user_id'] = auth()->user()->id;
        $input['nominal'] = $request->nominal;
        $input['status'] = 'pending';

        // dd($input);

        RequestSaldo::create($input);

        return redirect()->back()->with('success', 'Upload permintaan saldo berhasil ditambahkan!');
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
     * @param  \App\Models\RequestSaldo  $requestSaldo
     * @return \Illuminate\Http\Response
     */
    public function show(RequestSaldo $requestSaldo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestSaldo  $requestSaldo
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestSaldo $requestSaldo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestSaldo  $requestSaldo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestSaldo $requestSaldo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestSaldo  $requestSaldo
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestSaldo $requestSaldo)
    {
        //
    }
}
