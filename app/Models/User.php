<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Kanuu\Laravel\Billable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Tests\Unit\UserTest;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use Billable;

    public static function testedBy()
    {
        return UserTest::class;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'email', 'password', 'github_id', 'github_nickname', 'github_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function isSuperAdmin()
    {
        return boolval($this->superadmin);
    }

    public static function createUserFromGithub($githubUser)
    {
        $user = User::where('github_id', $githubUser->id)->first();

        if ($user) {
            $user->name = $githubUser->name;
            $user->github_token = $githubUser->token;
            $user->github_refresh_token = $githubUser->refreshToken;
            $user->github_nickname = $githubUser->nickname;
            $user->github_avatar = $githubUser->avatar;
            $user->save();
        } else {
            $user = User::where('email', $githubUser->email)->first();
            if ($user) {
                $user->github_id = $githubUser->id;
                $user->name = $githubUser->name;
                $user->github_nickname = $githubUser->nickname;
                $user->github_avatar = $githubUser->avatar;
                $user->github_token = $githubUser->token;
                $user->github_refresh_token = $githubUser->refreshToken;
                $user->save();
            } else {
                $user = User::create([
                    'name' => $githubUser->name,
                    'email' => $githubUser->email,
                    'password' => Hash::make(Str::random()),
                    'github_id' => $githubUser->id,
                    'github_nickname' => $githubUser->nickname,
                    'github_token' => $githubUser->token,
                    'github_refresh_token' => $githubUser->refreshToken,
                ]);
            }
        }
        add_personal_team($user);
        return $user;
    }
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
