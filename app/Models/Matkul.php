<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Matkul extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'matkul';

    protected $fillable = [
        'id',
        'kode_matkul',
        'nama_matkul',
        'sks',
    ];
}
