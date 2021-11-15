<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'data';
    
    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User');
    // }
}
