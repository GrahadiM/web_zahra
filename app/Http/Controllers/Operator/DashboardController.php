<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function outlet()
    {
        return view('admin.datauser.index', [
            'users' => \App\Models\User::orderBy('name', 'asc')
            ->where('role', 'outlet')
            ->paginate(5)
        ]);
    }
}
