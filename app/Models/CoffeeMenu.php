<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model; 

class CoffeeMenu extends Model
{
    use HasFactory;

    protected $connection = 'mongodb'; 
    protected $collection = 'CoffeeMenu'; 
    protected $table = 'CoffeeMenu';
    protected $primaryKey = 'item_id';
    public $incrementing = false; 

    public $timestamps = false;

    protected $fillable = [
        'item_id', 
        'item_name',
        'category',
        'price',
        'is_seasonal',
    ];

    protected $casts = [
        'price' => 'float',
        'is_seasonal' => 'boolean',
    ];
}