<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatSaldo extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'riwayat_saldos';

    public function user_id()
    {
        return $this->belongsTo('App\Models\User');
    }
}
