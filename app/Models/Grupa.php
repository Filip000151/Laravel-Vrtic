<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grupa extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['naziv', 'vaspitac_id'];

    protected $searchableFields = ['*'];

    public function vaspitac()
    {
        return $this->belongsTo(User::class, 'vaspitac_id');
    }

    public function deca()
    {
        return $this->hasMany(Dete::class);
    }

    public function evidencije()
    {
        return $this->hasMany(Evidencija::class);
    }
}
