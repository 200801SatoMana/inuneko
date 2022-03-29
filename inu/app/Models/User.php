<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
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
        'userID',
        'icon',
        'password',
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

    public function likes()
    {
        return $this->belongsToMany(Image::class, 'likes', 'user_id', 'image_id')->withTimestamps();
    }

    public function like($imageId)
    {
        $exist = $this->is_like($imageId);

        if($exist){
            return false;
        }else{
            $this->likes()->attach($imageId);
            return true;
        }
    }

    public function unlike($imageId)
    {
        $exist = $this->is_like($imageId);

        if($exist){
            $this->likes()->detach($imageId);
            return true;
        }else{
            return false;
        }
    }

    public function is_like($imageId)
    {
        return $this->likes()->where('image_id',$imageId)->exists();
    }
}
