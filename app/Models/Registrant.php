<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Registrant extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'registration_Code',
        'firstname',
        'lastname',
        'email',
        'phone',
        'gender',
        'age_group',
        'illness',
        'illness_type',
        'contact_1_name',
        'contact_1_phone',
        'contact_2_name',
        'contact_2_phone',
        'membership',
        'church_id',
        'attendance',
        'role_id',
        'comment',
    ];

    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function church(): BelongsTo
    {
        return $this->belongsTo(Church::class, 'church_id', 'id');
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}
