<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pointage extends Model
{
    // // ================= Primary Key =====================
    // protected $primaryKey = 'idP';

    // protected $keyType = 'string';

    // protected $incrementing = true;

    // ===== One to Many Inverse : (0,1) ou (1,1) ========
    public function employes(): BelongsTo
    {
        return $this->belongsTo(Employe::class);
    }

    // ================ Autorise au saisie ===============
    protected $fillable = [
        'idP',
        'datePointage',
        'numEmp',
        'pointage'
    ];

    use HasFactory;
}
