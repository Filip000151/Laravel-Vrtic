<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Roditelj extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['ime', 'prezime', 'broj_telefona', 'jmbg'];

    protected $searchableFields = ['*'];

    public function detes()
    {
        return $this->hasMany(Dete::class);
    }
}
