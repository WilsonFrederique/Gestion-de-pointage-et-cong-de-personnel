<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employe extends Model
{
    // ================= Primary Key =====================
    protected $primaryKey = 'numEmp';

    // ================= Type Primary Key ================
    protected $keyType = 'string';

    // =========== One to Many : (0,n) ou (1,n) ==========
    public function pointages(): HasMany
    {
        return $this->hasMany(Pointage::class);
    }

    // =========== One to Many : (0,n) ou (1,n) ==========
    public function conges(): HasMany
    {
        return $this->Conge(Pointage::class);
    }

    // ================ Autorise au saisie ===============
    protected $fillable = [
        'numEmp',
        'Nom',
        'Prenom',
        'poste',
        'salaire'
    ];

    use HasFactory;
}
