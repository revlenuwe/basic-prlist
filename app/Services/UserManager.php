<?php


namespace App\Services;


use App\Models\User;

class UserManager
{
    public function getById(int $id)
    {
        return User::find($id);
    }

    public function getByUsername(string $username)
    {
        return User::where('username', $username)->get();
    }

    public function create(array $data)
    {
        return User::create($data);
    }
}