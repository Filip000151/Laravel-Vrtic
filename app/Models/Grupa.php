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

    public function detes()
    {
        return $this->hasMany(Dete::class);
    }

    public function evidencijas()
    {
        return $this->hasMany(Evidencija::class);
    }
}
