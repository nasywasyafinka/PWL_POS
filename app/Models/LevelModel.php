<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LevelModel extends Model
{
    protected $table = 'm_level';        // Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'level_id';  //Mendefinisikan primary key dari tabel yang digunakan


    public function user():BelongsTo {
        return $this->belongsTo(UserModel::class);
    }
}