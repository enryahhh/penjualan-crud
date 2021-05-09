<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_barang';
    protected $table = 'barang';
    protected $fillable = [
        'id_barang',
        'nama_barang',
        'harga',
        'stok',
        'foto',
    ];

    public $incrementing = false;
    // public function newQuery(){

    // }
}
