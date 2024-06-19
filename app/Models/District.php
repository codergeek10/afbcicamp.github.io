<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'zone_id',
    ];

    public function zone(){
        return $this->belongsTo(Zone::class, 'zone_id');
    }

    public function churches(): HasMany
    {
        return $this->hasMany(Church::class);
    }

    public function registrants(): HasManyThrough
    {
        return $this->hasManyThrough(Registrant::class, Church::class);
    }
}
