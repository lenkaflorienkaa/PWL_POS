<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokModel extends Model
{
    use HasFactory;

    protected $table = 't_stok'; // Name of the table in the database
    protected $primaryKey = 'stok_id'; // Primary key of the table

    protected $fillable = [
        'barang_id', // Foreign key referencing the BarangModel
        'user_id',   // Foreign key referencing the UserModel
        'stok_tanggal',
        'stok_jumlah'
    ];

    // Define the relationship with the BarangModel
    public function barang() {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
        // Explanation:
        // The 'barang_id' parameter indicates the foreign key in the 't_stok' table.
        // The second 'barang_id' parameter indicates the primary key in the 'barang' table.
    }

    // Define the relationship with the UserModel
    public function user() {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
        // Explanation:
        // The 'user_id' parameter indicates the foreign key in the 't_stok' table.
        // The second 'user_id' parameter indicates the primary key in the 'user' table.
    }
}
