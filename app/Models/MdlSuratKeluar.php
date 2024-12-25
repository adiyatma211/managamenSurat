<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdlSuratKeluar extends Model
{
    /** @use HasFactory<\Database\Factories\MdlSuratKeluarFactory> */
    use HasFactory;

    protected $guarded=['id'];
}
