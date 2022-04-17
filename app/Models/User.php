<?php

namespace App\Models;

use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends \TCG\Voyager\Models\User
{
    use HasFactory, Notifiable;


    protected $guarded = [];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime'];

    public function migration(Blueprint $table)
    {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->rememberToken();
        $table->timestamp('created_at')->nullable();
        $table->timestamp('updated_at')->nullable();
    }

    public function definition(Generator $faker)
    {
        return [
            'name' => $faker->name(),
            'email' => $faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
            'created_at' => $faker->dateTimeThisMonth(),
        ];
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'following_id');
    }

    // users that follow this user
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'follower_id');
    }


    public function messages()
    {
        return $this->hasMany(message::class, 'to');
    }

    function UpdateScore($true_answer)
    {
        $scoreReward = intval($true_answer) * intval(setting('gamesetting.socre_pre_true_answer'));
        $this->score += $scoreReward;
        $this->save();
    }


}
