<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Nilai extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'nilai';

    protected $fillable = [
        'id',
        'nim',
        'kode_matkul',
        'nama_matkul',
        'nilai',
    ];
}
