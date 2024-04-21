<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lloguer extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni_client',
        'codi_apartament',
        'data_inici',
        'hora_inici',
        'data_finalitzacio',
        'hora_finalitzacio',
        'lliurament_claus',
        'devolucio_claus',
        'preu_dia',
        'diposit',
        'quantitat_diposit',
        'asseguransa',
    ];
    protected $table = 'lloguers';
    public $incrementing = false;
    protected $primaryKey = ['dni_client', 'codi_apartament'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'dni_client', 'dni_client');
    }

    public function apartament()
    {
        return $this->belongsTo(Apartament::class, 'codi_apartament', 'codi_apartament');
    }
}
