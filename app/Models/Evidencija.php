<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evidencija extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['datum', 'grupa_id'];

    protected $searchableFields = ['*'];

    protected $casts = [
        'datum' => 'date',
    ];

    public function grupa()
    {
        return $this->belongsTo(Grupa::class);
    }

    public function detes()
    {
        return $this->belongsToMany(Dete::class, 'prisustvo');
    }
}
