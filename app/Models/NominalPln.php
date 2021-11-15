<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NominalPln extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'nominal_pln';
}
