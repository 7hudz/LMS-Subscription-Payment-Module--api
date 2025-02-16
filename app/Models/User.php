<?php


namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Subscription; // Ensure Subscription is imported

/**
 * @property \Illuminate\Database\Eloquent\Collection|Subscription[] $subscriptions
 */
class User extends Authenticatable {
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role'];

    protected $hidden = ['password'];

    public function coursesCreated(): HasMany {
        return $this->hasMany(Course::class, 'admin_id');
    }

    public function subscriptions(): HasMany {
        return $this->hasMany(Subscription::class, 'user_id');
    }
}

