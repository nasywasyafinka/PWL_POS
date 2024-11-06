<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Casts\Attribute;

class BarangModel extends Model
{

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    use HasFactory;

    protected $table = 'm_barang';
    protected $primaryKey = 'barang_id';
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['barang_kode', 'kategori_id', 'barang_nama', 'harga_beli', 'harga_jual', 'image'];

    public function kategori(): BelongsTo {
        return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
    }

    protected function image(): Attribute {
        return Attribute::make(
            get: fn ($image) => url('/storage/posts/'. $image),
        );
    }
}
