<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = 'users';

    protected $fillable = ['username', 'password', 'password_confirmation'];
}