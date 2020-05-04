<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $primaryKey='email';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'tel', 'address', 'password', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $incrementing = false;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get user by email
     *
     * @param $email
     * @return mixed
     */
    public function getByEmail($email)
    {
        return self::where('email', $email)
            ->first();
    }

    /**
     * Update info user
     *
     * @param User $user
     * @param $userInfo
     * @return User
     * @throws \Exception
     */
    public function updateUserInfo(User $user, $userInfo)
    {
        $input = [];
        if (isset($userInfo['name'])) {
            $input['name'] = $userInfo['name'];
        }
        if (isset($userInfo['tel'])) {
            $input['tel'] = $userInfo['tel'];
        }
        if (isset($userInfo['address'])) {
            $input['address'] = $userInfo['address'];
        }
        try {
            $user->update($input);
        } catch (\Exception $e) {
            throw new \Exception(__('An error occurred while updating the data.'));
        }

        return $user;
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
