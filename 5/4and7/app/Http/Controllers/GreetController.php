<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreetController extends Controller
{
    public function greet($name, $lastname = '')
    {
    return view('greetresult', ['name' => $name, 'lastname' => $lastname]);
    }

}