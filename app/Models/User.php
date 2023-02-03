<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

// class User extends Authenticatable
class User extends Authenticatable implements HasMedia
{
    // use HasApiTokens, HasFactory, Notifiable;

    use HasApiTokens, HasFactory, InteractsWithMedia, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'avartar',
        'role_id',
        'type',
        'gender',
        'fathers_name',
        'mothers_name',
        'address',
        'user_id',
        'batch_id',
        'dept_id'
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

    // image uload part
    public function registerMediaCollections() : void
    {
        $this->addMediaCollection('avatar')->singleFile();
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function courses()
    {
        return $this->hasMany(Course::class,'teacher_id','id');
    }
    public function hasPermission($permission): bool
    {
        return $this->role->permissions()->where('slug', $permission)->first() ? true : false;
    }
}
