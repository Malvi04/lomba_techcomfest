<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'full_name',
        'username',
        'email',
        'password',
        'limit_protein',
        'limit_karbo',
        'limit_kalori',
        'current_protein',
        'current_karbo',
        'current_kalori'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'limit_protein' => 'decimal:2',
            'limit_karbo' => 'decimal:2',
            'limit_kalori' => 'decimal:2',
            'current_protein' => 'decimal:2',
            'current_karbo' => 'decimal:2',
            'current_kalori' => 'decimal:2'
        ];
    }
}
