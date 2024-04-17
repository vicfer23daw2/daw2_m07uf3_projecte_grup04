<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni_client',
        'nom',
        'cognoms',
        'edat',
        'telefon',
        'adressa',
        'ciutat',
        'pais',
        'email',
        'targeta',
        'num_targeta',
    ];
    protected $table = 'clients';
    protected $incrementing = false;
    protected $primaryKey = 'dni_client';

    public function lloguers()
    {
        return $this->hasMany(Lloguer::class, 'dni_client', 'dni_client');
    }
}
