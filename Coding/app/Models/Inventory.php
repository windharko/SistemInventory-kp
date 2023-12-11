<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
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
        'realName',
        'size',
        'qr',
    ];

    public function history()
    {
        return $this->hasMany(History::class, 'inventories_id');
    }

    public function kembali()
    {
        return $this->hasMany(Kembali::class, 'inventories_id');
    }

    public function out()
    {
        return $this->hasMany(out::class, 'inventories_id');
    }

    public function willSave()
    {
        return $this->hasMany(Save::class, 'inventories_id');
    }
}
