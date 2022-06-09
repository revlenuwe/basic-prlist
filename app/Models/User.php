<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = 'users';

    public $timestamps = false;

    protected $fillable = ['username', 'password', 'password_confirmation'];

}