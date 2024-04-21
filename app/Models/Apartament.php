<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartament extends Model
{
    use HasFactory;

    protected $fillable = [
        'codi_apartament',
        'ref_catastral',
        'ciutat',
        'barri',
        'nom_carrer',
        'numero_carrer',
        'pis',
        'nombre_llits',
        'nombre_habitacions',
        'ascensor',
        'calefaccio',
        'aire_condicionat',
    ];
    protected $table = 'apartaments';
    public $incrementing = false;
    protected $primaryKey = 'codi_apartament';

    public function lloguers()
    {
        return $this->hasMany(Lloguer::class, 'codi_apartament', 'codi_apartament');
    }
}
