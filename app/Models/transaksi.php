<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis'; 
    protected $primaryKey = 'code_transaksi'; 

    protected $fillable = [
        'id_user',
        'total_harga',
        'created_at',
        'updated_at',
    ];
   public function details()
{
    return $this->hasMany(modelDetailTransaksi::class, 'id_transaksi', 'id');
}
public function detailTransaksi()
{
    return $this->hasMany(modelDetailTransaksi::class, 'id_transaksi', 'code_transaksi');
}

public function product()
{
    return $this->belongsTo(Product::class, 'product_id');
}

    protected $hidden;
}
