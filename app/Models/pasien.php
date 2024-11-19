<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';
    protected $fillable = ['no_reg', 'nama', 'diagnosa', 'resep_obat'];
}
