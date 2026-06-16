<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Centro extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'codcen',
        'dencen',
        'titularidad',
        'domcen',
        'cpcen',
        'loccen',
        'muncen',
        'telcen',
        'email',
    ];
}
