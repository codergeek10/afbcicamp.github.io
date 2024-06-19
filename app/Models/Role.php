<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'roles',
    ];

    public function registrants(): HasMany
    {
        return $this->hasMany(Registrant::class, 'role_id', 'id');
    }
}
