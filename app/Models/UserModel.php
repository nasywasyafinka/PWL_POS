<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user';        // Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'user_id';  //Mendefinisikan primary key dari tabel yang digunakan

    //Jobsheet 4 Langkah 2
    // protected $fillable = ['level_id', 'username','nama','password']; 
    
    //Jobsheet 4 Langkah 4
    protected $fillable = ['level_id', 'username','nama']; 
}