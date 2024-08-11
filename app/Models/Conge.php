<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Conge extends Model
{
    // ================= Primary Key =====================
    protected $primaryKey = 'numConge';

    // ================= Type Primary Key ================
    protected $keyType = 'string';

    // ===== One to Many Inverse : (0,1) ou (1,1) ========
    public function employes(): BelongsTo
    {
        return $this->belongsTo(Employe::class);
    }

    // ================ Autorise au saisie ===============
    protected $fillable = [
        'numConge',
        'numEmp',
        'motif',
        'nbrjr',
        'dateDemande'
    ];

    use HasFactory;
}
