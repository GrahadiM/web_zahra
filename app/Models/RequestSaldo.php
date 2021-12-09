<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestSaldo extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'request_saldos';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
