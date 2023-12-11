<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kembali extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'sum',
        'admin',
        'kembali',
        'hilang',
        'rusak',
        'inventories_id',
        'tanggalKeluar',
    ];

    public function invetories()
    {
        return $this->belongsTo(Inventory::class);
    }
}
