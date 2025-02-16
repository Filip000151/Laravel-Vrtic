<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dete extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'ime',
        'prezime',
        'datum_rodjenja',
        'napomene',
        'jmbg',
        'roditelj_id',
        'grupa_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'datum_rodjenja' => 'date',
    ];

    public function roditelj()
    {
        return $this->belongsTo(Roditelj::class);
    }

    public function grupa()
    {
        return $this->belongsTo(Grupa::class);
    }

    public function evidencijas()
    {
        return $this->belongsToMany(Evidencija::class, 'prisustvo');
    }
}
