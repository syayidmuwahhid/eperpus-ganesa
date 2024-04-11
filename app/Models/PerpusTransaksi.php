<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerpusTransaksi extends Model
{
    use HasFactory;
    protected $table = 'perpus_transaksi';
    protected $primaryKey = 'id';
}
