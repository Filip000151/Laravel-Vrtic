<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prijava extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'ime_dete',
        'prezime_dete',
        'datum_rodjenja',
        'jmbg_dete',
        'ime_roditelj',
        'prezime_roditelj',
        'broj_telefona',
        'jmbg_roditelj',
        'napomene',
        'datum_prijave',
        'administrator_id',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'datum_rodjenja' => 'date',
        'datum_prijave' => 'date',
    ];

    public function administrator()
    {
        return $this->belongsTo(User::class, 'administrator_id');
    }
}
