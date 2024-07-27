<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'product',
        'package',
        'price',
        'name',
        'email',
        'phone',
        'notes',
        'grand_total',
        'proof_path'
    ];

    // tambahkan relasi jika diperlukan
}
