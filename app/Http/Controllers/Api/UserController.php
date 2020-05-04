<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Traits\HandleJsonResponses;
use App\Models\User;

class UserController extends Controller
{
    use HandleJsonResponses;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function show()
    {
        $email = auth()->user()->email;

        $user = $this->user->getByEmail($email);

        return $this->respondOk($user->toArray());
    }

    public function update($email, UpdateUserRequest $request)
    {
        $user = $this->user->getByEmail($email);

        if (! $user) {
            return $this->message(__('User not found.'))->respondNotFound();
        }

        $user = $this->user->updateUserInfo($user, $request->all());

        return $this->respondOk($user->toArray());
    }
}
