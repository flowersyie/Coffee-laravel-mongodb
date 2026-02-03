<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoffeeMenu; 
use App\Http\Resources\CoffeeResource;

class CoffeeController extends Controller
{

    public function index()
    {
       
    $menus = CoffeeMenu::all();
    dd($menus);}
}