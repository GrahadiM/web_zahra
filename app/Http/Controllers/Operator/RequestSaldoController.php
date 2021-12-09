<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestSaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\Models\User::orderBy('name', 'asc')
        ->where('role', 'outlet')
        ->get();

        $attrs = \App\Models\RequestSaldo::orderBy('created_at', 'desc')
        ->paginate(5);

        return view('operator.requestsaldo.index', compact('attrs', 'users'));
    }

    public function filter(Request $request)
    {
        $user_id = $request->user_id;

        $users = \App\Models\User::orderBy('name', 'asc')
        ->where('role', 'outlet')
        ->get();

        $attrs = \App\Models\RequestSaldo::orderBy('created_at', 'desc')
        ->where('user_id','like',"%".$user_id."%")
        ->paginate(5);

        return view('operator.requestsaldo.index', compact('attrs', 'users'));
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
        $attr = \App\Models\RequestSaldo::find($id);

        return view('operator.requestsaldo.detail', compact('attr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attr = \App\Models\RequestSaldo::find($id);

        return view('operator.requestsaldo.update', compact('attr'));
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
            'status' => 'required', 
        ]);

        // dd($request);
        $attr = \App\Models\RequestSaldo::find($id);
        $attr->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status berhasil diubah  !');
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
