<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'employee_id',
        'designation',
        'role_id',
        'office_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    // Role relationships
    public function isAdmin(){
        return $this->roles()->where('name', 'Administrator')->exists();
    }

    public function hasRole($roles){
        // Get the user's roles
        $userRoles = $this->roles->pluck('name')->toArray();
        // Check if any of the user's roles are in the list of roles
        return count(array_intersect($userRoles, $roles)) > 0;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
