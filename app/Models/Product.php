<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';

    public $timestamps = false;

    protected $fillable = ['name', 'description', 'price', 'image'];
}