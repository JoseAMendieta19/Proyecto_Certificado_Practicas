<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Institucion extends Model
{
    use HasFactory;

    protected $table = 'instituciones';

    protected $fillable = ['nombre'];

    // 🔹 Una institución tiene muchos usuarios
    public function users()
    {
        return $this->hasMany(User::class, 'institucion_id');
    }
}
