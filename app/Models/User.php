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
        'umur',
        'kelamin',
        'berat_badan',
        'tinggi_badan',
        'seberapa_aktif',
        'sakit_diabetes',
        'waktu_tidur',
        'limit_protein',
        'limit_karbo',
        'limit_kalori',
        'current_protein',
        'current_karbo',
        'current_kalori',
        'food_today'
    ];

    /**
     * Model attribute defaults.
     *
     * @var array<string, mixed>
     */
    protected $attributes = [
        'food_today' => '[]',
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
            'umur' => 'integer',
            'kelamin' => 'integer',
            'berat_badan' => 'integer',
            'tinggi_badan' => 'integer',
            'seberapa_aktif' => 'integer',
            'sakit_diabetes' => 'integer',
            'waktu_tidur' => 'integer',
            'limit_protein' => 'decimal:2',
            'limit_karbo' => 'decimal:2',
            'limit_kalori' => 'decimal:2',
            'current_protein' => 'decimal:2',
            'current_karbo' => 'decimal:2',
            'current_kalori' => 'decimal:2',
            'food_today' => 'array'
        ];
    }
}
