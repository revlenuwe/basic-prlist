<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';

    protected $fillable = ['name', 'description', 'price', 'image'];
}